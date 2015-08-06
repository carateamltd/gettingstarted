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
                style: "background-image: url('img/splash.png');",
                store: 'catelogestoreid',
                emptyText: Loc.t('CATELOG.NODATAAVAILABLE'),
                onItemDisclosure: true,
                getItemTextTpl: function(recordnode) {
                    return '<div style="height:100px;"><img width="100" height="100" src="http://{vImage}" /> <span style="position: relative;top:-85px;">{text}</span></div>';
                }
            }
        ]
    }
});
