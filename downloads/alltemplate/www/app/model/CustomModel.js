Ext.define('MyApp.model.CustomModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'describtion', type:'string'},
            {name: 'iAppTabId'},
            {name: 'iApplicationId'},
            {name: 'iInfotabId'},
            {name: 'tDescription'},
            {name: 'vTitle'}
        ]
    }
});
  