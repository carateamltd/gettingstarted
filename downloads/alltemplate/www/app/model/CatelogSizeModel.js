Ext.define('MyApp.model.CatelogSizeModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iSizeId', type:'int'},     
            {name:'iCatelogueId', type:'int'},     
            {name:'vSizeName', type:'string'},     
            {name:'vSizeColor',type:'string'},
            {name:'fSizePrice',type:'string'},
            {name:'eSizeStatus',type:'string'},
            {name:'vSize', type:'string'},     
        ]
    }
});
