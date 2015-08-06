Ext.define('MyApp.model.OpencloseModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iOpeningId', type:'int'},     
            {name:'iApplicationId',type:'int'},
            {name:'iHometabId',type:'string'},
            {name:'iAppTabId',type:'string'},
            {name:'vDay',type:'string'},
            {name:'vOpenfrom', type:'string'},     
            {name:'vOpento',type:'string'}
           
        ]
    }
});
  