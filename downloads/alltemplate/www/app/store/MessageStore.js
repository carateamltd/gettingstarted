Ext.define('MyApp.store.MessageStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.MessageModel',
        storeId:'messagestoreid',
        autoLoad: true,
//        data:[
//            {id:"1",message:'hi',date:"09-102014"},
//            {id:"2",message:'hello',date:"09-102014"},
//            {id:"3",message:'kem',date:"09-102014"},
//            {id:"4",message:'kem1',date:"09-102014"},
//            {id:"5",message:'kem2',date:"09-102014"},
//        ]
        proxy: {
            type: 'localstorage',            
            reader: {
                type: 'json'
            }
        }
    }
});
 