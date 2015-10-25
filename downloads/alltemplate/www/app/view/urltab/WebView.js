Ext.define('MyApp.view.urltab.WebView', {
    extend: 'Ext.Container',
    alias: 'widget.urlwebview',
    config: {
        layout: 'card',
        items: [{
			xtype: 'panel',
			scrollable: {
				indicators:false
			},
			layout: 'vbox',
			items: [{
				html: '',
				itemId:'webid'
			}]
		}]
    },
    initialize: function () {
        var storeData = this.config.data;
        this.down('[itemId=webid]').setHtml('<div id="wrapperiframe" style="width:'+(window.innerWidth)+'px;height:'+(window.innerHeight-115)+'px;"><iframe onload="resizeIframe()" id="scaled-frame" src='+storeData.vURLLink+' style="display: block;-moz-transform: scale('+(window.innerWidth/1000)+');-moz-transform-origin: 0 0;-o-transform: scale('+(window.innerWidth/1000)+');-o-transform-origin: 0 0;-webkit-transform: scale('+(window.innerWidth/1000)+');-webkit-transform-origin: 0 0;"></iframe></div>');
    }
});

