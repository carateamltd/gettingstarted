Ext.define('MyApp.model.PartnerModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'title', type:'string'},     
            {name:'describtion', type:'string'},     
            {name:'image', type:'string'},     
            {name:'link', type:'string'}     
        ]
    }
});
  