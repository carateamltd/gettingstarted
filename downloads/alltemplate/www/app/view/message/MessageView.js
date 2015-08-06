Ext.define('MyApp.view.message.MessageView', {
    extend: 'Ext.List',
    xtype: 'messageview',
    requires: [],
    config: {
        emptyText: Loc.t('MESSAGE.NOMESSAGEAVAILABLE'),
        itemTpl: '<li style="padding:5px; font-family: "Times New Roman", Georgia, Serif;">\n\
        <div style="padding:10px 0px 0px 0px; color:black;background-color:rgba(203, 255, 232, 0.43);border-radius:10px;border: 1px solid #efefef; border-radius: 10px;">\n\
<div style="float:left;padding: 15px;"><img class="emptycheck" src="img/checkbox480.png" id="My_{id}" /></div>\n\
<div style="float:right;padding: 15px;"><span class="sharebtncls">Share</span></div>\n\
<div style="padding:5px;width:50%;">{message}</div>\n\
<div style="padding:5px;width:50%;border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">{date}</div>\n\
</div></li>',
        style: "background-image: url('img/splash.png');",
        store: 'messagestoreid',
        items: [{
                xtype: 'toolbar',
                title: 'Messages',
//                baseCls: 'younaviCls',
//                height: 50,
                docked: 'top',
                items: [{xtype: 'spacer'}, {
                        xtype: 'button',
//                        text: 'Delete',
                        iconCls:'trash',
                        iconMask:true,
                        align: 'right',
                        itemId: 'msgsharingId',
                        hidden: false
                    }]
            }]

    }
});