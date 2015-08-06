Ext.define('MyApp.model.ImageModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iGalleryImageId', type:'int'},     
            {name:'iGalleryId', type:'int'},     
            {name:'vGalleryImage',type:'string'},
            {name:'tDescription',type:'string'},
        ]
    }
});
  