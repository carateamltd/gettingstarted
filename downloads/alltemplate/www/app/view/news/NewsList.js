Ext.define('MyApp.view.news.NewsList', {
    extend: 'Ext.List',
    xtype: 'newslist',
    requires: ['MyApp.view.news.WebView'],
    config: {
        scrollable: {
            indicators: false
        },
        emptyText: "",//Loc.t('NEWS.NONEWSISAVAILABLE'),
        store: 'newsstoreid',
        itemTpl: new Ext.XTemplate('<li style="padding:5px; font-family: "Times New Roman", Georgia, Serif;">\n\
			<div style="padding:10px 0px 0px 0px;  color:black;background-color:rgba(255, 255, 255, 1);border: 1px solid #efefef; border-radius: 10px;">\n\
			<div style="float:left;margin-right:5px;border-radius: 10px 0px 0px 24px;overflow:hidden;margin-top: -11px;margin-left: -1px;">\n\
			<img  src="{image}" width="100px" height="109px" style="border-radius: 15px 0px 0px 15px;"/></div>\n\
			<div style="padding:5px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-weight:bold;">{title}</div>\n\
			<div style="padding:5px;  border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;padding-left: 5px;padding-top: 0px;height: 65px;line-height: 21px;overflow: hidden;">{content}</div>\n\
			</div></li>')
	}
});