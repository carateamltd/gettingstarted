Ext.define('MyApp.view.socialmediatab.SocialMediaList', {
    extend: 'Ext.List',
    xtype: 'socialmedialist',
    requires: ['MyApp.view.socialmediatab.WebView'],
    config: {
        scrollable: {
            indicators: false
        },
        emptyText:Loc.t('RSSFEEDS.RSSFEEDNOTAVL'),
        store: 'socialmediastoreid',
        itemTpl: new Ext.XTemplate('<table style="width:97%;margin:5px;">\n\
        	<tr>\n\
        		<td style="width: 70px;margin: 5px 5px 6px 5px;"><img src="http://{vSocialMediaIcon}" style="display: inline-block;width: 60px;height: 60px;"/></td>\n\
        		<td>{vSocialMediaTitle}</td>\n\
        	</tr>\n\
        	</table>')
    }
});