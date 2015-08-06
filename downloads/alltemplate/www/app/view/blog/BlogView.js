Ext.define('MyApp.view.blog.BlogView', {
    extend: 'Ext.List',
    xtype: 'blogview',
    requires: ['MyApp.view.news.WebView'],
    config: {
        scrollable: {
            indicators: false
        },
        emptyText:'No blog is available',
        store: 'blosgstoreid',
        itemTpl: new Ext.XTemplate('<li style="padding:5px; font-family: "Times New Roman", Georgia, Serif;">\n\
<div style="padding:10px 0px 0px 0px;  color:black;background-color:rgba(255, 255, 255, 1);border: 1px solid #efefef; border-radius: 10px;">\n\
<div style="float:left;margin-right:5px;border-radius: 10px 0px 0px 14px;overflow:hidden;margin-top: -11px;margin-left: -1px;">\n\
{[this.Image(values)]}</div>\n\
<div style="height: 97px;padding:5px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-weight:bold;">{vBlogTitle}</div>\n\
        	</div></li>', {
            Image: function (values) {
                return'<img  src="img/blog.jpg" width="100px" height="108px"/>'
//                return'<img  src="http://'+TextConstants.ListImage+'" width="100px" height="108px"/>'
            }
        }),
    }
});