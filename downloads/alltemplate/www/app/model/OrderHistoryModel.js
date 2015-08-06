Ext.define('MyApp.model.OrderHistoryModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iApplicationId', type:'string'},     
            {name:'iOrderId', type:'string'},     
            {name:'vItemName',type:'string'},
            {name:'vItemName',type:'string'},
            {name:'vVarient',type:'string'},
            {name:'vQuantity', type:'string'},     
            {name:'tDescription',type:'string'},
            {name:'vInstruction',type:'string'},
            {name:'fPrice',type:'string'},
            {name:'vImage',type:'string'},
        ]
    }
});
