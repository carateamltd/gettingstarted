Ext.define('MyApp.model.BlogModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iBlogId', type:'int'},     
            {name:'iApplicationId', type:'int'},     
            {name:'iAppTabId',type:'string'},
            {name:'vBlogTitle',type:'string'},
            {name:'vBlogUrl',type:'string'},
            {name:'eStatus', type:'string'}
        ]
    }
});
