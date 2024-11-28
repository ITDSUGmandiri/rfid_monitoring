<section class="content">

  <div class="row">

    <div class="col-md-12">
      <div class="upload-module-container display-none">
        <center>
          <br>
          <?= form_open_multipart() ?>

          <div class="upload-module-input-file-container">
            <h3 class="text-muted">Upload module .zip file only</h3>
            <hr>
            <div class="col-md-2 col-md-offset-4"><input type="file" name="file"></div>
            <div class="col-md-2"><button type="submit" class="btn btn-sm pull-right">Install Now</button></div>
            <br>
            </form>
            <br>
          </div>

          <div class="clearfix"></div>
        </center>
        <div class="clearfix"></div>

      </div>
    </div>

    <div class="col-md-12">
      <div>

        <?php foreach ($modules as $module) :
          list($cicool, $regid) = explode('/', $module->path);
          $logo = BASE_ASSET . 'img/icon-80x80.png';
        ?>
          <div class="col-md-6 nopadding padd-left-0">
            <div class="box-extension  clearfix">
              <div class="extension-body">
                <div class="col-md-3">
                  <img src="<?= empty($module->icon) ? $logo :  $module->icon  ?>" width="90" height="90">
                </div>
                <div class="col-md-6">
                  <div class="extension-title"><a target="blank" href="<?= ('https://github.com/' . $module->path) ?>"><?= $module->name ?></a></div>
                  <p><?= $module->description ?></p>
                  <i>by : <a href="#"><?= $module->author ?></a></i>
                  <br>
                  <?php
                  $equals = preg_match('/(>=|<=)/', $module->compatible, $matches);
                  $version = preg_replace('/(>=|<=|=)/', '', $module->compatible);
                  $operator = isset($matches[0]) ? $matches[0] : '==';
                  $compatible = eval(' return "' . VERSION . '" ' . $operator . ' "' . $version . '";');
                  ?>

                  <?php if ($compatible) : ?>
                    <small><i class="fa fa-check text-success"></i> compatible for your cicool version</small>
                  <?php else : ?>
                    <small><i class="fa fa-times"></i> not compatible requirement <?= $module->compatible ?></small>
                  <?php endif ?>
                  <br>

                </div>
                <div class="col-md-3">
                  <?php

                  $classInstall = '';
                  $classUpdate = 'display-none';

                  if (!$compatible) {
                    $classInstall = 'display-none';
                    $classUpdate = 'display-none';
                  }
                  $up_to_date = true;
                  $path = EXTENSION_PATH . $regid . '/ext.json';
                  if (is_file($path)) {
                    $file = file_get_contents($path);
                    $file = json_decode($file);
                    $current_version = $file->version;
                    if ($module->version !== $current_version) {
                      $up_to_date = false;
                    } else {
                      $classInstall = 'display-none';
                      $classUpdate = 'display-none';
                    }
                  }

                  ?>

                  <a href="<?= $module->url ?>" target="blank" data-href="<?= admin_site_url('/module/update?ex=' . $module->path) ?>" class="btn btn-sm btn-default btn-flat pull-right btn-update-module">Get Module</a>

                </div>
                <div class="row-fluid">
                  <div class="col-md-12 padding-0">
                    <center>
                      <div class="hide progress-download-module"></div>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>


<script>
  $(document).ready(function() {

    "use strict";

    $('.btn-install-module-toggle').on('click', function(event) {
      event.preventDefault();
      $('.upload-module-container').toggle();
    });

    $('.remove-data').on('click', function() {

      var url = $(this).attr('data-href');

      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
          cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm) {
          if (isConfirm) {
            document.location.href = url;
          }
        });

      return false;
    });


    $('#apply').on('click', function() {

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_module').serialize();

      if (bulk.val() == 'delete') {
        swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm) {
            if (isConfirm) {
              document.location.href = ADMIN_BASE_URL + '/module/delete?' + serialize_bulk;
            }
          });

        return false;

      } else if (bulk.val() == '') {
        swal({
          title: "Upss",
          text: "<?= cclang('please_choose_bulk_action_first'); ?>",
          type: "warning",
          showCancelButton: false,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Okay!",
          closeOnConfirm: true,
          closeOnCancel: true
        });

        return false;
      }

      return false;

    });

    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {
      if (event.type == 'ifChecked') {
        checkboxes.iCheck('check');
      } else {
        checkboxes.iCheck('uncheck');
      }
    });

    checkboxes.on('ifChanged', function(event) {
      if (checkboxes.filter(':checked').length == checkboxes.length) {
        checkAll.prop('checked', 'checked');
      } else {
        checkAll.removeProp('checked');
      }
      checkAll.iCheck('update');
    });

  }); /*end doc ready*/
</script>