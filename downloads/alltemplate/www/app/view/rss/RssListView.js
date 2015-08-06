Ext.define('MyApp.view.rss.RssListView', {
    extend: 'Ext.List',
    xtype: 'rsslistview',
    requires: ['MyApp.view.rss.WebView'],
    config: {
        scrollable: {
            indicators: false
        },
        emptyText:'No rss feed is available',
        //    	style: "background-image: url('img/splash.png');font-family:RalewayRegular;font-style:italic;",
        store: 'rssstoreid',
        itemTpl: new Ext.XTemplate('<li style="padding:5px; font-family: "Times New Roman", Georgia, Serif;">\n\
<div style="padding:10px 0px 0px 0px;  color:black;background-color:rgba(255, 255, 255, 1);border: 1px solid #efefef; border-radius: 10px;">\n\
<div style="float:left;margin-right:5px;border-radius: 10px 0px 0px 14px;overflow:hidden;margin-top: -11px;margin-left: -1px;">\n\
{[this.Image(values)]}</div>\n\
<div style="padding:5px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-weight:bold;">{title}</div>\n\
<div style="padding:5px;  border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;padding-left: 5px;padding-top: 0px;height: 65px;line-height: 21px;overflow: hidden;">{contentSnippet}</div>\n\
        	</div></li>', {
            Image: function (values) {
                return'<img  src="http://'+TextConstants.ListImage+'" width="100px" height="108px"/>'
            }
        }),
    }
});