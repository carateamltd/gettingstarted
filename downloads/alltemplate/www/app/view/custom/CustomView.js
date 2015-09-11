Ext.define('MyApp.view.custom.CustomView', {
    extend: "Ext.navigation.View",
    //xtype: 'customview',
    requires: ['MyApp.view.custom.CustomDetail'],
    alias: "widget.customview",
    config: {
        navigationBar: {
            hidden:false
        },
        items: [{
			xtype: 'list',
			itemId: 'infoList',
			store: 'customstoreid',
			selectedCls: 'color:transperent',
			style: 'background-color:transparent',
			flex: 1,
			itemTpl: new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n\
        		 <tr>\n\
        		 <td valign="top">\n\
        		 <div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{vTitle}</div>\n\
        		 <div style="font-size:13px; margin:0px; padding:0px 10px 0px 10px;display:inline-block;width:'+(window.innerWidth-5)+'px;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;">{[this.removeTags(values.tDescription)]}</div>\n\
        		 </td></tr></table>',
        		 {
        		 	removeTags : function(txt)
        		 	{
						var rex = /(<([^>]+)>)/ig;
						return txt.replace(rex , "");
					}
        		 })
		}]
    }
});