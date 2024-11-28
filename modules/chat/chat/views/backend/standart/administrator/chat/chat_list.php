<link rel="stylesheet" href="<?= BASE_ASSET; ?>module/chat/package/emojione/extras/css/emojione.min.css" />
<link rel="stylesheet" href="<?= BASE_ASSET; ?>module/chat/package/emojify/dist/css/basic/emojify.min.css" />
<link rel="stylesheet" href="<?= BASE_ASSET; ?>fine-upload/fine-uploader-gallery.min.css">
<link rel="stylesheet" href="<?= BASE_ASSET; ?>module/chat/css/chat-main.css?uid=041020191422">
<script src="<?= BASE_ASSET; ?>module/chat/package/emojione/lib/js/emojione.min.js"></script>
<script src="<?= BASE_ASSET; ?>module/chat/package/emojify/dist/js/emojify.min.js"></script>
<script src="<?= BASE_ASSET; ?>js/jquery.hotkeys.js"></script>

<?php $this->load->view('core_template/fine_upload') ?>
<section class="content chat-content">
    <div class="">
        <div class="chat-box">
            <div class="col-md-3 chat-contact chat-contact-list">
                <h2>
                    <a class="btn-back-new-chat " href="">
                        <i class="fa fa-angle-left">
                        </i>
                    </a>
                    Chat
                    <a class="btn-new-chat " href="" title="New Chat">
                        <img alt="new chat" src="<?= BASE_ASSET ?>module/chat/img/chat-new.png">
                        </img>
                    </a>
                </h2>
                <div class="chat-search-wrapper">
                    <a class="btn-clear-search-input" href="#">
                        <i class="fa fa-times">
                        </i>
                    </a>
                    <input class="search-input form-control" placeholder="Search chat or user" type="text">
                    </input>
                </div>
                <div class="chat-contact-wrapper chat-contact-message-wrapper">
                </div>
                <div class="chat-contact-wrapper chat-search-message-wrapper">
                </div>
            </div>
            <div class="col-md-3 chat-contact new-chat-contact">
                <div class="new-chat-header">
                    <h2>
                        <a class="btn-back-chat " href="">
                            <i class="fa fa-angle-left">
                            </i>
                        </a>
                        New chat
                    </h2>
                    <div class="chat-search-wrapper">
                        <input class="form-control search-contact" placeholder="Search Contact" type="text">
                        </input>
                    </div>
                </div>
                <div class="chat-contact-wrapper chat-search-contact-wrapper">
                    <div class="new-contact-find-wrapper">
                    </div>
                    <?php foreach ($contacts as $contact) : ?>
                        <div class="chat-item chat-contact-list-item" data-user-email="<?= _ent($contact->email) ?>" data-user-fullname="<?= ucwords(_ent($contact->full_name)) ?>" data-user-group="<?= ucwords(_ent($contact->group)) ?>" data-user-id="<?= _ent($contact->id) ?>" data-user-username="<?= _ent($contact->username) ?>">
                            <div class="chat-contact-icon">
                                <img alt="" src="<?= admin_base_url('/chat/avatar/' . $contact->avatar) ?>" />
                            </div>
                            <div class="chat-header">
                                <h4>
                                    <?= ucwords(_ent($contact->full_name)) ?>
                                    <span class="chat-contact-group">
                                        <?= ucwords(_ent($contact->group)) ?>
                                    </span>
                                </h4>
                            </div>
                            <div class="chat-body">
                                <small>
                                </small>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-md-9 chat-contact-detail inactive">
                <div class="wrapper-nav-top-mobile">
                    <a class="btn-chat-top" href="">
                        Chat
                    </a>
                    <a class="btn-contact-top" href="">
                        Contact
                    </a>
                </div>
                <div class="chat-body-no-contact-selected">
                    <center>
                        <h2 class="text-muted">
                            Select a chat to start conversation!
                        </h2>
                    </center>
                </div>
                <div class="chat-detail-header">
                    <div class="dropdown pull-right dropdown-head mega-dropdown-menu animated bounceInDown">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
                            <i class="fa fa-paperclip">
                            </i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="btn-chat-file" href="#">
                                    <i class="fa fa-paperclip">
                                    </i>
                                    Attachment
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-detail-contact-icon">
                        <img alt="" src="<?= base_url('uploads/user/default.png') ?>">
                        </img>
                    </div>
                    <input class="chat-detail-username" type="hidden" value="">
                    <input class="chat-detail-id" type="hidden" value="">
                    <input class="chat-id" type="hidden" value="">
                    <div class="group-user-detail-wrapper">
                    </div>
                    <h4 class="">
                        <span class="chat-detail-name">
                        </span>
                        <span class="chat-contact-group">
                        </span>
                    </h4>
                    <div class="typing-indicator">
                        typing..
                    </div>
                    </input>
                    </input>
                    </input>
                </div>
                <div class="chat-detail-body">
                    <div class="chat-history-wrapper">
                        <div class="loading-chat-wrapper">
                        </div>
                        <div class="chat-history">
                        </div>
                        <div class="chat-item user-left chat-item-typing chat-item-typing-inactive ">
                            <div class="chat-avatar chat-user-typing-avatar">
                                <img alt="" src="<?= BASE_URL ?>uploads/user/default.png">
                                </img>
                            </div>
                            <div class="typing-animation">
                                <img alt="" src="<?= BASE_ASSET . '/module/chat/img/typing.svg'; ?>" width="30px">
                                </img>
                            </div>
                        </div>
                        <div class="chat-user">
                            <div class="bottom-button-wrapper display-none">
                                <div class="badge-count-will-read">
                                    0
                                </div>
                                <div class="btn-bottom-history">
                                    <center>
                                        <i class="fa fa-angle-down">
                                        </i>
                                    </center>
                                </div>
                            </div>
                            <div class="tab-chat-feature-wrapper-top display-none">
                                <?= $emoji_html ?>
                            </div>
                            <a class="btn-chat-sticker pull-left">
                                <center>
                                    <i class="fa fa-smile-o">
                                    </i>
                                </center>
                            </a>
                            <div class="chat-user-message-wrapper chat-user-msg-type-wrapper pull-left">
                                <div class="chat-message chat-message-user-send" contenteditable="" data-emojiable="true" name="" placeholder="Type message..">
                                </div>
                                <div class="sticker-container">
                                </div>
                            </div>
                            <div class="chat-user-footer">
                                <a class="btn-chat-send pull-right">
                                    <i class="fa fa-paper-plane-o">
                                    </i>
                                </a>
                            </div>
                            <div class="tab-chat-feature-wrapper display-none">
                                <a class="btn-close-feature pull-left">
                                    <center>
                                        <i class="fa fa-close">
                                        </i>
                                        <br>
                                        Close
                                        </br>
                                    </center>
                                </a>
                                <div class="clearfix">
                                </div>
                                <div id="chat_image_galery">
                                </div>
                                <div id="chat_image_galery_listed">
                                </div>
                                <center>
                                    <a class="btn btn-danger btn-close-upload " href="">
                                        <i class="fa fa-close">
                                        </i>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    'use strict';

    var userId = '<?= _ent(get_user_data('id')) ?>';
    var ccfb = {
        def_url: '<?= DEFAULT_URL ?>',
        key: '<?= KEY ?>',
    };
    var usr = {
        email: '<?= _ent(get_user_data('email')) ?>',
        uid: '<?= _ent(gen_user_id(get_user_data('id'))) ?>',
        id: '<?= _ent(get_user_data('id')) ?>',
    }

    function domo() {
        $('*').bind('keydown', 'Ctrl+b', function assets() {
            $('#reset').trigger('click');
            return false;
        });
    }

    jQuery(document).ready(domo);
</script>

<script src="<?= BASE_ASSET; ?>fine-upload/jquery.fine-uploader.js"></script>
<script src="<?= BASE_ASSET; ?>module/chat/package/momenjs/moment.js"></script>
<script src="<?= BASE_ASSET; ?>module/chat/js/firebase.js"></script>
<script src="<?= BASE_ASSET; ?>module/chat/js/fireNotif.js"></script>
<script src="<?= BASE_ASSET; ?>module/chat/js/jquery-slim-scroll.min.js"></script>
<script src="<?= BASE_ASSET; ?>module/chat/js/jquery-mobile.js"></script>
<script src="<?= BASE_ASSET; ?>module/chat/js/chat-message-filter.js?uid=041020191423"></script>
<script src="<?= BASE_ASSET; ?>module/chat/js/chat-message.js?uid=041020191423"></script>
<script src="<?= BASE_ASSET; ?>module/chat/js/chat-main.js?uid=041020191423"></script>