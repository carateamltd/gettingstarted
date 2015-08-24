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
        },
        listeners: {
        	load: function(store, records, successful, operation, eOpts){
        		try{
        			var Response = Ext.decode(operation.getResponse().responseText);
					var bgimage = Response.backgroundimage.backgroundimage;
					if (bgimage) {
						Ext.ComponentQuery.query('catelogview')[0].setStyle({backgroundImage: 'url(\'http://' + bgimage + '\')'});
					}
				}
				catch(e){
					console.log(e);
				}
        	}
        }
    }
});
 