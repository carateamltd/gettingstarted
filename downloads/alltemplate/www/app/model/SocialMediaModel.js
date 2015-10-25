Ext.define('MyApp.model.SocialMediaModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'socialMediaId'},     
            {name:'iApplicationId'},
            {name:'iAppTabId'},
            {name:'vSocialMediaTitle'},
            {name:'vSocialMediaLink'},
			{name:'vSocialMediaIcon'}            
        ]
    }
});
  