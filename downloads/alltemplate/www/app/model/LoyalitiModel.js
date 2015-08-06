Ext.define('MyApp.model.LoyalitiModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iLoyaltyID', type:'string'},     
            {name:'iApplicationId', type:'string'},     
            {name:'iAppTabId',type:'string'},
            {name:'vRewardText',type:'string'},
            {name:'vSecretCode', type:'string'},
            {name:'vThumbnail',type:'string'},
            {name: 'vMobileHeaderImage', type: 'string'},
            {name: 'vTabletHeaderImage', type: 'string'},
            {name:'vSquareCount', type:'string'},
            {name:'UserUsed', type:'string'},
            {name:'vSocialShare', type:'string'}
            
        ]
    }
});
  