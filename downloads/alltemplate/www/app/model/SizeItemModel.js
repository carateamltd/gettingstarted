Ext.define('MyApp.model.SizeItemModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iSizeId', type:'string'},     
            {name:'iItemId', type:'string'},     
            {name:'vSizeName',type:'string'},
            {name:'fPrice',type:'string'},
            {name:'vCurrency',type:'string'}
        ]
    }
});
