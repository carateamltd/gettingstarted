Ext.define('MyApp.model.NewArrivalModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iArrivalId', type:'int'},     
            {name:'iApplicationId', type:'int'},     
            {name:'vArrivalName', type:'string'},     
            {name:'vArrivalImage', type:'string'},     
            {name:'tDescription', type:'string'}     
        ]
    }
});
  