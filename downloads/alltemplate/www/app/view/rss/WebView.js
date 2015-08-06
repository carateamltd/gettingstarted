Ext.define('MyApp.view.blog.WebView', {
    extend: 'Ext.Container',
    alias: 'widget.webview',
    requires: [],
    config: {
        layout: 'card',
        items: [{
                xtype: 'panel',
                scrollable: {
                    indicators:false
                },
                styleHtmlContent: true,
                layout: 'vbox',
                items: [
                    {
                        html:'',
                        itemId:'webid',
                       
                    }
                ]
            }],
    }
});

