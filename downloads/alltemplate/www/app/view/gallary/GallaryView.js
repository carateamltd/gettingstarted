Ext.define('MyApp.view.gallary.GallaryView', {
    extend: 'Ext.List',
    xtype: 'gallaryview',
    requires: ['MyApp.view.gallary.CoverView'],
    config: {
        emptyText: '',//Loc.t('GALLERY.NOIMAGESAVAILABLE'),
        deferEmptyText: false,
    	 store: 'imagestoreid',
         baseCls: 'photoCls',
         selectedCls: 'color:transperent',
         itemTpl: new Ext.XTemplate('<div id="wrapper" style="margin:0 auto !important;"><div id="columns"><div class="pin" id="test_{iGalleryImageId}" >\n\
    		<img class="pic" src="{vGalleryImage}" id="profile_{iGalleryImageId}"   width="60" height="60" />\n\</div></div><span class="descGal">{tDescription}</span></div>')
    }
});