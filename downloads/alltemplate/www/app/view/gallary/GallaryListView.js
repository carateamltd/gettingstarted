Ext.define('MyApp.view.gallary.GallaryListView',{
    extend:'Ext.List',
    xtype:'gallarylistview',
     requires: [
        "MyApp.view.gallary.GallaryView"
    ],
    config:{
        emptyText: 'TEST',
        itemTpl: new Ext.XTemplate('<div style="background-color:white;  border-radius: 10px;  height: 50px;  text-align: left;padding: 13px;margin: 10px;  color: royalblue;">{albname}</div>'),
        store: 'albumstoreid',
        style:'background-image: -webkit-linear-gradient(top right, #000000 0%, #0C0C3B 100%);',
    }
});


// Loc.t('GALLERY.NOIMAGESAVAILABLE')