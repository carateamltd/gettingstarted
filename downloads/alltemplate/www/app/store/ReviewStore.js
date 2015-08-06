Ext.define('MyApp.store.ReviewStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.DownloadModel',
        storeId:'reviewstoreid',
        autoLoad: true,
//        data:[{title:"Intel It Hub",describtion:'it is good partner',image:'img/partnersImage.png',link:'http://www.yahoo.com'}]
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 