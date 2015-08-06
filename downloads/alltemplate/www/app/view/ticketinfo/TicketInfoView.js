Ext.define('MyApp.view.ticketinfo.TicketInfoView', {
    extend: 'Ext.List',
    xtype: 'ticketinfoview',
    requires: ['MyApp.view.catelog.CatelogDetails'],
    config: {
        title: 'Order Details',
        style: "background-image: url('img/splash.png');",
        store: 'ticketstoreid',
         emptyText: 'No TicketList is available',
        scrollable: {
            indicators: false
        },
         itemTpl:new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n\
        		<tr><td height="100px" width="40%" style="vertical-align: bottom;padding: 0px;"><img src="img/Ticket.png" style="height:130px; width:100%; vertical-align: bottom;border-radius:10px 0px 0px 10px; overflow:hidden;" /></td>\n\
        	        <td height="100px" valign="top">\n\
        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">Type:{iTicketType}</div>\n\
        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">Price:{fTicketPrice}</div>\n\
                        <div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">Date:{vShowDate}</div>\n\
                        <div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">Time:{vShowTiming}</div></td></tr></table>'),
        items:[{
                xtype:'toolbar',
                title:'Ticket Info',
                docked:'top'
        }]
    }
});
