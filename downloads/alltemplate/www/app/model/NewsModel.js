Ext.define('MyApp.model.NewsModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
//            {name: 'title', type: 'string'},
//            {name: 'link', type: 'string'},
//            {name: 'author', type: 'string'},
//            {name: 'publishedDate', type: 'string'},
//            {name: 'contentSnippet', type: 'string'},
//            {name: 'content', type: 'string'},
//            {name: 'categories', type: 'string'}
            
            {name: 'content', type: 'string'},
            {name: 'title', type: 'string'},
            {name: 'publisher', type: 'string'},
            {name: 'publishedDate', type: 'string'},
            {name: 'signedRedirectUrl', type: 'string'},
            {name: 'image', type: 'string'},
        ]
    }
});
  