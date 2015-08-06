Ext.define('MyApp.model.TicketModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iTicketId', type:'int'},     
            {name:'iTicketType', type:'string'},     
            {name:'iTotalTicket', type:'string'},     
            {name:'vShowDate', type:'string'},     
            {name:'vShowTiming', type:'string'},     
            {name:'fTicketPrice', type:'string'},     
        ]
    }
});
  