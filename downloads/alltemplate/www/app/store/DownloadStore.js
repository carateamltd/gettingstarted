Ext.define('MyApp.store.DownloadStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.DownloadModel',
        storeId:'downloadstoreid',
        autoLoad: true,
        data:[{title:"lenovo catelog",describtion:'it is good catlog',image:'img/lenovolaptop.jpg',link:'http://www.google.com'}]
//        proxy: {
//            type: 'localstorage',
//            reader: {
//                type: 'json'
//            }
//        }
    }
});
 