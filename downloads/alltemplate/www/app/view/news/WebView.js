Ext.define('MyApp.view.news.WebView', {
    extend: 'Ext.Container',
    alias: 'widget.newswebview',
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
                        itemId:'newswebid',
                        html:'',
                    }
                ]
            }],
    }
});

