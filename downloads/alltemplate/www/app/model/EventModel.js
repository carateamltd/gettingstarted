Ext.define('MyApp.model.EventModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iEventId', type:'int'},     
            {name:'iApplicationId',type:'int'},
            {name:'iAppTabId',type:'int'},
            {name:'vImage',type:'string'},
            {name:'vTitle',type:'string'},
            {name:'tDescription', type:'string'},     
            {name:'dStartDate',type:'string'},
            {name:'vStartTime',type:'string'},
            {name:'dEndDate',type:'string'},
            {name:'vEndTime',type:'string'},
            {name:'eStatus', type:'string'},     
            {name:'vBackgroundColor',type:'string'},
            {name:'vTextColor',type:'string'},
            {name:'vHeaderImage',type:'string'}
        ]
    }
});
  