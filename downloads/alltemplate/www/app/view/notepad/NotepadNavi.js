Ext.define("MyApp.view.notepad.NotepadNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.notepad.NotepadListView"
    ],
    alias: "widget.notepadnavi",
    config: {
        navigationBar: {
            hidden: false,
//            baseCls: 'younaviCls',
//            height: 50,
            items: [{
                    xtype: 'button',
                    align: 'right',
                    iconCls: 'add',
                    itemId: 'addNoteBtnId'
                }, {
                    xtype: 'button',
                    align: 'right',
                    text: Loc.t('NOTEPAD.SAVE'),
                    hidden: true,
                    itemId: 'saveNoteBtnID'
                }]
        },
        items: [{
                xtype: 'notepadlistciew',
                title: Loc.t('NOTEPAD.LIST'),
                scrollable: {
                    indicators: false
                }
            }]
    }
});
