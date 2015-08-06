Ext.define('MyApp.model.WebSiteModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name: 'iWebsiteId', type: 'int'},
            {name: 'iApplicationId', type: 'string'},
            {name: 'iAppTabId', type: 'string'},
            {name: 'vWebTitle', type: 'string'},
            {name: 'vWebUrl', type: 'string'},
            {name: 'eDonation', type: 'string'},
            {name: 'vWebImage', type: 'string'},
        ]
    }
});
  