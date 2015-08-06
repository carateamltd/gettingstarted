Ext.define('MyApp.model.LocationModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iLocationId', type:'string'},     
            {name:'iApplicationId', type:'string'},     
            {name:'iAppTabId',type:'string'},
            {name:'vWebsite',type:'string'},
            {name:'vLocationTitle',type:'string'},
            {name:'vEmail', type:'string'},     
            {name:'vTelephone',type:'string'},
            {name:'vAddress1',type:'string'},
            {name:'vAddress2',type:'string'},
            {name:'vCity',type:'string'},
            {name:'vState',type:'string'},
            {name:'vZip',type:'string'},
            {name:'vLatitude',type:'string'},
            {name:'vLongitude',type:'string'}
        ]
    }
});
