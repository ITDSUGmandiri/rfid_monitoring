<script type="text/javascript">
    function domo() {

        $('*').bind('keydown', 'Ctrl+s', function() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<style>
    #f5ba1a: #f5ba1a;
    #000000: #000000;
    #cccccc: #cccccc;


    body {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 14px;
        background: #f2f2f2;
    }

    .clearfix {
        &:after {
            content: "";
            display: block;
            clear: both;
            visibility: hidden;
            height: 0;
        }
    }

    .form_wrapper {
        background: #fff;
        width: 600px;
        max-width: 100%;
        box-sizing: border-box;
        padding: 25px;
        margin: 8% auto 0;
        position: relative;
        z-index: 1;
        border-top: 5px solid #f5ba1a;
        -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
        -webkit-transform-origin: 50% 0%;
        transform-origin: 50% 0%;
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
        -webkit-transition: none;
        transition: none;
        -webkit-animation: expand 0.8s 0.6s ease-out forwards;
        animation: expand 0.8s 0.6s ease-out forwards;
        opacity: 0;

        h2 {
            font-size: 1.5em;
            line-height: 1.5em;
            margin: 0;
        }

        .title_container {
            text-align: center;
            padding-bottom: 15px;
        }

        h3 {
            font-size: 1.1em;
            font-weight: normal;
            line-height: 1.5em;
            margin: 0;
        }

        label {
            font-size: 12px;
        }

        .row {
            margin: 0px -15px;

            >div {
                padding: 0 15px;
                box-sizing: border-box;
            }
        }

        .col_half {
            width: 50%;
            float: left;
        }

        .input_field {
            position: relative;
            margin-bottom: 20px;
            -webkit-animation: bounce 0.6s ease-out;
            animation: bounce 0.6s ease-out;

            >span {
                position: absolute;
                left: 0;
                top: 0;
                color: #333;
                height: 100%;
                border-right: 1px solid #cccccc;
                text-align: center;
                width: 30px;

                >i {
                    padding-top: 10px;
                }
            }
        }

        .textarea_field {
            >span {
                >i {
                    padding-top: 10px;
                }
            }
        }

        input {

            &[type="text"],
            &[type="email"],
            &[type="password"] {
                width: 100%;
                padding: 8px 10px 9px 35px;
                height: 35px;
                border: 1px solid #cccccc;
                box-sizing: border-box;
                outline: none;
                -webkit-transition: all 0.30s ease-in-out;
                -moz-transition: all 0.30s ease-in-out;
                -ms-transition: all 0.30s ease-in-out;
                transition: all 0.30s ease-in-out;
            }

            &[type="text"]:hover,
            &[type="email"]:hover,
            &[type="password"]:hover {
                background: #fafafa;
            }

            &[type="text"]:focus,
            &[type="email"]:focus,
            &[type="password"]:focus {
                -webkit-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
                -moz-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
                box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
                border: 1px solid #f5ba1a;
                background: #fafafa;
            }

            &[type="submit"] {
                background: #f5ba1a;
                height: 35px;
                line-height: 35px;
                width: 100%;
                border: none;
                outline: none;
                cursor: pointer;
                color: #fff;
                font-size: 1.1em;
                margin-bottom: 10px;
                -webkit-transition: all 0.30s ease-in-out;
                -moz-transition: all 0.30s ease-in-out;
                -ms-transition: all 0.30s ease-in-out;
                transition: all 0.30s ease-in-out;

                &:hover {
                    background: darken(#f5ba1a, 7%);
                }

                &:focus {
                    background: darken(#f5ba1a, 7%);
                }
            }

            &[type="checkbox"],
            &[type="radio"] {
                border: 0;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
        }
    }

    .form_container {
        .row {
            .col_half.last {
                border-left: 1px solid #cccccc;
            }
        }
    }

    .checkbox_option {
        label {
            margin-right: 1em;
            position: relative;

            &:before {
                content: "";
                display: inline-block;
                width: 0.5em;
                height: 0.5em;
                margin-right: 0.5em;
                vertical-align: -2px;
                border: 2px solid #cccccc;
                padding: 0.12em;
                background-color: transparent;
                background-clip: content-box;
                transition: all 0.2s ease;
            }

            &:after {
                border-right: 2px solid #000000;
                border-top: 2px solid #000000;
                content: "";
                height: 20px;
                left: 2px;
                position: absolute;
                top: 7px;
                transform: scaleX(-1) rotate(135deg);
                transform-origin: left top;
                width: 7px;
                display: none;
            }
        }

        input {
            &:hover+label:before {
                border-color: #000000;
            }

            &:checked+label {
                &:before {
                    border-color: #000000;
                }

                &:after {
                    -moz-animation: check 0.8s ease 0s running;
                    -webkit-animation: check 0.8s ease 0s running;
                    animation: check 0.8s ease 0s running;
                    display: block;
                    width: 7px;
                    height: 20px;
                    border-color: #000000;
                }
            }
        }
    }

    .radio_option {
        label {
            margin-right: 1em;

            &:before {
                content: "";
                display: inline-block;
                width: 0.5em;
                height: 0.5em;
                margin-right: 0.5em;
                border-radius: 100%;
                vertical-align: -3px;
                border: 2px solid #cccccc;
                padding: 0.15em;
                background-color: transparent;
                background-clip: content-box;
                transition: all 0.2s ease;
            }
        }

        input {
            &:hover+label:before {
                border-color: #000000;
            }

            &:checked+label:before {
                background-color: #000000;
                border-color: #000000;
            }
        }
    }

    .select_option {
        position: relative;
        width: 100%;

        select {
            display: inline-block;
            width: 100%;
            height: 35px;
            padding: 0px 15px;
            cursor: pointer;
            color: #7b7b7b;
            border: 1px solid #cccccc;
            border-radius: 0;
            background: #fff;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            transition: all 0.2s ease;

            &::-ms-expand {
                display: none;
            }

            &:hover,
            &:focus {
                color: #000000;
                background: #fafafa;
                border-color: #000000;
                outline: none;
            }
        }
    }

    .select_arrow {
        position: absolute;
        top: calc(50% - 4px);
        right: 15px;
        width: 0;
        height: 0;
        pointer-events: none;
        border-width: 8px 5px 0 5px;
        border-style: solid;
        border-color: #7b7b7b transparent transparent transparent;
    }

    .select_option select {

        &:hover+.select_arrow,
        &:focus+.select_arrow {
            border-top-color: #000000;
        }
    }

    .credit {
        position: relative;
        z-index: 1;
        text-align: center;
        padding: 15px;
        color: #f5ba1a;

        a {
            color: darken(#f5ba1a, 7%);
        }
    }

    @-webkit-keyframes check {
        0% {
            height: 0;
            width: 0;
        }

        25% {
            height: 0;
            width: 7px;
        }

        50% {
            height: 20px;
            width: 7px;
        }
    }

    @keyframes check {
        0% {
            height: 0;
            width: 0;
        }

        25% {
            height: 0;
            width: 7px;
        }

        50% {
            height: 20px;
            width: 7px;
        }
    }

    @-webkit-keyframes expand {
        0% {
            -webkit-transform: scale3d(1, 0, 1);
            opacity: 0;
        }

        25% {
            -webkit-transform: scale3d(1, 1.2, 1);
        }

        50% {
            -webkit-transform: scale3d(1, 0.85, 1);
        }

        75% {
            -webkit-transform: scale3d(1, 1.05, 1);
        }

        100% {
            -webkit-transform: scale3d(1, 1, 1);
            opacity: 1;
        }
    }

    @keyframes expand {
        0% {
            -webkit-transform: scale3d(1, 0, 1);
            transform: scale3d(1, 0, 1);
            opacity: 0;
        }

        25% {
            -webkit-transform: scale3d(1, 1.2, 1);
            transform: scale3d(1, 1.2, 1);
        }

        50% {
            -webkit-transform: scale3d(1, 0.85, 1);
            transform: scale3d(1, 0.85, 1);
        }

        75% {
            -webkit-transform: scale3d(1, 1.05, 1);
            transform: scale3d(1, 1.05, 1);
        }

        100% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            opacity: 1;
        }
    }


    @-webkit-keyframes bounce {
        0% {
            -webkit-transform: translate3d(0, -25px, 0);
            opacity: 0;
        }

        25% {
            -webkit-transform: translate3d(0, 10px, 0);
        }

        50% {
            -webkit-transform: translate3d(0, -6px, 0);
        }

        75% {
            -webkit-transform: translate3d(0, 2px, 0);
        }

        100% {
            -webkit-transform: translate3d(0, 0, 0);
            opacity: 1;
        }
    }

    @keyframes bounce {
        0% {
            -webkit-transform: translate3d(0, -25px, 0);
            transform: translate3d(0, -25px, 0);
            opacity: 0;
        }

        25% {
            -webkit-transform: translate3d(0, 10px, 0);
            transform: translate3d(0, 10px, 0);
        }

        50% {
            -webkit-transform: translate3d(0, -6px, 0);
            transform: translate3d(0, -6px, 0);
        }

        75% {
            -webkit-transform: translate3d(0, 2px, 0);
            transform: translate3d(0, 2px, 0);
        }

        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            opacity: 1;
        }
    }

    @media (max-width: 600px) {
        .form_wrapper {
            .col_half {
                width: 100%;
                float: none;
            }
        }

        .bottom_row {
            .col_half {
                width: 50%;
                float: left;
            }
        }

        .form_container {
            .row {
                .col_half.last {
                    border-left: none;
                }
            }
        }

        .remember_me {
            padding-bottom: 20px;
        }
    }
</style>
<section class="content-header">
    <h1>
        Form Peminjaman Aset
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_pinjam_log'); ?>">Tb Pinjam Log</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <div class="box box-widget widget-user-2">
                        <div class="form_wrapper">
                            <div class="form_container">
                                <div class="title_container">
                                    <h2>Isi Data Peminjaman</h2>
                                </div>
                                <div class="row clearfix">
                                    <div class="">
                                        <form method="POST" action="simpan_data">
                                            <div class="row clearfix">
                                                <div class="col_half">
                                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                                        <input type="text" name="namef" placeholder="Nama Depan" />
                                                    </div>
                                                </div>
                                                <div class="col_half">
                                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                                        <input type="text" name="nameb" placeholder="Nama Belakang" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                                                <input type="text" name="alamat" placeholder="Alamat Peminjam" required />
                                            </div>
                                            <div class="input_field select_option">
                                                <select>
                                                    <option value="">Pilih Pekerjaan</option>
                                                    <?php
                                                    $conditions = [];
                                                    ?>

                                                    <?php foreach (db_get_all_data('tb_kelompok_kerjaan', $conditions) as $row): ?>
                                                        <option value="<?= $row->kode ?>"><?= $row->jenis; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="select_arrow"></div>
                                            </div>
                                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                                                <input type="text" name="nohp" placeholder="No Hp Peminjam" required />
                                            </div>

                                            <div class="input_field select_option">
                                                <select class="input_field select_option chosen chosen-select" name="tag_code[]" id="tag_code" data-placeholder="Pilih Aset" multiple>
                                                    <option value=""></option>

                                                    <?php
                                                    $conditions = [];
                                                    ?>
                                                    <?php foreach (db_get_all_data('tb_asset_master', $conditions) as $row): ?>
                                                        <option value="<?= $row->tag_code ?>"><?= $row->nama_brg; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="select_arrow"></div>
                                            </div>
                                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control datepicker" name="tglawal" placeholder="tanggal pengambilan" required />
                                            </div>
                                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control datepicker" name="tglbalik" placeholder="tanggal pemulangan" required />
                                            </div>
                                            <div class="input_field">Silahkan Ambil Foto Peminjam</div>
                                            <div class="input_field col-md-6">

                                                <div id="my_camera"></div>

                                                <br />
                                                <div class="input_field">Hasil Foto Peminjam</div>
                                                <div class="input_field" id="results"></div>

                                                <input type=button value="Ambil Foto" onClick="take_snapshot()">

                                                <input type="hidden" name="image" class="image-tag">

                                            </div>


                                            <input class="button" type="submit" disabled value="Simpan Data" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script>
    var module_name = "tb_pinjam_log"
    var use_ajax_crud = false
</script>

<script>
    Webcam.set({

        width: 390,

        height: 290,

        image_format: 'png',

        jpeg_quality: 90

    });



    Webcam.attach('#my_camera');



    function take_snapshot() {

        Webcam.snap(function(data_uri) {

            $(".image-tag").val(data_uri);

            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';

        });

    }

    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';







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
                        window.location.href = ADMIN_BASE_URL + '/tb_pinjam_log';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(function() {
            $('.message').fadeOut();

            var form_tb_pinjam_log = $('#form_tb_pinjam_log_add');
            var data_post = form_tb_pinjam_log.serializeArray();
            var save_type = $(this).attr('data-stype');

            data_post.push({
                name: 'save_type',
                value: save_type
            });

            data_post.push({
                name: 'event_submit_and_action',
                value: window.event_submit_and_action
            });



            $('.loading').show();

            $.ajax({
                    url: ADMIN_BASE_URL + '/tb_pinjam_log/add_save',
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

                        if (use_ajax_crud) {
                            toastr['success'](res.message)
                        } else {

                            $('.message').printMessage({
                                message: res.message
                            });
                            $('.message').fadeIn();
                        }
                        showPopup(false)


                        resetForm();
                        $('.chosen option').prop('selected', false).trigger('chosen:updated');

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

                    if (use_ajax_crud == true) {

                        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_pinjam_log/index/?ajax=1'
                        reloadDataTable(url);
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