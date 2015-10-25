Ext.define('MyApp.view.socialmediatab.WebView', {
    extend: 'Ext.Container',
    alias: 'widget.webview',
    config: {
        layout: 'card',
        items: [{
			xtype: 'panel',
			scrollable: {
				indicators:false
			},
			//styleHtmlContent: true,
			layout: 'vbox',
			items: [{
				//html:'<embed style="width:'+window.innerWidth+'px;height:'+(window.innerHeight-116)+'px;"src="http://apliteinfo.com/">',
				//html: '<object data="http://apliteinfo.com/" style="width: 100%; height:'+(window.innerHeight-116)+'px; display: block;"></object>',
				html: '<div id="wrapperiframe" style="width:'+(window.innerWidth)+'px;height:'+(window.innerHeight-115)+'px;"><iframe onload="resizeIframe()" id="scaled-frame" src="http://apliteinfo.com/" style="display: block;-moz-transform: scale('+(window.innerWidth/1000)+');-moz-transform-origin: 0 0;-o-transform: scale('+(window.innerWidth/1000)+');-o-transform-origin: 0 0;-webkit-transform: scale('+(window.innerWidth/1000)+');-webkit-transform-origin: 0 0;"></iframe></div>',
				itemId:'webid'
			}]
		}]
    }
});

