<div class="col-md-12">
  <?=
  form_open(ADMIN_NAMESPACE_URL . '/widgeds/save_widged_chart', [
    'class' => 'form-horizontal',
    'id' => 'formSetupWidgedChart',
    'medhod' => 'POST'
  ]);

  ?>


  <input type="hidden" name="widged_type" id="widged_type" value="chart">
  <input type="hidden" name="id" id="id" value="">
  <input type="hidden" name="widged" id="widged" value="chart">

  <div class="form-group ">
    <label for="name" class="col-sm-3 control-label"><?= cclang('label') ?> <i class="required">*</i></label>

    <div class="col-sm-8">
      <input type="text" class="" name="label" id="label" placeholder="Label" value="">
    </div>
  </div>
  <hr>


  <div class="col-md-12 "><b>
      <h4 class="text-primary sidebar-lagend-label">Data</h4>
    </b>
  </div>


  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('table') ?></b>
      </div>
      <select class="chosen chosen-select form-control" name="table_reff" id="table_reff">
        <option value="sum">Field 1</option>
        <option value="average">Field 2</option>
      </select>
    </div>
  </div>

  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('field') ?></b>
      </div>
      <select class="chosen chosen-select form-control" name="formula" id="formula">
        <option value="sum">Field 1</option>
        <option value="average">Field 2</option>
      </select>
    </div>


  </div>
  <hr>
  <div class="col-md-12 "><b>
      <h4 class="text-primary sidebar-lagend-label">Y Axis</h4>
    </b>
  </div>
  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('formula') ?></b>
      </div>
      <select class="chosen chosen-select form-control" name="formula" id="formula">
        <option value="count">COUNT</option>
        <option value="sum">SUM</option>
      </select>
    </div>


    <div class="col-sm-10 col-md-offset-1 margin-top-10">
      <div class="label-stacked-input">
        <b class="text-success">By Field</b>
      </div>
      <select class="chosen chosen-select form-control" name="formula" id="formula">
        <option value="count">field 1</option>
      </select>
    </div>
  </div>


  <hr>

  <div class="col-md-12 "><b>
      <h4 class="text-primary sidebar-lagend-label">X Axis</h4>
    </b>
  </div>
  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b><?= cclang('date_time_field_reff') ?></b>
      </div>
      <select class="chosen chosen-select form-control" name="formula" id="formula">
        <option value="sum">Field 1</option>
        <option value="average">Field 2</option>
      </select>
    </div>

  </div>



</div>




</p>

</div>

<div class="col-xs-9 col-xs-offset-2">
  <span class="loading loading-hide"><img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> <i><?= cclang('loading_getting_data') ?></i></span>

  <button type="submit" id="btnCreateProject" class="btn pull-right   btn-primary btn-flat"><?= cclang('save_change') ?></button>
</div>
</form>
</div>


<script>
  $(function() {
    $dashboard.initChosen();
  })
</script>