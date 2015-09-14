function appMask() {
    Ext.Viewport.setMasked({
        xtype: 'loadmask',
        message: 'Loading...'
    });
}
function appUnmask() {
    Ext.Viewport.setMasked(false);
}
function app_CallView(objView, viewName, viewTransition) {
    console.log('callView');
    if (objView) {   
        objView.destroy();
    }
    Ext.Viewport.animateActiveItem({
        xtype: viewName
    }, viewTransition);
}
function app_PushView(objParent, objNavigate, extraData, title, dv) {
    if (!extraData) {
        objParent.push({
            xtype: objNavigate,
            title: title
        });
    } else {
        objParent.push({
            xtype: objNavigate,
            data: extraData,
            title: title
        });
    }
    objParent.getNavigationBar().getBackButton().setText(title);
    if(dv === null){
    	objParent.getNavigationBar().getBackButton().hide();
    }
    else{
    	objParent.getNavigationBar().getBackButton().show();
    }
}
function appCustomAlert(displaytitle, displayMessage) {
    Ext.Viewport.setMasked(false);
    Ext.Msg.add({
        maxHeight: 'auto'
    });
    Ext.Msg.alert(displaytitle, displayMessage, Ext.emptyFn);

}
function PushRegister() {
     var url = 'http://admin.easy-apps.co.uk/webservice?action=easyapps_pushnotification_save&iApplicationId=264&vDeviceid=0&vDevicename=0&vVerifiedNumber=&vToken='+TextConstants.DeviceToken+'&vType=Android&ePushNotification=yes&eStatus=Active'
     console.log(url);
     Ext.Ajax.request({
             url: url,
             success: function(response, opts) {
             
             var obj = Ext.decode(response.responseText);
             TextConstants.UserID=obj.iUserId
             },
             failure: function(response, opts) {
             console.log('server-side failure with status code ' + response.status);
             }
    });
}
function get_UserMessages(text, time) {
    var date = {
        message: text,
        date: time
    }
    var storeobj = Ext.getStore('messagestoreid');
    storeobj.add(date);
    storeobj.sync();

}
function getId(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'error';
    }
}
function updateQRCode(text) {
    var element = document.getElementById("qrcode");

    var bodyElement = document.body;
    if (element.lastChild)
        element.replaceChild(showQRCode(text), element.lastChild);
    else
        element.appendChild(showQRCode(text));

}
function loadURL(url) {
    var oRequest = new XMLHttpRequest();
    oRequest.open('GET', url, false);
    oRequest.setRequestHeader("User-Agent", navigator.userAgent);
    oRequest.send(null)
    return oRequest.responseText;
}
function Picasa(email) {

    var json_Album_URI = "https://picasaweb.google.com/data/feed/base/"
            + "user/" + email
            + "?alt=" + "json"
            + "&kind=" + "album"
            + "&hl=" + "en_US"
            + "&fields=" + "entry(media:group,id)"
            + "&thumbsize=" + 104;
 var objImageStore = Ext.getStore('imagestoreid');
    objImageStore.removeAll();
    
    Ext.data.JsonP.request({
        scope: this,
        url: json_Album_URI,
        type: 'GET',
        success: function (result) {
            console.log(result);
            console.log(result.feed.entry.length);
            var length = result.feed.entry.length
            for (var i = 0; i < length; i++) {
                console.log(result.feed.entry[i].media$group.media$content[0].url);
                var photoURL = result.feed.entry[i].media$group.media$content[0].url;
                 var picData = {
                    iGalleryImageId: i,
                    iGalleryId: i,
                    vGalleryImage: photoURL,
                    tDescription: "",
                }
                objImageStore.add(picData);
                objImageStore.sync();
                appUnmask();
            }
        },
        failure: function (response) {
            appUnmask();
            appCustomAlert(TextConstants.MESSAGE, TextConstants.NetWork_Problem);
        },
    })
}
function Flickr(key,userid) {
    var json_Album_URI = "https://api.flickr.com/services/rest/?&method=flickr.people.getPublicPhotos&api_key=615e20fd27560f58cbc7bfc54df9c514&user_id=126495126@N02&per_page=12&page=0&format=json&jsoncallback=?";
    var objImageStore = Ext.getStore('imagestoreid');
    objImageStore.removeAll();
    Ext.data.JsonP.request({
        scope: this,
        url: json_Album_URI,
        type: 'GET',
        callbackKey: 'jsoncallback',
        success: function (result) {
            console.log(result);
            console.log("leng= " + result.photos.photo.length);
            var length = result.photos.photo.length
            for (var i = 0; i < length; i++) {
                var item = result.photos.photo[i];
                var photoURL = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_m.jpg';
                var picData = {
                    iGalleryImageId: i,
                    iGalleryId: i,
                    vGalleryImage: photoURL,
                    tDescription: "",
                }
                objImageStore.add(picData);
                objImageStore.sync();

            }

        },
        failure: function (response) {
            appUnmask();
            appCustomAlert(TextConstants.MESSAGE, TextConstants.NetWork_Problem);
        },
    })
}