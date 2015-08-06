Ext.define('MyApp.model.ArroundusModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'rGeninfoId', type:'int'},     
            {name:'rCatId', type:'int'},     
            {name:'rName',type:'string'},
            {name:'rInformation',type:'int'},
            {name:'rWebsite',type:'string'},
            {name:'rAddress1', type:'string'},     
            {name:'rAddress2',type:'string'},
            {name:'rCity',type:'string'},
            {name:'rState',type:'string'},
            {name:'rCountry',type:'string'},
            {name:'rZip',type:'string'},
            {name:'rTelephone',type:'string'},
            {name:'rImage',type:'string'},
            {name:'rLatitude',type:'string'},
            {name:'rLongitude',type:'string'},
            {name:'rDistanceType',type:'string'},
            {name:'distance',type:'string'},
        ]
    }
});
