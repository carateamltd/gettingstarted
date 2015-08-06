Ext.define('MyApp.store.TimeStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.TimeModel',
        storeId:'timestore',
//         proxy: {
//            type: 'localstorage',
//            reader: {
//                type: 'json'
//            }
//        }
        data:[
            {time:'7:00'},
            {time:'7:15'},
            {time:'7:30'},
            {time:'7:45'},
            {time:'8:00'},
            {time:'8:15'},
            {time:'8:30'},
            {time:'8:45'},
            {time:'9:00'}
        ]
        
    }
});
 