Ext.define('MyApp.store.ImageStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.ImageModel',
        storeId:'imagestoreid',
//        data:[
//            {pic:'img/fb_gallary/1.png'},
//            {pic:'img/fb_gallary/2.png'},
//            {pic:'img/fb_gallary/3.png'},
//            {pic:'img/fb_gallary/4.png'},
//            {pic:'img/fb_gallary/5.png'},
//            {pic:'img/fb_gallary/6.png'},
//            
//            {pic:'img/fb_gallary/7.png'},
//            {pic:'img/fb_gallary/8.png'},
//            {pic:'img/fb_gallary/9.png'},
//            {pic:'img/fb_gallary/10.png'},
//            {pic:'img/fb_gallary/11.png'},
//            {pic:'img/fb_gallary/12.png'},
//            
//            {pic:'img/fb_gallary/13.png'},
//            {pic:'img/fb_gallary/14.png'},
//            {pic:'img/fb_gallary/15.png'},
//            {pic:'img/fb_gallary/16.png'},
//            {pic:'img/fb_gallary/17.png'},
//            {pic:'img/fb_gallary/18.png'},
//            
//            {pic:'img/fb_gallary/19.png'},
//            {pic:'img/fb_gallary/20.png'},
//            {pic:'img/fb_gallary/21.png'}
//            
//        ]
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 