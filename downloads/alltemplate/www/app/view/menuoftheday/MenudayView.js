Ext.define('MyApp.view.menuoftheday.MenudayView', {
    extend: 'Ext.List',
    xtype: Loc.t('MENUOFTHEDAY.TITLE'),
    requires: ['MyApp.view.menuoftheday.OrderdayDetailView'],
    config: {
        store: 'orderliststoreid',
        itemTpl: '<div>\n\
                    <div style="width: 100%;text-align: center;font-family:RalewayRegular;font-style:italic;position: absolute;background: rgba(255, 255, 255, 0.73);padding: 5px 0px;">{vName}\n\
                    </div><img src="http://{vImage}" height="200px" width="100%" /></div>',
//        items: [{
//                xtype: 'panel',
//                height: 150,
//                style: 'padding-top:3px;font-family:RalewayRegular;font-style:italic;',
//                layout: 'hbox',
//                docked: 'top',
//                items: [{
//                        xtype: 'spacer',
//                        width: '16%'
//                    },
//                    {
//                        xtype: 'image',
//                        src: "img/menuday.jpg",
//                        height: 120,
//                        width: '70%',
//                        itemId: 'menuBtnDayId'
//                    }, {
//                        xtype: 'panel',
//                        layout: {
//                            type: 'vbox',
//                            pack: 'center'
//                        },
//                        items: [
//                            {
//                                html: '<span class="arrowcls"><div><img src="img/arrow_new.png" height="45px" /></div></span>',
//                                width: '14%',
//                            }
//                        ]
//                    }],
//                listeners: [
//                                    {
//                                        element: 'element',
//                                        delegate: 'span.arrowcls',
//                                        event: 'tap',
//                                        fn: function () {
//                                            scope:this
//                                            this.parent.fireEvent('onMenuArrowTap', this)
//                                        }
//                                    }
//                                ]
//            }]
    }
});