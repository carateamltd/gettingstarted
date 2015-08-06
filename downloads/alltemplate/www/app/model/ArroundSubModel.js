Ext.define('MyApp.model.ArroundSubModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'rCatId', type:'int'},     
            {name:'iApplicationId',type:'string'},
            {name:'iAppTabId',type:'int'},
            {name:'rCatName',type:'string'},
            {name:'rCatColor', type:'string'},    
        ]
    }
});
