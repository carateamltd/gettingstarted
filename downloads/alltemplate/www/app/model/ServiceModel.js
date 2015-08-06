Ext.define('MyApp.model.ServiceModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iServiceId', type:'int'},     
            {name:'iApplicationId',type:'int'},
            {name:'iFeatureId',type:'int'},
            {name:'iTabId',type:'string'},
            {name:'vServiceName',type:'string'},
            {name:'vPrice', type:'string'},     
            {name:'vReservationFee',type:'string'},
            {name:'vMaxService',type:'string'},
            {name:'iDuration',type:'string'},
            {name:'eStatus',type:'string'},
            {name:'vServiceTiming',type:'string'},
            {name:'vCurrency',type:'string'}
        ]
    }
});
