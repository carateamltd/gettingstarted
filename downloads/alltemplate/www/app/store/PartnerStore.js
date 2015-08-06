Ext.define('MyApp.store.PartnerStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.PartnerModel',
        storeId:'partnerstoreid',
        autoLoad: true,
        data:[{title:"partner 1",describtion:'it is good partner',image:'img/partnersImage.png',link:'http://www.yahoo.com'}]
//        proxy: {
//            type: 'localstorage',
//            reader: {
//                type: 'json'
//            }
//        }
    }
});
 