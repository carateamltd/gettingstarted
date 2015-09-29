Ext.define('MyApp.view.catelog.CatelogView', {
    extend: 'Ext.Panel',
    xtype: 'catelogview',
    requires: ['MyApp.view.catelog.CatelogDetails'],
    config: {
        layout: 'fit',
        items: [
            {
                xtype: 'nestedlist',
                itemId: 'catelogNestedList',
                id: 'catelogNestedList',
                //style: "background-image: url('img/splash.png');",
                store: 'catelogestoreid',
                emptyText: Loc.t('CATELOG.NODATAAVAILABLE'),
                //onItemDisclosure: true,
                getItemTextTpl: function(recordnode) {
                    return '<table class="catelogue_list"><tr><td><img width="80" height="80" src="http://{vImage}" /></td><td> <p style="width:'+(window.innerWidth-100)+'px";>{[values.text.substr(0, 120)]}...</p></td></tr></table>';
                },
                backText: Loc.t('BUTTON.BACK')
            }
        ]
    }
});
