Ext.define('MyApp.store.AlbumStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.AlbumModel',
        storeId:'albumstoreid',
        autoLoad: true,
          data:[{albname:"new album"}]
//        proxy: {
//            type: 'localstorage',
//            reader: {
//                type: 'json'
//            }
//        }
    }
});
 