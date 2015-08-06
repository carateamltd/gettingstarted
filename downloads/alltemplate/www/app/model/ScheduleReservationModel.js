Ext.define('MyApp.model.ScheduleReservationModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iLocationId', type:'int'},     
            {name:'iApplicationId',type:'int'},
            {name:'iTabId',type:'int'},
            {name:'vWebsite',type:'string'},
            {name:'vEmail',type:'string'},
            {name:'vTelephone', type:'string'},     
            {name:'vAddress1',type:'string'},
            {name:'vAddress2',type:'string'},
            {name:'vCity',type:'string'},
            {name:'vState',type:'string'},
            {name:'vZip', type:'string'},     
            {name:'vLatitude',type:'string'},
            {name:'vLongitude',type:'string'},
            {name:'vLookupAddress',type:'string'}
        ]
    }
});
