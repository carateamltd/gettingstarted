Ext.define('MyApp.model.PdfModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iPdfId', type:'int'},     
            {name:'iApplicationId',type:'string'},
            {name:'iAppTabId',type:'int'},
            {name:'vPdfTitle',type:'string'},
            {name:'vPdfFile',type:'string'},
            {name:'vPdfUrl',type:'string'}
            
        ]
    }
});
  