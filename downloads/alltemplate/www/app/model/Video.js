Ext.define('MyApp.model.Video', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name: 'title', type: 'string'},
            {name: 'thumbnail', type: 'string'},
            {name: 'href', type: 'string'},
            {name: 'dob', type: 'date'},
        ]
    }
});
  