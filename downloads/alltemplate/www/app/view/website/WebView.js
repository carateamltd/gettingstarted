Ext.define('MyApp.view.website.WebView', {
    extend: 'Ext.Container',
    alias: 'widget.websiteview',
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
                        itemId:'websiteid',
                        html:'sdfsdfkjsdhlkfhsdkljhsdlkfhdsfkljhsdklsdh'
                    }
                ]
            }],
    }
});