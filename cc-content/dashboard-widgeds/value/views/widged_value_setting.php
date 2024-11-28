<div class="template-condition-item cc-template">
  {{#conditions}}
    <div class="condition-item row" data-condition-id="{{id}}">
      <div class="form-group ">

        <div class="col-sm-8 col-md-offset-2 margin-top-10">
          <div class="label-stacked-input">
            <b class="text-success"><?= cclang('where') ?></b>
          </div>
          <select data-value="{{cond_field}}" class="{{chosen_select_deselect}} form-control" name="cond[{{id}}][cond_field]" id="cond_field">
            {{cond_field_html}}
          </select>
        </div>
        <div class="remove-condition-wrapper">
          <a href="#" class="btn-sm btn btn-danger btn-remove-condition"><i class="fa fa-trash"></i></a>
        </div>

        <div class="col-sm-8 col-md-offset-2 margin-top-10 ">
          <select data-value="{{cond_operator}}" class="{{chosen_select_deselect}} form-control" name="cond[{{id}}][cond_operator]" id="cond_operator">
            <option value="=">equal =</option>
            <option value="=">equal =</option>
            <option value=">">greater than ></option>
            <option value="<">smaller than << /option>
            <option value="!=">not equal !=</option>
            <option value="in">in list ex : a,b,more</option>
          </select>
        </div>
        <div class="col-sm-8 col-md-offset-2 margin-top-10">

          <input type="text" class="form-control" name="cond[{{id}}][cond_value]" id="cond_value" placeholder="Value " value="{{cond_value}}">
        </div>
      </div>
      <hr>

    </div>
  {{/conditions}}
</div>



<div class="col-md-12 no-padding">

  <?= $_view->startForm($widged); ?>

  <?php
  $colors = [
    'bg-red',
    'bg-yellow',
    'bg-aqua',
    'bg-blue',
    'bg-light-blue',
    'bg-green',
    'bg-navy',
    'bg-teal',
    'bg-olive',
    'bg-lime',
    'bg-orange',
    'bg-fuchsia',
    'bg-purple',
    'bg-maroon',
    'bg-black',
    'bg-red-active',
    'bg-yellow-active',
    'bg-aqua-active',
    'bg-blue-active',
    'bg-light-blue-active',
    'bg-green-active',
    'bg-navy-active',
    'bg-teal-active',
    'bg-olive-active',
    'bg-lime-active',
    'bg-orange-active',
    'bg-fuchsia-active',
    'bg-purple-active',
    'bg-maroon-active',
    'bg-black-active',
  ];
  ?>

  <hr>



  <div class="cc-page-setting-wrapper">

    <input type="hidden" value="<?= $child->icon ?>" name="icon" id="icon">

    <div class="icon-preview">
      <span class="icon-preview-item"><i class="fa <?= $child->icon ?> fa-lg"></i></span>
    </div>
    <a class="btn btn-default btn-select-icon btn-flat"><?= cclang('select_icon') ?></a>


    <div class="cc-input-wrapper">
      <b>Link<i class="required">*</i></b>
      <input type="" name="link" class="cc-input-sidebar" id="link" placeholder="Link" value="<?= $child->link ?>">
    </div>

    <div class="cc-input-wrapper">
      <b>Link Label<i class="required">*</i></b>
      <input type="" name="link_label" class="cc-input-sidebar" id="link_label" placeholder="Link Label" value="<?= $child->link_label ?>">
    </div>

    <div class="cc-input-wrapper">
      <b>Color <i class="required">*</i></b>
      <select class="chosen chosen-select form-control" name="color" id="color" data-placeholder="Select color">
        <option value=""></option>
        <?php foreach ($colors as $color) : ?>
          <option class="<?= $color ?>" <?= $color == $child->color ? 'selected' : '' ?> value="<?= $color ?>"><?= $color ?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
  <hr>



  <div class="tab-top-nav tab-pie-setting">
    <a href="#" class="tab-top-nav-btn btn-basic-mode pull-left active"><input class="tab-radio" type="radio" name="mode" value="basic">Basic Mode</a>
    <a href="#" class="tab-top-nav-btn btn-advance-mode pull-left"><input class="tab-radio" type="radio" name="mode" value="advance">Advance Mode</a>
  </div>

  <div class="cc-page-setting-wrapper">

    <div class="cc-input-wrapper">
      <b><?= cclang('table') ?><i class="required">*</i></b>
      <select class="chosen chosen-select form-control" name="table_reff" id="table_reff" data-placeholder="Select table">
        <option value=""></option>
        <?php foreach ($tables as $table) : ?>
          <option <?= $table == $child->table_reff ? 'selected' : '' ?> value="<?= $table ?>"><?= $table ?></option>
        <?php endforeach ?>
      </select>

    </div>
    <hr>

    <div class="cc-input-wrapper hide-advance-mode">
      <b><?= cclang('group_by') ?><i class="required">*</i></b>
      <select data-value="<?= $child->group_by_field ?>" class="chosen chosen-select form-control" name="group_by_field" id="group_by_field">
      </select>
    </div>
    <div class="cc-input-wrapper hide-advance-mode">
      <b><?= cclang('formula') ?><i class="required">*</i></b>
      <select class="chosen chosen-select form-control" name="formula" id="formula">
        <option <?= $child->formula == 'count' ? 'selected' : '' ?> value="count">COUNT</option>
        <option <?= $child->formula == 'sum' ? 'selected' : '' ?> value="sum">SUM</option>
      </select>
    </div>


    <div class="cc-input-wrapper hide-basic-mode">
      <b><?= cclang('SQL') ?><i class="required">*</i></b>
      <a href="#" class="btn pull-right btn-xs btn-value-run-code"><i class="fa  fa-play-circle-o"></i></a>
      <pre name="sql" id="sql" class="sql-code-pre" height="500">select </pre>
      <textarea name="sql" class="display-none"><?= $child->sql ?></textarea>
    </div>
    <hr>


    <div class="cc-input-wrapper">
      <b><?= cclang('datetime_field') ?><i class="required">*</i></b>
      <select data-value="<?= $child->datetime_field ?>" class="chosen chosen-select-deselect form-control" name="datetime_field" id="datetime_field" data-placeholder="Select field">
      </select>

    </div>


  </div>


  <div class="header-page header-page-setting hide-advance-mode">
    <div class="cc-page-title"><?= cclang('conditions') ?></div>
  </div>



  <div class="form-group hide-advance-mode">
    <label for="suffix" class="col-sm-2 control-label "></label>

    <div class="condition-item-wrapper col-md-10">
    </div>

    <div class="col-md-10 col-md-offset-2">
      <a class="fa btn fa-plus-circle btn-add-condition btn-default" data-widged-id="<?= $widged->id ?>">
      </a>
    </div>

  </div>


  <div class="header-page header-page-setting">
    <div class="cc-page-title"><?= cclang('style') ?></div>
  </div>





  <div class="cc-page-setting-wrapper">



    <div class="info-box widged-value-option-style selected">
      <label for="">
        <input type="radio" name="box_style" value="style_1">
      </label>
      <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Messages</span>
        <span class="info-box-number">1,410</span>
      </div>
    </div>

    <div class="small-box bg-aqua widged-value-option-style">
      <label for="">

        <input type="radio" name="box_style" value="style_2">
      </label>
      <div class="inner">
        <h3>150</h3>

        <p>New Orders</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>


    <div class="info-box bg-yellow widged-value-option-style">
      <label for="">
        <input type="radio" name="box_style" value="style_3">
      </label>
      <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Events</span>
        <span class="info-box-number">41,410</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
          70% Increase in 30 Days
        </span>
      </div>
    </div>

  </div>



  <hr>
  </p>
</div>

<?= $_view->endForm() ?>
</div>

<script src="<?= BASE_ASSET ?>ace-master/build/src/ace.js"></script>
<script src="<?= BASE_ASSET ?>ace-master/build/src/ext-language_tools.js"></script>
<script src="<?= BASE_ASSET ?>ace-master/build/src/ext-beautify.js"></script>
<script src="<?= BASE_ASSET ?>json-view/jquery.jsonview.js"></script>
<link rel="stylesheet" href="<?= BASE_ASSET ?>json-view/jquery.jsonview.css" />

<script>
  "use strict";

  var child = <?= json_encode((array)@$child) ?>;
  var conditions = <?= json_encode((array)@$conditions) ?>;

  function pieGetTableComplete() {
    var data = {
      conditions: conditions,
      chosen_select_deselect: 'chosen chosen-select-deselect'
    }
    var template = Handlebars.compile($('.template-condition-item').html());
    var output = template(data);
    var conditionItemWrapper = sidebarWidgedSetting.find('.condition-item-wrapper');
    conditionItemWrapper.append(output);

    conditionItemWrapper.find('#cond_field').html(sidebarWidgedSetting.find('#group_by_field').html());
    conditionItemWrapper.find('#cond_field').val(conditionItemWrapper.find('#cond_field').attr('data-value'))
    conditionItemWrapper.find('#cond_operator').val(conditionItemWrapper.find('#cond_operator').attr('data-value'))
    conditionItemWrapper.find('#cond_field, #cond_operator').addClass('chosen chosen-select-deselect')

    dashboard.initChosen();
    conditionItemWrapper.find('#cond_field, #cond_operator').trigger('chosen:updated');
  }
  $(function() {
    $('#table_reff').trigger('change')
    $dashboard.initChosen();


    $('.btn-select-icon').on('click', function(event) {
      event.preventDefault();

      $('#modalIcon').modal('show');
    });


    $('.icon-container').on('click', function(event) {
      $('#modalIcon').modal('hide');
      var icon = $(this).find('.icon-class').html();

      icon = $.trim(icon);

      $('#icon').val(icon);

      $('.icon-preview-item .fa').attr('class', 'fa fa-lg ' + icon);
    });




    ace.require("ace/ext/language_tools");
    var beautify = ace.require("ace/ext/beautify"); // get reference to extension

    var editor = ace.edit('sql');
    editor.destroy();
    var editor = ace.edit('sql');
    editor.setOptions({
      enableBasicAutocompletion: true,
      enableSnippets: true,
      enableLiveAutocompletion: true
    });
    editor.getSession().setMode("ace/mode/mysql");
    var sample = `
SELECT *, 
  count(category_id) y_axis 
FROM blog_category
GROUP BY category_name`;
    if (child.sql.length) {
      sample = child.sql;
    }
    editor.setValue(sample, 1);

    var ctabs = new CTabs;

    ctabs.init('.tab-pie-setting');

    setTimeout(function() {
      if (child.mode == 'advance') {
        switchAdvanceMode();
        ctabs.setActive('advance')
      } else {
        switchBasicMode();
        ctabs.setActive('basic')
      }
    }, 100);

    function runSql() {
      var url = new WidgedUrl;
      url.get({
        widged_type: 'value',
        resource: 'valueRunSql',
        params: {
          sql: editor.getValue()
        },
        success: function(res) {
          if (res.status) {
            $('.result-json').JSONView(res.data);
          } else {
            $('.result-json').html(`
                <div class="alert alert-danger">` + res.message + `</div>`);
          }
        },
        fail: function(res) {
          toastr['error'](res.message)
        },
        always: function(res) {}
      })
    }
    var intervalChange = null;
    editor.getSession().on('change', function() {
      $('[name="sql"]').val(editor.getValue())
      clearInterval(intervalChange)
      intervalChange = setTimeout(function() {
        runSql();
      }, 1000)
    })

    function updateBg() {
      var classBg = $('#color').find('option:selected').attr('class')
      $('#color').parent().find('.chosen-single').removeAttr('class').attr('class', `chosen-single ${classBg}`)
    }
    $(document).on('change', '#color', function() {
      updateBg();
    })

    updateBg();

    $(document).on('click', 'a.btn-value-run-code', function(event) {
      runSql();
    });


    function group_select() {
      var type = $('#category-icon-filter').val();
      $('.category-icon').hide();
      $('.category-icon#' + type).show();

      if (type == 'all') {
        $('.category-icon').show();
      }
    }

    $('#find-icon').keyup(function(event) {
      $('.icon-container').hide();
      $('.category-icon').show();
      $('#category-icon-filter').val('all')
      var search = $(this).val();

      $('.icon-class').each(function(index, el) {
        var str = $(this).html();
        var patt = new RegExp(search);
        var res = patt.test(str);

        if (res) {
          $(this).parent('.icon-container').show();
        }
      });
      $('.category-icon').each(function(index, el) {
        if ($(this).find('.icon-container:visible').length) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });

    });

    $('.category-icon').each(function(index) {
      $('#category-icon-filter').append('<option value="' + $(this).attr('id') + '">' + $(this).attr('id') + '</option>');
    });

    $('#category-icon-filter').on('change', function(event) {
      group_select();
    });

    function tplStyleSetting(obj) {
      $('.widged-value-option-style').removeClass('selected')
      obj.addClass('selected')
      obj.find('input').prop('checked', true)
    }

    $('.widged-value-option-style').on('click', function() {
      tplStyleSetting($(this))
    })


    tplStyleSetting($('[name="box_style"][value="<?= $child->box_style ?>"]').parents('.widged-value-option-style'))
  })
</script>