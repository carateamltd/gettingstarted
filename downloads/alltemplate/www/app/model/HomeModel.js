Ext.define('MyApp.model.HomeModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iHometabId', type:'int'},     
            {name:'iApplicationId',type:'int'},
            {name:'vWebsite',type:'int'},
            {name:'vEmail',type:'string'},
            {name:'vTelephone',type:'string'},
            {name:'vAddress1', type:'string'},     
            {name:'vAddress2',type:'string'},
            {name:'vCity',type:'string'},
            {name:'vState',type:'string'},
            {name:'vCountry',type:'string'},
            {name:'vZip', type:'string'},     
            {name:'vLatitude',type:'string'},
            {name:'vLongitude',type:'string'},
            {name:'vDistanceType',type:'string'},
            {name:'vDescription',type:'string'},
            {name:'vImage',type:'string'}
        ]
    }
});
  