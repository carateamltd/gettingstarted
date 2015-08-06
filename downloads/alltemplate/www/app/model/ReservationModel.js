Ext.define('MyApp.model.ReservationModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iApplicationId', type:'string'},     
            {name:'iLocationId',type:'string'},
            {name:'iReservationId',type:'string'},
            {name:'iServiceId',type:'string'},
            {name:'iUserId',type:'string'},
            {name:'vAddress1', type:'string'},     
            {name:'vAddress2',type:'string'},
            {name:'vDate',type:'string'},
            {name:'vPrice',type:'string'},
            {name:'vReservationFee',type:'string'},
            {name:'vServiceName', type:'string'},     
            {name:'vServicePrice',type:'string'},
            {name:'vTime',type:'string'},
        ]
    }
});
 