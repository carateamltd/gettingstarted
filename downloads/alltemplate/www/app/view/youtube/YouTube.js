Ext.define('MyApp.view.youtube.YouTube', {
    extend: 'Ext.List',
    xtype: 'youtube',
    config: {
        items:[{
                	xtype:'toolbar',
                	title:Loc.t('YOUTUBE.TITLE'),
//                        baseCls:'younaviCls',
//                        height:50,
                	docked:'top'
                }],
                 emptyText:Loc.t('YOUTUBE.NOVIDEOAVAILABLE'),
                itemTpl:'<div><p style="background-color:red;">{dob:date("F j, Y")}</p><img src="{thumbnail}"  style="margin:5px;width:97%;"/></div>',
                store:'youtubestoreid',
                
    }
});