$(function() {
    var sidebarSeriesSetting = dashboard.createSidebar({
        name: 'sidebar-series-settings',
        width: '300px',
        left: '480px',
        title: 'Series Setting',
        parent: 'sidebar-widged-setting'
    }).withScroll();

    var chartWidgedInstance = {};

    var widged = new Widged;

    widged.type('chart').setup(function(item) {
        var series = [];
        var indexSeries = 0;
        var seriesObj = JSON.parse(item.meta.get('series'));
        var xaxis_type = '';
        $.each(seriesObj, function(index, val) {
            xaxis_type = val.x_axis_field_type;
            series[indexSeries] = {
                type: val.type,
                name: val.label,
                color: val.color,
                data: [],
                tooltip: {
                    valueSuffix: ' '+val.value_unit
                }
            };
            indexSeries++;
        });

        xAxis = {
          
        };

        if (xaxis_type == 'datetime') {
            xAxis = {
                type: 'datetime',

                dateTimeLabelFormats: {
                    hour: '%I %p',
                    minute: '%I:%M %p'
                },
                tickmarkPlacement: 'off',
            };
        }

        chartWidgedInstance[item.meta.get('id')] = Highcharts.chart('chart-'+item.meta.get('id'), {
            exporting: { enabled: false },
          title: {
            text: ''
          },
          subtitle: {
            text: ''
          },
          yAxis: {
            title: {
              text: item.meta.get('title')
            }
          },
            xAxis: xAxis,
        
          series: series,
        });

        var id = item.meta.get('id')
        var obj = item.instance;
        var getDataInterval = function() {
            item.instance.loading(true)

            item.url.getData({
                success: function(res) {
                    var lit = 0;
                    $.each(res.data.charts, function(index, val) {
                            if (val[0][1] !== '') {
                                console.log()
                                chartWidgedInstance[id].series[lit].update({
                                    data: val,
                                    visible: true,
                                }, true);
                            } else {
                                chartWidgedInstance[id].series[lit].update({
                                    visible: false,
                                }, true);
                            }
                        lit++;
                    });
                    

                },
                fail: function(res) {},
                always : function(res) {
                    item.instance.loading(false)
                },
            });
        };

        dashboard.registerIntervalGetData(id, getDataInterval);


        var start = moment().subtract(29, 'days');
        var end = moment();
            
        var prefix = 'chart'+item.meta.get('id')

        if (localStorage.getItem(prefix+'period_type', item.meta.get('period_type'))) {
            var from = localStorage.getItem(prefix+'period_date_from', item.meta.get('period_date_from'));
            var to = localStorage.getItem(prefix+'period_date_to', item.meta.get('period_date_to'));
            item.meta.set('period_type', localStorage.getItem(prefix+'period_type', item.meta.get('period_type')));
            item.meta.set('period_date_from', from);
            item.meta.set('period_date_to', to);
                start = moment(from, 'YYYY-MM-DD HH:MM:SS');
            end = moment(to, 'YYYY-MM-DD HH:MM:SS');
        }

        function callback(start, end) {
            var label = start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY');
           
            item.meta.set('period_type', 'custom');
            item.meta.set('period_date_from', start.format('YYYY-MM-DD HH:MM:SS'));
            item.meta.set('period_date_to', end.format('YYYY-MM-DD HH:MM:SS'));
            item.object.find('#dateperiod span').html(label);
        }

        item.object.find('#dateperiod').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Auto Refresh': [moment(), moment()],
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Year': [moment().startOf('year'), moment().endOf('year')],
               'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
               'Last Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, callback);

        item.object.find('#dateperiod').on('apply.daterangepicker', function(ev, picker) {
            if (picker.chosenLabel == 'Auto Refresh') {
                item.meta.set('period_type', 'auto_refresh');

                setTimeout(function(){
                }, 100);
            }

            localStorage.setItem(prefix+'period_type', item.meta.get('period_type'));
            localStorage.setItem(prefix+'period_date_from', item.meta.get('period_date_from'));
            localStorage.setItem(prefix+'period_date_to', item.meta.get('period_date_to'));

            getDataInterval();

        });

        callback(start, end);
        resizeChart();
    });

    $(document).on('click', 'a.btn-series-detail', function(event) {
        event.preventDefault();
        var seriesItem = $(this).parents('.series-item')
        dashboard.showSidePage(sidebarSeriesSetting, false, $('.sidebar-widged-setting'));
        var url = new WidgedUrl;
        url.get({
            widged_type: 'chart',
            resource: 'chartSeriesSetting',
            params: {
                id: seriesItem.attr('data-series-id')
            },
            success: function(res) {
                sidebarSeriesSetting.find('.sidebar-body').html(res.html)
                sidebarSeriesSetting.find('#data_table').trigger('change')

            },
            fail: function(res) {}
        })
    })
    $(document).on('click', '.btn-save-series', function(event) {
        event.preventDefault();
        $dashboard.closeSidePage($('.sidebar-series-settings'))
        var params = sidebarSeriesSetting.find('#formSeriesSetting').serializeArray();
        var url = new WidgedUrl;
        params = url.parseData(params);
        sidebarSeriesSetting.showLoader();
        url.get({
            widged_type: 'chart',
            resource: 'chartUpdateSeries',
            params: params,
            success: function(res) {
            	var seriesId = res.data.id;
        		$('.series-item[data-series-id="'+seriesId+'"] .btn-series-detail').html(res.data.label);
            },
            fail: function(res) {},
            always : function() {
            	sidebarSeriesSetting.hideLoader();
            }
        })
    });

	$(document).on('click', '.btn-remove-series', function(event) {
	        event.preventDefault();
        $dashboard.closeSidePage($('.sidebar-series-settings'))
        var seriesItem = $(this).parents('.series-item')
        var seriesId = seriesItem.attr('data-series-id');

        if (!seriesId) {
        	seriesId = $(this).attr('data-series-id');
        	$('.series-item[data-series-id="'+seriesId+'"]').remove();
        }

        var url = new WidgedUrl;

      	sidebarWidgedSetting.showLoader();
        url.get({
            widged_type: 'chart',
            resource: 'chartRemoveSeries',
            params: {
                id: seriesId
            },
            success: function(res) {
        		seriesItem.remove();
            },
            fail: function(res) {},
            always: function(res) {
            	sidebarWidgedSetting.hideLoader();
            }
        })
    });

    $(document).on('click', '.btn-add-series', function(event) {
        event.preventDefault();
        _this = $(this);
        var url = new WidgedUrl;
      	sidebarWidgedSetting.showLoader();

        url.get({
            widged_type: 'chart',
            resource: 'chartNewSeries',
            params: {
                widged_id: _this.attr('data-widged-id')
            },
            success: function(res) {
            	var data = {
			      series : [res.data.series]
			    }

			    var template = Handlebars.compile($('.template-series-item').html());
				var output = template(data);
			    $('.series-item-wrapper').append(output);
      			sidebarWidgedSetting.hideLoader();
      			sidebarSeriesSetting.showLoader();

                url.get({
		            widged_type: 'chart',
		            resource: 'chartSeriesSetting',
		            params: {
		                id: res.data.id
		            },
		            success: function(res) {
        				$dashboard.showSidePage(sidebarSeriesSetting, false, sidebarWidgedSetting)
		                sidebarSeriesSetting.find('.sidebar-body').html(res.html)
		            },
		            fail: function(res) {},
		            always: function(res) {
		            	sidebarSeriesSetting.hideLoader();
		            }
		        })
            },
            fail: function(res) {},
            always: function(res) {
            	sidebarWidgedSetting.hideLoader();
            }
        })
    });

    $(document).on('change', 'select#data_table', function(event) {
      var _this = $(this);
      var url = new WidgedUrl;
      sidebarSeriesSetting.showLoader();
      url.get({
          widged_type: 'chart',
          resource: 'chartGetField',
          params: {
              table: _this.val()
          },
          success: function(res) {
          	var data = res.data;
			
		    var source = `
		    {{#tables}}<option data-type="{{type}}" value="{{name}}">{{name}}</option>{{/tables}}
		    `;
            
			var template = Handlebars.compile(source);
			var output = template(data);
			sidebarSeriesSetting.find('select#formula_field, select#x_axis_field, select#cond_field').html((output))
        	sidebarSeriesSetting.find('#formula_field').val(sidebarSeriesSetting.find('#formula_field').attr('data-value'))
            sidebarSeriesSetting.find('#x_axis_field').val(sidebarSeriesSetting.find('#x_axis_field').attr('data-value'))
        	sidebarSeriesSetting.find('#cond_field').val(sidebarSeriesSetting.find('#cond_field').attr('data-value'))
			sidebarSeriesSetting.find('select#formula_field, select#x_axis_field, select#cond_field, select#cond_field').trigger('chosen:updated')
            sidebarSeriesSetting.find('#x_axis_field').trigger('change')

          },
          fail: function(res) {},
	      always: function(res) {
	        sidebarSeriesSetting.hideLoader();
	      }
      })
    })

    function resizeChart() {
        
        $('[data-widged-type="chart"]').each(function(index, el) {
            var widged = new Widged;
            widged = widged.target($(this));

            var boxHeight = parseInt($(this).find('.box').height()) - 100;
            var boxWidth = parseInt($(this).find('.box').width()) - 10;
            var widgedId = widged.meta.get('id');
            
            var adjustWidth = 0;
            
            $(this).find('.chart-instance').css('height', boxHeight);
            $(this).find('.highcharts-container').css('height', boxHeight);
            $(this).find('.chart-instance').css('width', boxWidth-adjustWidth);
            $(this).find('.highcharts-container').css('width', boxWidth-adjustWidth);
            setTimeout(function(){
                chartWidgedInstance[widgedId].setSize(boxWidth-adjustWidth, boxHeight, false);
            }, 200);

        }); 
    }

    resizeChart();

    $('.grid-stack').on('resizestop', function(event, ui){
        resizeChart();
    });

    $('.grid-stack').on('resize', function(event, ui){
        resizeChart();
    });

    $(document).on('change', 'select#x_axis_field', function(event) {
        event.preventDefault();
        if ($(this).find('option:selected').attr('data-type') == 'datetime') {
            $('.grouping-wrapper').show();
        } else {
            $('.grouping-wrapper').hide();
        }
    });
})
