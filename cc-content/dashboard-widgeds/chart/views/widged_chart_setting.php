<div class="col-md-12 no-padding">
 
 <div class="template-series-item cc-template">
    {{#series}}
    <div class="series-item row"
      data-series-id="{{id}}"
      >
        <div class="col-sm-8">
         <a href="#" class="btn btn-default btn-series-detail btn-block">{{label}}</a>
        </div>
        <div class="col-sm-1">
         <a href="#" class="btn btn-danger btn-remove-series"><span class="fa fa-trash"></span></a>
        </div>
    </div>
    {{/series}}
 </div> 
  
<?= $_view->startForm($widged) ?>

    <div class="header-page-child">
      <div class="cc-page-title-child"><?= cclang('series') ?></div>
    </div>
    <div class="cc-page-setting-wrapper">
      
      <div class="form-group ">

          <div class="series-item-wrapper col-md-10">
          </div>

          <div class="col-md-10 ">
          <a class="fa btn fa-plus-circle btn-add-series btn-default"
          data-widged-id="<?= $widged->id ?>"
          >
          </a>
        </div>
            
    </div>
  
    </div>
    <hr>
  </p>
</div>

<?= $_view->endForm() ?>
</div>

<script>
  $(function(){
    var data = {
      series : <?= json_encode((array)$series) ?>
    }

    var template = Handlebars.compile($('.template-series-item').html());
    var output = template(data);
    $('.series-item-wrapper').html(output);
  })
</script>