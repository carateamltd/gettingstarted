Ext.define('MyApp.store.NoteStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.NoteModel',
        storeId:'notestroid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',            
            reader: {
                type: 'json'
            }
        }
    }
});
 