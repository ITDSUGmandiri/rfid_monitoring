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
    Email Template <small><?= cclang('new', ['Email Template']); ?> </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class=""><a href="<?= admin_site_url('/email_template'); ?>">Email Template</a></li>
    <li class="active"><?= cclang('new'); ?></li>
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
              <h3 class="widget-user-username">Email Template</h3>
              <h5 class="widget-user-desc"><?= cclang('new', ['Email Template']); ?></h5>
              <hr>
            </div>
            <?= form_open('', [
              'name'    => 'form_email_template',
              'class'   => 'form-horizontal form-step',
              'id'      => 'form_email_template',
              'enctype' => 'multipart/form-data',
              'method'  => 'POST'
            ]); ?>
            <?php
            $user_groups = $this->model_group->get_user_group_ids();
            ?>

            <div class="form-group ">
              <label for="subject" class="col-sm-2 control-label">Subject
                <i class="required">*</i>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?= set_value('subject'); ?>">
                <small class="info help-block">
                  shortcode : <code>{username}</code> <code>{fullname}</code> <code>{email}</code> <code>{code6}</code> <code>{code_link}</code>
                </small>
              </div>
            </div>



            <div class="form-group ">
              <label for="body" class="col-sm-2 control-label">Body
                <i class="required">*</i>
              </label>
              <div class="col-sm-8">
                <textarea id="body" name="body" rows="5" cols="80"><?= set_value('Body'); ?></textarea>
                <small class="info help-block">
                  shortcode : <code>{username}</code> <code>{fullname}</code> <code>{email}</code> <code>{code6}</code> <code>{code_link}</code>
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
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
  $(document).ready(function() {

    CKEDITOR.replace('body');
    var body = CKEDITOR.instances.body;

    $('#btn_cancel').click(function() {
      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
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
            window.location.href = ADMIN_BASE_URL + '/email_template';
          }
        });

      return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
      $('.message').fadeOut();
      $('#body').val(body.getData());

      var form_email_template = $('#form_email_template');
      var data_post = form_email_template.serializeArray();
      var save_type = $(this).attr('data-stype');

      data_post.push({
        name: 'save_type',
        value: save_type
      });

      $('.loading').show();

      $.ajax({
          url: ADMIN_BASE_URL + '/email_template/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('.steps li').removeClass('error');
          $('form').find('.error-input').remove();
          if (res.success) {

            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }

            $('.message').printMessage({
              message: res.message
            });
            $('.message').fadeIn();
            resetForm();
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
            body.setData('');

          } else {
            if (res.errors) {

              $.each(res.errors, function(index, val) {
                $('form #' + index).parents('.form-group').addClass('has-error');
                $('form #' + index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">` + val + `</div>
                      `);
              });
              $('.steps li').removeClass('error');
              $('.content section').each(function(index, el) {
                if ($(this).find('.has-error').length) {
                  $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                }
              });
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








  }); /*end doc ready*/
</script>