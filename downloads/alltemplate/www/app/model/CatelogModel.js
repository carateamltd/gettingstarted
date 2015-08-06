Ext.define('MyApp.model.CatelogModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'text', type:'string'},
            {name: 'cat_id', type: 'int'},
            {name: 'vImage', type: 'string'}
        ]
    }
});
