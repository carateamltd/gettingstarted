Ext.define('MyApp.view.urltab.UrlList', {
    extend: 'Ext.List',
    xtype: 'urllist',
    requires: ['MyApp.view.urltab.WebView'],
    config: {
        scrollable: {
            indicators: false
        },
        emptyText:Loc.t('RSSFEEDS.RSSFEEDNOTAVL'),
        store: 'urlstoreid',
        itemTpl: new Ext.XTemplate('<table style="width:97%;margin:5px;">\n\
        	<tr>\n\
        		<td style="width: 70px;margin: 5px 5px 6px 5px;"><img src="http://{vURLImage}" style="display: inline-block;width: 60px;height: 60px;"/></td>\n\
        		<td>{vURLTitle}</td>\n\
        	</tr>\n\
        	</table>')
    }
});