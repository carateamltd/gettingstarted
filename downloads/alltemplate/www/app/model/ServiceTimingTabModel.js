Ext.define('MyApp.model.ServiceTimingTabModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iServiceDayId', type:'int'},     
            {name:'iServiceId',type:'int'},
            {name:'iApplicationId',type:'int'},
            {name:'vServiceDay',type:'string'},
            {name:'tServiceStartTime',type:'string'},
            {name:'tServiceEndTime', type:'string'},     
            {name:'eStatus',type:'string'},
            {name:'vServiceFees',type:'string'},
            {name:'vCurrency',type:'string'},
            {name:'vImage',type:'string'}
        ]
    }
});
  