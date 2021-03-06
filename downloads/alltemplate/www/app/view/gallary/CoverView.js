Ext.define('MyApp.view.gallary.CoverView', {
	extend: 'Ext.Container',
    alias: 'widget.coverview',
    config: {
        layout: 'card'
    },
    initialize: function () {
        var i = this.config.data;
        console.log(i)
        var items = [];
        var data=Ext.getStore('imagestoreid');
        var items = [];
        data.each(function(rec){
            items.push({
                scrollable: {
                    direction: 'vertical',
                    directionLock: true
                },
                html: '<div><img src="' + rec.get('vGalleryImage') + '" width="100%"/><span class="fullDescGal">'+rec.get("tDescription")+'</span></div>'
            });
        });
        var panel = Ext.create('Ext.Carousel', {
            fullscreen: true,
            itemId:'carid',
            activeItem:i,
            defaults: {
                styleHtmlContent: true
            },
            items: items
        });
        var finalPanel = new Ext.Panel({
            layout: 'fit',
            items: [panel]
        });
        this.add([finalPanel]);
    }
});
