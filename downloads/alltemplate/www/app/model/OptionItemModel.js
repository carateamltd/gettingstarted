Ext.define('MyApp.model.OptionItemModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'vOptName', type:'string'},     
            {name:'fCharge', type:'string'}, 
            {name:'vCurrency',type:'string'}    
        ]
    }
});
