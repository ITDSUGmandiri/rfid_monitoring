<div class="col-md-12 no-padding">
  <?=
  form_open(ADMIN_NAMESPACE_URL . '/widgeds/save_widged_chart', [
    'class' => 'form-horizontal',
    'id' => 'formSeriesSetting',
    'medhod' => 'POST'
  ]);


  ?>

  <input type="hidden" name="widged_type" id="widged_type" value="chart">
  <input type="hidden" name="id" id="id" value="<?= $series->id ?>">
  <input type="hidden" name="widged" id="widged" value="chart">



  <div class="col-md-12 "><b>
      <h4 class="text-primary sidebar-lagend-label"><?= cclang('chart') ?></h4>
    </b>
  </div>
  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('type') ?></b>
      </div>
      <select class="chosen chosen-select form-control" name="type" id="type">
        <option <?= $series->type == 'bar' ? 'selected' : '' ?> value="bar">Bar</option>
        <option <?= $series->type == 'line' ? 'selected' : '' ?> value="line">Line</option>
        <option <?= $series->type == 'area' ? 'selected' : '' ?> value="area">Area</option>
      </select>
    </div>
  </div>


  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('label') ?></b>
      </div>
      <input type="text" class="form-control" name="label" id="label" placeholder="Label" value="<?= $series->label ?>">
    </div>
  </div>

  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('value_unit') ?></b>
      </div>
      <input type="text" class="form-control" name="value_unit" id="value_unit" placeholder="Value Unit" value="<?= $series->value_unit ?>">
    </div>
  </div>


  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('color') ?></b>
      </div>
      <input type="text" class="spectrum-basic form-control" name="color" id="color" placeholder="Color" value="<?= $series->color ?>">
    </div>
  </div>
  <hr>




  <div class="col-md-12 "><b>
      <h4 class="text-primary sidebar-lagend-label"><?= cclang('data') ?></h4>
    </b>
  </div>




  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('table') ?></b>
      </div>
      <select class="chosen chosen-select form-control" name="data_table" id="data_table" data-placeholder="Select table">
        <option value=""></option>
        <?php foreach ($tables as $table) : ?>
          <option <?= $table == $series->data_table ? 'selected' : '' ?> value="<?= $table ?>"><?= $table ?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>



  <div class="col-md-12 "><b>
      <h4 class="text-primary sidebar-lagend-label"><?= cclang('condition') ?></h4>
    </b>
  </div>






  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1 margin-top-10">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('where') ?></b>
      </div>
      <select data-value="<?= @$condition->cond_field ?>" class="chosen chosen-select-deselect form-control" name="cond_field" id="cond_field">
      </select>
    </div>


    <div class="col-sm-10 col-md-offset-1 margin-top-10 ">


      <select class="chosen chosen-select-deselect form-control" name="cond_operator" id="cond_operator">
        <?php foreach ([
          '' => '',
          '=' => 'equal =',
          '>' => 'greater than >',
          '<' => 'smaller than <',
          '!=' => 'not equal !='
        ] as $key => $val) : ?>
          <option <?= @$condition->cond_operator == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= ucfirst($val) ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="col-sm-10 col-md-offset-1 margin-top-10">

      <input type="text" class="form-control" name="cond_value" id="cond_value" placeholder="Value " value="<?= @$condition->cond_value ?>">
    </div>
  </div>






  <hr>
  <div class="col-md-12 "><b>
      <h4 class="text-primary sidebar-lagend-label"><?= cclang('y_axis') ?></h4>
    </b>
  </div>
  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('formula') ?></b>
      </div>
      <select class="chosen chosen-select form-control" name="formula" id="formula">
        <option <?= $series->formula == 'count' ? 'selected' : '' ?> value="count">COUNT</option>
        <option <?= $series->formula == 'sum' ? 'selected' : '' ?> value="sum">SUM</option>
      </select>
    </div>


    <div class="col-sm-10 col-md-offset-1 margin-top-10">
      <div class="label-stacked-input">
        <b class="text-success"><?= cclang('by_field') ?></b>
      </div>
      <select data-value="<?= $series->formula_field ?>" class="chosen chosen-select form-control" name="formula_field" id="formula_field">
      </select>
    </div>
  </div>


  <hr>

  <div class="col-md-12 "><b>
      <h4 class="text-primary sidebar-lagend-label"><?= cclang('x_axis') ?></h4>
    </b>
  </div>
  <div class="form-group ">

    <div class="col-sm-10 col-md-offset-1">
      <div class="label-stacked-input">
        <b><?= cclang('field_ref') ?></b>
      </div>
      <select data-value="<?= $series->x_axis_field ?>" class="chosen chosen-select form-control" name="x_axis_field" id="x_axis_field">
      </select>
    </div>


    <div class="col-sm-10 col-md-offset-1 margin-top-10 grouping-wrapper">
      <div class="label-stacked-input">
        <b><?= cclang('grouping_by_date') ?></b>
      </div>

      <select class="chosen chosen-select form-control" name="x_axis_grouping" id="x_axis_grouping">
        <?php foreach (['yes', 'no'] as $val) : ?>
          <option <?= $series->x_axis_grouping == $val ? 'selected' : '' ?> value="<?= $val ?>"><?= ucfirst($val) ?></option>
        <?php endforeach ?>
      </select>
    </div>

  </div>



</div>




</p>

</div>
<div class="clear">

</div>


<div class=" col-xs-10 col-xs-offset-1 margin-top-20">
  <span class="loading loading-hide"><img src="<?= BASE_ASSET ?>img/loading-spin-primary.svg"> <i><?= cclang('loading_getting_data') ?></i></span>

  <button type="submit" id="btn-save-series" class="btn pull-right btn-save-series btn-primary btn-flat"><?= cclang('save_change') ?></button>
  <a type="submit" id="btn-remove-series" class="btn pull-left text-danger btn-remove-series" data-series-id="<?= $series->id ?>"><?= cclang('delete') ?></a>
</div>
</form>
</div>


<script>
  $(function() {
    $dashboard.initChosen();
    $(document).find('.spectrum-basic').spectrum({
      allowEmpty: true,
      showInput: true,
      containerClassName: "full-spectrum",
      showInitial: true,
      showPalette: true,
      showSelectionPalette: true,
      showAlpha: true,
      maxPaletteSize: 10,
      preferredFormat: "hex",
      localStorageKey: "spectrum.cicool"
    });
  })
</script>