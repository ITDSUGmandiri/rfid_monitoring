"use strict";

function CicoolChatFilter(filters) {
    this.filterMessage = {
        message: ['filterImage', 'filterEmoji', 'filterYoutubeUrl'],
        liveMessage: ['emojiLiveMessage'],
        chatLastMessage: ['filterEmoji']
    };
}
CicoolChatFilter.prototype.addFilter = function(group, filterName) {
    this.filterMessage[group].push(filterName);
    return this;
}
CicoolChatFilter.prototype.filterYoutubeUrl = function(message) {
    return message.replace(/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?(.+)/g, '<iframe width="100%" height="200px" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>').replace(/(?:http:\/\/)?(?:www\.)?(?:vimeo\.com)\/(.+)/g, '<iframe src="//player.vimeo.com/video/$1" width="100%" height="200px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>')
}
CicoolChatFilter.prototype.isImage = function(filename) {
    var array = filename.split('.');
    var extension = array.slice(-1)[0];
    extension = extension.toLowerCase();
    var list_image_ext = ['', 'png', 'jpg', 'jpeg', 'gif'];
    if (list_image_ext.indexOf(extension) != -1) {
        return true;
    } else {
        return false;
    }
}
CicoolChatFilter.prototype.getIconFile = function(file_name) {
    var extension_list = {
        'avi': ['avi'],
        'css': ['css'],
        'csv': ['csv'],
        'eps': ['eps'],
        'html': ['html', 'htm'],
        'jpg': ['jpg', 'jpeg'],
        'mov': ['mov', 'mp4', '3gp'],
        'mp3': ['mp3'],
        'pdf': ['pdf'],
        'png': ['png'],
        'ppt': ['ppt', 'pptx'],
        'rar': ['rar'],
        'raw': ['raw'],
        'ttf': ['ttf'],
        'txt': ['txt'],
        'wav': ['wav'],
        'xls': ['xls', 'xlsx', 'gsheet'],
        'zip': ['zip'],
        'doc': ['docx', 'doc', 'gdoc']
    };
    var array = file_name.split('.');
    var extension = array.slice(-1)[0];
    extension = extension.toLowerCase();
    var icon = BASE_URL + 'asset/img/icon/any.png';
    $.each(extension_list, function(ext, list_ext) {
        if (list_ext.indexOf(extension) != -1) {
            icon = BASE_URL + 'asset/img/icon/' + ext + '.png';
        }
    });
    return icon;
}
CicoolChatFilter.prototype.filterImage = function(message) {
    var reg = new RegExp(/\[image\=([0-9.\-A-Za-z]+)\]/ig);
    var obj = this;
    var matches = message.match(reg);
    $.each(matches, function(index, val) {
        var path = val.replace('[image=', '').replace(']', '');
        var class_img = '';
        if (obj.isImage(path)) {
            var file_location = BASE_URL + '/uploads/chat/' + path;
            message = message.replace(val, '<a class="fancybox chat-image-funcy" href="' + file_location + '"> <img class="chat-image-attchment ' + class_img + '" src="' + file_location + '"></a>');
        } else {
            var class_img = 'attachement-files';
            var file_logo = obj.getIconFile(path);
            var file_location = BASE_URL + '/uploads/chat/' + path;
            message = message.replace(val, '<a  href="' + file_location + '"><img class="chat-image-attchment ' + class_img + '" src="' + file_logo + '"></a>');
        }
    });
    return message;
}
CicoolChatFilter.prototype.filterEmoji = function(message) {
    message = emojify.replace(message);
    return message;
}
CicoolChatFilter.prototype.filter = function(message, type) {
    var obj = this;
    $.each(obj.filterMessage[type], function(index, filter) {
        message = obj[filter](message);
    });
    return message;
}
CicoolChatFilter.prototype.emojiLiveMessage = function(message) {
    message.trim()
    message = message.replace(/^( |<br>)*(.*?)( |<br>)*$/, "$2");
    message = emojione.toShort(message);
    message = emojione.toShort(message);
    message = emojify.replace(message)
    return message;
}