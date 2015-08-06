Ext.define('MyApp.model.SocialModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iSocialMediaID', type:'int'},     
            {name:'vName',type:'string'},
            {name:'iApplicationId',type:'string'},
            {name:'iAppTabId',type:'string'},
            {name:'vUrl',type:'string'},

            
        ]
    }
});
  