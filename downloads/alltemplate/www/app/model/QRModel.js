Ext.define('MyApp.model.QRModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iQrID', type:'string'},     
            {name:'iApplicationId',type:'string'},
            {name:'iAppTabId',type:'string'},
            {name:'vName',type:'string'},
            {name:'tQrCode',type:'string'},
            {name:'dStartDate', type:'string'},     
            {name:'dEndDate',type:'string'},
            {name:'tDescription',type:'string'},
            {name:'vMobileHeaderImage',type:'string'},
            {name:'vTabletHeaderImage',type:'string'},
            {name:'vTargetAmount', type:'string'},     
            {name:'vBeforeHoursCheck',type:'string'},
            {name:'eStatus',type:'string'},
        ]
    }
});
  