<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
  function domo() {

    // Binding keys
    $('*').bind('keydown', 'Ctrl+s', function assets() {
      $('#btn_save').trigger('click');
      return false;
    });

    $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_cancel').trigger('click');
      return false;
    });

    $('*').bind('keydown', 'Ctrl+d', function assets() {
      $('.btn_save_back').trigger('click');
      return false;
    });

  }

  jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Mailer <small>Edit Mailer</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class=""><a href="<?= admin_site_url('/mailer'); ?>">Mailer</a></li>
    <li class="active">Edit</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-body ">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header ">
              <div class="widget-user-image">
                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Mailer</h3>
              <h5 class="widget-user-desc">Edit Mailer</h5>
              <hr>
            </div>
            <?= form_open(admin_base_url('/mailer/edit_save/' . $this->uri->segment(4)), [
              'name'    => 'form_mailer',
              'class'   => 'form-horizontal form-step',
              'id'      => 'form_mailer',
              'method'  => 'POST'
            ]); ?>

            <?php
            $user_groups = $this->model_group->get_user_group_ids();
            ?>




            <div class="form-group ">
              <label for="email_id" class="col-sm-2 control-label">Email Id
                <i class="required">*</i>
              </label>
              <div class="col-sm-8">
                <select class="form-control chosen chosen-select-deselect" name="email_id" id="email_id" data-placeholder="Select Email Id">
                  <option value=""></option>
                  <?php foreach (db_get_all_data('email') as $row) : ?>
                    <option <?= $row->id ==  $mailer->email_id ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->title; ?></option>
                  <?php endforeach; ?>
                </select>
                <small class="info help-block">
                  <b>Input Email Id</b> Max Length : 11.</small>
              </div>
            </div>







            <div class="form-group ">
              <label for="mail_to" class="col-sm-2 control-label">Mail To
                <i class="required">*</i>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="mail_to" id="mail_to" placeholder="Mail To" value="<?= set_value('mail_to', $mailer->mail_to); ?>">
                <small class="info help-block">
                  <b>Input Mail To</b> Max Length : 255.</small>
              </div>
            </div>





            <div class="form-group ">
              <label for="status" class="col-sm-2 control-label">Status
                <i class="required">*</i>
              </label>
              <div class="col-sm-8">
                <select class="form-control chosen chosen-select" name="status" id="status" data-placeholder="Select Status">
                  <option value=""></option>
                  <option <?= $mailer->status == "pending" ? 'selected' : ''; ?> value="pending">pending</option>
                  <option <?= $mailer->status == "sent" ? 'selected' : ''; ?> value="sent">sent</option>
                  <option <?= $mailer->status == "failed" ? 'selected' : ''; ?> value="failed">failed</option>
                </select>
                <small class="info help-block">
                </small>
              </div>
            </div>




            <div class="message"></div>
            <div class="row-fluid col-md-7 container-button-bottom">
              <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
              </button>
              <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
              </a>
              <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
              </a>
              <span class="loading loading-hide">
                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                <i><?= cclang('loading_saving_data'); ?></i>
              </span>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
        <!--/box body -->
      </div>
      <!--/box -->
    </div>
  </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
  $(document).ready(function() {



    $('#btn_cancel').click(function() {
      swal({
          title: "Are you sure?",
          text: "the data that you have created will be in the exhaust!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes!",
          cancelButtonText: "No!",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm) {
          if (isConfirm) {
            window.location.href = ADMIN_BASE_URL + '/mailer';
          }
        });

      return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
      $('.message').fadeOut();

      var form_mailer = $('#form_mailer');
      var data_post = form_mailer.serializeArray();
      var save_type = $(this).attr('data-stype');
      data_post.push({
        name: 'save_type',
        value: save_type
      });

      $('.loading').show();

      $.ajax({
          url: form_mailer.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if (res.success) {
            var id = $('#mailer_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }

            $('.message').printMessage({
              message: res.message
            });
            $('.message').fadeIn();
            $('.data_file_uuid').val('');

          } else {
            if (res.errors) {
              parseErrorField(res.errors);
            }
            $('.message').printMessage({
              message: res.message,
              type: 'warning'
            });
          }

        })
        .fail(function() {
          $('.message').printMessage({
            message: 'Error save data',
            type: 'warning'
          });
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({
            scrollTop: $(document).height()
          }, 2000);
        });

      return false;
    }); /*end btn save*/





    async function chain() {}

    chain();




  }); /*end doc ready*/
</script>