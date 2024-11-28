"use strict";

var chatRefreshInterval = 30000;
var intLoadChat = true;
var intReadMessage = null;
var curScroll = null;

function isMobile() {
    return $(window).width() <= 480;
}
emojify.setConfig({
    'img_dir': BASE_URL + '/asset/module/chat/package/emojify/src/images/emoji'
});

function resetScrollAndLoadMessage() {
    intLoadChat = true;
    intReadMessage = null;
    curScroll = null;
}

function showFeatureBottom() {
    $('.tab-chat-feature-wrapper').show();
    $('.btn-chat-file').data('state', 2);
}

function hideFeatureBottom() {
    $('.chat-user-message-wrapper, .btn-chat-sticker').show();
    $('.tab-chat-feature-wrapper').hide();
    $('.btn-chat-file').data('state', 1);
}

function resizeChat() {
    var headHeight = $('.chat-detail-header').height();
    var chatUserHeight = $('.chat-contact-detail .chat-user').height();
    var mainHeaderHeight = $('.main-header').height();
    if (chatUserHeight < 300) { }
    var chatExpandHeight = $('.chat-history-wrapper').height();
    $('.chat-user').width($('.chat-history').width() - 20)
    $('.chat-box').height($(window).height() - 48);
    if ($(window).width() <= 480) {
        $('.chat-box').height($(window).height());
        $('.chat-history').height(chatExpandHeight - (chatUserHeight + headHeight) - (mainHeaderHeight) - 30);
    } else {
        $('.chat-box').height($(window).height() - 48);
        $('.chat-history').height(chatExpandHeight - (chatUserHeight + headHeight) - (mainHeaderHeight) + 70);
    }
}

function uid() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = Math.random() * 16 | 0,
            v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    }).toUpperCase();
}
$(function () {
    'use strict';
    var notify = new FireNotif();
    var audioNotif = new Audio(BASE_URL + 'asset/module/chat/audio/notif2.mp3');
    var audioNotifOpen = new Audio(BASE_URL + 'asset/module/chat/audio/notif-open.mp3');
    var firebaseUrl = ccfb.def_url;
    var firebaseKey = ccfb.key;
    notify.setKey(firebaseKey).setUrl(firebaseUrl).setPath('notify-user/' + usr.uid);
    notify.subscribe(function (data) {
        if (data.chat_id == $('.chat-id').val()) {
            var chatData = ccChat.parseSingleMessage({
                id: data.id,
                uid: data.uid,
                message_user_id: data.message_user_id,
                status: data.status,
                created_at: moment(data.created_at).format('YYYY-MM-DD HH:mm'),
                message: data.message,
            });
            if ($('.chat-item-user[data-message-id="' + data.uid + '"]').length) {
                $('.chat-item-user[data-message-id="' + data.uid + '"]').replaceWith(chatData)
            } else {
                $('.chat-history-wrapper .chat-history').append(chatData)
            }
            ccChat.createBigEmoji();
            if (data.message_user_id != userId) {
                ccChat.addBadgeNotif();
            }
            if ($('.chat-contact-detail .chat-history').scrollTop() > $('.chat-contact-detail .chat-history').prop('scrollHeight') - 700) {
                if (data.message_user_id != userId) {
                    clearInterval(intReadMessage);
                    intReadMessage = setTimeout(function () {
                        ccChat.readMessage(data.chat_id, data.message_user_id, function () {
                            $('.chat-item[data-id="' + data.chat_id + '"]').find('.counter-incomming-message').fadeOut();
                        })
                    }, 1000);
                }
                $('.chat-contact-detail .chat-history').scrollTop(99999999);
            }
            $('.chat-item-typing').addClass('chat-item-typing-inactive')
        }
        if (data.message_user_id != userId) {
            ccChat.notify(data);
            if (data.chat_id == $('.chat-id').val()) {
                audioNotifOpen.play();
            } else {
                audioNotif.play();
            }
        }
        ccChat.parseImage();
        refreshConversation(function () {
            $('.chat-item[data-id="' + $('.chat-id').val() + '"]').addClass('active-chat-contact')
        });
    });
    $('.btn-new-chat').on('click', function (event) {
        event.preventDefault();
        $('.new-chat-contact').animate({
            left: 0
        }, 'fast');
    });
    $('.btn-back-chat').on('click', function (event) {
        event.preventDefault();
        $('.new-chat-contact').animate({
            left: '-100%'
        }, 'fast');
    });
    $("[contenteditable]").on('focusout', function () {
        var element = $(this);
        if (!element.text().trim().length) {
            element.empty();
        }
    });
    $('.main-footer').remove();
    setInterval(resizeChat, 10);
    resizeChat();
    $(document).on('keyup keypress keydown change', '.chat-message', function (event) {
        resizeChat();
    });
    $('.web-body').addClass('sidebar-collapse');
    $('.chat-contact-wrapper').slimScroll({
        height: 450,
        size: '10px',
        alwaysVisible: true
    })
    $('.chat-history').css('overflow', 'auto');
    $('.chat-history').css('overflow', 'auto');
    $('body,html').css('overflow', 'hidden');
    var ccChat = new CicoolChat;
    ccChat.init();

    function refreshConversation(callback) {
        ccChat.getConversations(function (data) {
            var html = ccChat.parseContacts(data);
            $('.chat-contact-message-wrapper').html(html)
            if (typeof callback != 'undefined') {
                callback(data);
            }
        });
    }

    function findChats() {
        $('.chat-search-message-wrapper').html(`
        <div class="no-search-result">Searching For Chats..</div>
        `)
        ccChat.findChats($('.search-input').val(), function (data) {
            var html = ccChat.parseSearchResults(data);
            var title = `
        <div class="search-result-title">MESSAGES</div>`;
            $('.chat-search-message-wrapper').html(title + html)
            if (data.length <= 0) {
                $('.chat-search-message-wrapper').html(`
            <div class="no-search-result">No Search Results</div>
            `)
            }
        });
    }

    function findContact() {
        $('.new-contact-find-wrapper').html('')
        ccChat.findContacts($('.search-contact').val(), function (data) {
            if ($('.chat-contact-list-item:visible').length == 0) {
                if (data.contact) {
                    var contact = data.contact;
                    $('.chat-search-contact-wrapper .new-contact-find-wrapper').html(` 
                           <div class="chat-item chat-contact-list-item chat-contact-new-item" 
                            data-user-id="` + contact.id + `"
                            data-user-username="` + contact.username + `"
                            data-user-email="` + contact.email + `"
                            data-user-fullname="` + contact.full_name + `"
                            data-user-group="member"
                            >
                             <div class="chat-contact-icon"><img src="` + ADMIN_BASE_URL + `/chat/avatar/` + contact.avatar + `" alt=""></div>
                             <div class="chat-header">
                              <h4>` + contact.full_name + ` <span class="chat-contact-group">` + contact.group.name + `</span></h4>
                              </div>
                             <div class="chat-body"><small>Add To Contact</small></div>
                           </div>
                   `);
                } else {
                    $('.new-contact-find-wrapper').html(`
                    <div class="no-search-result">No Contact Results</div>
                    `)
                }
            }
        });
    }
    var intChat = null;
    $(document).on('click', '.chat-contact-wrapper:not(.chat-search-message-wrapper) .chat-item', function (event) {
        if ($(this).hasClass('active-chat-contact')) {
            return;
        }
        if ($(this).hasClass('chat-contact-new-item')) {
            var contact = $(this).clone();
            contact.find('.chat-body small').html('&nbsp')
            contact.removeClass('chat-contact-new-item')
            contact.appendTo('.chat-search-contact-wrapper ')
        }
        $('.chat-contact-detail').removeClass('inactive');
        event.preventDefault();
        var userName = $(this).attr('data-user-username');
        var userFullName = $(this).attr('data-user-fullname');
        var userId = $(this).attr('data-user-id');
        var chatId = $(this).attr('data-id');
        var group = $(this).attr('data-user-group');
        var avatar = $(this).find('.chat-contact-icon img').attr('src')
        $('.chat-detail-contact-icon img').attr('src', avatar);
        $('.chat-user-typing-avatar img').attr('src', avatar);
        $('.chat-detail-id').val(userId)
        $('.chat-contact-message-wrapper .chat-item').removeClass('active-chat-contact')
        $('.chat-contact-message-wrapper .chat-item[data-user-id=' + userId + ']').addClass('active-chat-contact')
        $('.chat-detail-username').val(userName)
        $('.chat-detail-fullname').val(userFullName)
        $('.chat-id').val(chatId)
        $('.chat-detail-name').html(userFullName)
        $('.search-contact').trigger('keyup').val('')
        $('.chat-contact-detail .chat-contact-group').html(group)
        if (isMobile()) {
            $('.new-chat-contact').animate({
                left: '-100%'
            }, 'fast');
            $('.chat-contact').hide();
        }
        if (typeof ccChat.chatTempLast[chatId] == 'undefined') {
            ccChat.showLoadingChat(true);
            ccChat.newPrivateChat(userId, function (data) {
                $('.chat-contact-detail .chat-history').html(ccChat.parseMessages(data.messages)).scrollTop(999999999)
                $('.chat-id').val(data.chat.chat_uid)
                clearInterval(intChat);
                ccChat.grouppingMessage();
                $('.chat-item[data-id="' + data.chat.chat_uid + '"]').find('.counter-incomming-message').fadeOut();
                resetScrollAndLoadMessage();
                ccChat.chatOffset = 25;
                ccChat.showDateTop(false);
                ccChat.showLoadingChat(false);
            })
            $('.new-chat-contact').animate({
                left: '-100%'
            });
        } else {
            if (ccChat.chatTempLast[chatId].length <= 0) {
                ccChat.showLoadingChat(true);
                ccChat.newPrivateChat(userId, function (data) {
                    $('.chat-contact-detail .chat-history').html(ccChat.parseMessages(data.messages)).scrollTop(999999999)
                    $('.chat-id').val(data.chat.chat_uid)
                    clearInterval(intChat);
                    ccChat.grouppingMessage();
                    $('.chat-item[data-id="' + data.chat.chat_uid + '"]').find('.counter-incomming-message').fadeOut();
                    resetScrollAndLoadMessage();
                    ccChat.chatOffset = 25;
                    ccChat.showDateTop(false);
                    ccChat.showLoadingChat(false);
                })
            } else {
                $('.chat-contact-detail .chat-history').html(ccChat.parseMessages(ccChat.chatTempLast[chatId])).scrollTop(999999999)
                $('.chat-id').val(chatId)
                clearInterval(intChat);
                ccChat.grouppingMessage();
                $('.chat-item[data-id="' + chatId + '"]').find('.counter-incomming-message').fadeOut();
                resetScrollAndLoadMessage();
                ccChat.chatOffset = ccChat.chatTempLast[chatId].length;
                ccChat.showDateTop(false);
                ccChat.showLoadingChat(false);
            }
        }
    });
    $(document).on('click', '.chat-search-message-wrapper .chat-item', function (event) {
        if ($(this).hasClass('active-chat-contact')) {
            return;
        }
        $('.chat-contact-detail').removeClass('inactive');
        event.preventDefault();
        var userName = $(this).attr('data-user-username');
        var userFullName = $(this).attr('data-user-fullname');
        var userId = $(this).attr('data-user-id');
        var chatId = $(this).attr('data-id');
        var messageId = $(this).attr('data-message-id');
        $('.chat-detail-id').val(userId)
        $('.chat-contact-message-wrapper .chat-item').removeClass('active-chat-contact')
        $('.chat-contact-message-wrapper .chat-item[data-user-id=' + userId + ']').addClass('active-chat-contact')
        $('.chat-detail-username').val(userName)
        $('.chat-detail-fullname').val(userFullName)
        $('.chat-id').val(chatId)
        $('.chat-detail-name').html(userFullName)
        if (isMobile()) {
            $('.new-chat-contact').animate({
                left: '-100%'
            }, 'fast');
            $('.chat-contact-list').css({
                left: '-100%'
            });
        }
        ccChat.loadSearchMessage(chatId, messageId, function (data) {
            $('.chat-contact-detail .chat-history').html('')
            $('.chat-contact-detail .chat-history').html(ccChat.parseMessages(data.messages)).scrollTop(999999999)
            clearInterval(intChat);
            ccChat.grouppingMessage();
            var itemFound = $('.chat-item-user[data-message-id="' + messageId + '"]');
            itemFound.addClass('chat-item-find-result')
            $('.chat-item[data-id="' + chatId + '"]').find('.counter-incomming-message').fadeOut();
            $('.chat-contact-detail .chat-history').animate({
                scrollTop: itemFound.offset().top
            }, 1000);
        });
    });

    function sendMessage() {
        var chatId = $('.chat-id').val();
        var message = $('.chat-message-user-send').html();
        var message_live_view = message;
        var images_ico = '';
        var images = $('input[name^=chat_image_name]').map(function (idx, elem) {
            var text = $(elem).attr('name');
            var matches = text.match(/chat_image_name\[(\d+)\]/);
            var picture = $('.qq-thumbnail-selector').eq(idx).attr('src');
            images_ico += ' <img class="chat-image-attchment-holder" src="' + picture + '"> '
            return ' [image=' + $('[name="chat_image_uuid[' + matches[1] + ']"]').val() + '/' + $(elem).val() + '] ';
        }).get();
        if (images != null) {
            message += images;
            message_live_view = message_live_view + ' ' + images_ico;
        }
        message.trim()
        message = emojione.toShort(message);
        if (message.length == 0) {
            return;
        }
        message_live_view = ccChatFilter.filter(message_live_view, 'liveMessage');
        var uuid = uid();
        var chatHistory = $('.chat-contact-detail .chat-history');
        chatHistory.append(ccChat.parseSingleMessage({
            id: uuid,
            message_user_id: userId,
            status: 'pending',
            created_at: moment().format('YYYY-MM-DD HH:mm'),
            message: message_live_view,
            uid: uuid
        }))
        ccChat.grouppingMessage();
        chatHistory.scrollTop(99999999999)
        $('.chat-message-user-send ').focus().html('')
        ccChat.sendMessage(uuid, chatId, message, function (data) {
            $('#chat_image_galery').find('li').each(function () {
                $('#chat_image_galery').fineUploader('deleteFile', $(this).attr('qq-file-id'));
            });
            $('.chat-contact-detail .chat-history').scrollTop(99999999999)
        });
        hideFeatureBottom();
        $('.btn-chat-sticker').attr('data-state', 1).slideDown();
        $('.btn-chat-sticker').find('.fa').addClass('fa-smile-o').removeClass('fa-angle-down')
        $('.tab-chat-feature-wrapper-top').hide();
    }
    $('.btn-chat-send').on('click', function (event) {
        event.preventDefault();
        sendMessage();
    });
    $(document).on('click', '.chat-contact-message-wrapper .chat-item', function (event) {
        event.preventDefault();
        $('.chat-contact-detail').removeClass('inactive');
        $('.chat-contact-message-wrapper .chat-item').removeClass('active-chat-contact');
        $(this).addClass('active-chat-contact');
    });
    refreshConversation(function () {
    });
    $('.chat-message-user-send').bind('keydown', 'return', function (event) {
        event.preventDefault();
        sendMessage();
        return false;
    });
    var intTyping = null;
    var intRemoveTyping = null;
    var typingData = {};
    var typingActive = false;
    var typingActiveChatList = {};
    var notifyTyping = new FireNotif();
    notifyTyping.setKey(firebaseKey).setUrl(firebaseUrl)
    $('.chat-message-user-send').on('keypress', function (event) {
        var chatId = $('.chat-id').val();
        var receiverId = $('.chat-detail-id').val();
        notifyTyping.setPath('notify-writing/' + receiverId);
        clearInterval(intTyping);
        typingData = {
            from: userId,
            chat_id: chatId
        };
        typingActive = true;
    });
    setInterval(function () {
        if (typingActive) {
            typingActive = false;
            notifyTyping.pushNotify(typingData);
        }
    }, 1500);
    var notifyTypingReceive = new FireNotif();
    notifyTypingReceive.setKey(firebaseKey).setUrl(firebaseUrl)
    notifyTypingReceive.setPath('notify-writing/' + userId);
    notifyTypingReceive.subscribe(function (data) {
        console.log('typing', data);
        $('.chat-item[data-id="' + data.chat_id + '"]').addClass('chat-list-typing-active')
        if (typeof typingActiveChatList == 'undefined') {
            typingActiveChatList[data.chat_id] = null;
        }
        clearInterval(typingActiveChatList[data.chat_id]);
        typingActiveChatList[data.chat_id] = setTimeout(function () {
            $('.chat-item[data-id="' + data.chat_id + '"]').removeClass('chat-list-typing-active')
        }, 2000);
        if (data.chat_id == $('.chat-id').val()) {
            $('.chat-item-typing').removeClass('chat-item-typing-inactive')
            clearInterval(intRemoveTyping);
            intRemoveTyping = setTimeout(function () {
                $('.chat-item-typing').addClass('chat-item-typing-inactive')
                $('.chat-item[data-id="' + data.chat_id + '"]').removeClass('chat-list-typing-active')
            }, 2000);
        }
    });
    var notifyReadChat = new FireNotif();
    notifyReadChat.setKey(firebaseKey).setUrl(firebaseUrl)
    notifyReadChat.setPath('notify-read-chats/' + userId);
    notifyReadChat.subscribe(function (data) {
        console.log('read chat', data)
        $.each(data.ids, function (index, val) {
            $('.chat-item-user[data-message-id="' + val + '"]').find('.receiver-stat-icon').html(ccChat.CHAT_INDICATOR_READ_ICO);
            $('.chat-contact-message-wrapper .chat-item[data-id="' + data.chat_id + '"]').find('svg').replaceWith(ccChat.CHAT_INDICATOR_READ_ICO);
        });
    });
    $('.btn-chat-file').on('click', function (event) {
        var state = $(this).data('state');
        switch (state) {
            case 1:
            case undefined:
                showFeatureBottom();
                $(this).data('state', 2);
                break;
            case 2:
                hideFeatureBottom();
                $(this).data('state', 1);
                break;
        }
    });
    $('.btn-chat-sticker').on('click', function (event) {
        var state = $(this).attr('data-state');
        var btn = $(this);
        switch (state) {
            case '1':
            case undefined:
                $('.tab-chat-feature-wrapper-top').slideDown('fast');
                btn.attr('data-state', '2');
                btn.find('.fa').removeClass('fa-smile-o').addClass('fa-angle-down')
                break;
            case '2':
                $('.tab-chat-feature-wrapper-top').slideUp('fast');
                btn.attr('data-state', '1');
                btn.find('.fa').addClass('fa-smile-o').removeClass('fa-angle-down')
                break;
        }
    });
    var intFindChat = null;
    $('.btn-clear-search-input').on('click', function (event) {
        event.preventDefault();
        $('.search-input').val('');
        $('.search-input').trigger('keyup')
    }).hide();
    $('.search-input').on('keyup', function (event) {
        clearInterval(intFindChat);
        intFindChat = setTimeout(function () {
            findChats()
        }, 1000);
        console.log($(this).val().length)
        if ($(this).val().length > 0) {
            $('.btn-clear-search-input').show();
            $('.chat-contact-message-wrapper').parent().hide();
            $('.chat-search-message-wrapper').parent().show();
        } else {
            $('.btn-clear-search-input').hide();
            $('.chat-contact-message-wrapper').parent().show();
            $('.chat-search-message-wrapper').parent().hide();
        }
    }).val('');
    var intFindContact = null;
    $('.search-contact').on('keyup', function (event) {
        var term = $(this).val();
        var wrapper = $('.chat-search-contact-wrapper ');
        $('.new-contact-find-wrapper').html('')
        wrapper.find('.chat-contact-list-item').hide();
        wrapper.find('.chat-contact-list-item:regex(data-user-fullname, .*' + term + '.*)').show();
        wrapper.find('.chat-contact-list-item:regex(data-user-email, .*' + term + '.*)').show();
        wrapper.find('.chat-contact-list-item:regex(data-user-username, .*' + term + '.*)').show();
        if (term.length > 0) {
            clearInterval(intFindContact);
            intFindContact = setTimeout(function () {
                findContact()
            }, 1000);
        }
    }).val('');
    $('body').on('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        showFeatureBottom();
        $('.btn-chat-file').data('state', 2);
    })
    var params = {};
    params[csrf] = token;
    $('#chat_image_galery').fineUploader({
        template: 'qq-template-gallery',
        request: {
            endpoint: ADMIN_BASE_URL + '/chat/upload_image_file',
            params: params
        },
        deleteFile: {
            enabled: true,
            endpoint: ADMIN_BASE_URL + '/chat/delete_image_file',
        },
        thumbnails: {
            placeholders: {
                waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
            }
        },
        validation: {
            allowedExtensions: ["jpg", "jpeg", "png", "xls", "xlsx", "csv", "gdoc", "gsheet", "txt", "zip", "rar", "mov", "pdf", "mp3", "doc", "docx", "ppt", "pptx", "mp4"],
            sizeLimit: 0,
            itemLimit: 5
        },
        showMessage: function (msg) {
            toastr['error'](msg);
        },
        callbacks: {
            onComplete: function (id, name, xhr) {
                if (xhr.success) {
                    var uuid = $('#chat_image_galery').fineUploader('getUuid', id);
                    $('#chat_image_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="chat_image_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="chat_image_name[' + id + ']" value="' + xhr.uploadName + '" />');
                } else {
                    toastr['error'](xhr.error);
                }
            },
            onDeleteComplete: function (id, xhr, isError) {
                if (isError == false) {
                    $('#chat_image_galery_listed').find('.listed_file_uuid[name="chat_image_uuid[' + id + ']"]').remove();
                    $('#chat_image_galery_listed').find('.listed_file_name[name="chat_image_name[' + id + ']"]').remove();
                }
            }
        }
    }); /*end image galery*/
    $('.chat-contact-detail .chat-history').on('scroll', function () {
        ccChat.bottomButtonMessage();
    })
    $('.btn-bottom-history').on('click', function (event) {
        event.preventDefault();
        $('.chat-contact-detail .chat-history').animate({
            'scrollTop': $('.chat-contact-detail .chat-history').prop('scrollHeight')
        }, 500)
        ccChat.bottomButtonMessage();
        ccChat.resetBadgeNotif();
    });
    $('.chat-history').on('scroll', function () {
        var chatId = ccChat.getConversationUser().chatId;
        var scrollTop = $('.chat-contact-detail .chat-history').scrollTop();
        if (intLoadChat) {
            if (curScroll != null) {
                if (scrollTop <= 10 && curScroll > scrollTop) {
                    intLoadChat = false;
                    ccChat.showLoadingChat(true);
                    ccChat.loadMessage(chatId, ccChat.chatOffset, function (data) {
                        if (data.total) {
                            var firstMsg = $('.chat-history .chat-item-user:first');
                            $('.chat-contact-detail .chat-history').prepend(ccChat.parseMessages(data.messages))
                            $('.chat-history').scrollTop(firstMsg.offset().top - 120);
                            ccChat.grouppingMessage();
                            ccChat.addOffset()
                        }
                        intLoadChat = true;
                        ccChat.showLoadingChat(false);
                    });
                }
            }
            curScroll = scrollTop;
        }
    })
    $('.smiley-panel-body .e1').on('click', function (event) {
        event.preventDefault();
        var shortname = $(this).data('shortname');
        $('.chat-message-user-send').append(emojione.shortnameToUnicode(shortname));
    });
    $('.btn-close-upload').on('click', function (event) {
        event.preventDefault();
        hideFeatureBottom();
    });
    $('.btn-back-new-chat').on('click', function (event) {
        event.preventDefault();
        $('.chat-contact-list').animate({
            left: '-100%'
        }, 'fast', function () {
            $(this).hide()
        });
    });
    $(document).on('mouseover', '.chat-history div.chat-item-user', function (event) {
        event.preventDefault();
        var date = $(this).data('date')
        ccChat.showDateTop(true, ccChat.humanDate(date));
    });
    $('.btn-chat-top').on('click', function (event) {
        event.preventDefault();
        $('.chat-contact-list').show();
        $('.chat-contact-list').animate({
            left: '0%'
        });
    }).trigger('click');
    $('.btn-contact-top').on('click', function (event) {
        event.preventDefault();
        $('.new-chat-contact').show().animate({
            left: '0%'
        });
    });
    $('.new-chat-contact').animate({
        left: '-100%'
    }, 'fast');
    if (isMobile()) {
        $('.chat-contact-list').css({
            left: '-100%'
        });
    }
    $(document).on("swipe", function (event) {
        event.preventDefault();
        if (isMobile()) {
            var start = event.swipestart.coords[0];
            var stop = event.swipestop.coords[0];
            var diff = Math.abs(start - stop);
            if (start > stop) {
                //swipe to left
                $('.btn-back-new-chat').trigger('click')
                $('.btn-back-chat').trigger('click')
            } else {
                //swipe to right
                $('.btn-chat-top').trigger('click')
            }
        }
    });
}); /*end doc ready*/