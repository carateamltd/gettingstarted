Ext.define('MyApp.store.PdfStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.PdfModel',
        storeId:'pdfstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 