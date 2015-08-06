Ext.define('MyApp.store.CatelogStore', {
    extend: 'Ext.data.TreeStore',
    config: {
        model: 'MyApp.model.CatelogModel',
        storeId:'catelogestoreid',
        autoLoad: false,
        defaultRootProperty: 'items',
        root: 'items',
        proxy: {
            url: URLConstants.URL + 'action=easyapps_catalogue_category&iApplicationId=' + TextConstants.ApplicationId,
            type: 'ajax',
            reader: {
                type: 'json'
            }
        }
    }
});
 