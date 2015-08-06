Ext.define('MyApp.model.ServiveTabModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iServiceId', type:'int'},     
            {name:'vServiceName', type:'string'},     
            {name:'fServiceFee', type:'string'},     
            {name:'tDescription',type:'string'},
            {name:'vMaxService',type:'string'},
            {name:'vDuration',type:'string'},
            {name:'vServiceFees',type:'string'},
            {name:'vCurrency',type:'string'},
            {name:'vImage',type:'string'}
        ]
    }
});
