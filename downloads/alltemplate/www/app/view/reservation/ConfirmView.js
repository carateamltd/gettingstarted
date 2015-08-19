Ext.define('MyApp.view.reservation.ConfirmView', {
    extend: 'Ext.Container',
    alias: 'widget.confirmview',
    requires:['MyApp.view.reservation.DetailForm'],
    config: {
        layout: 'card',
        title: Loc.t('RESERVATION.CONFIRMBOOKING')
    },
    initialize: function () {

        var resPanel = new Ext.Panel({
            layout: 'hbox',
            style: 'background-color:rgba(35,91,66,0.2);',
            margin:10,
            items: [{
                    xtype: 'panel',
                    layout: {
                        type: 'vbox',
                        pack: 'center'
                    },
                    items: [{
                            html: '<div style="height:80px;width:80px;margin-left:5px;"><img src="img/round_with_map.png"  style="height:100%;width:100%;"/></div>',
                        }]

                }, {
                    xtype: 'panel',
                    layout: {
                        type: 'vbox',
                        pack: 'center'
                    },
                    style: 'margin-left: 10px;margin-top: 10px;',
                    items: [{
                            html: 'Pizza',
                            style:'  margin-top: -22px;',
                            itemId:'serviceNameId'
                        }, {
                            html: 'S.G highway',
                            itemId:'serviceAddressid'
                        }, {
                            html: 'Ahmedabad, Gujarat 38005',
                            itemId:'cityStateZipId'
                        }]
                }]
        })
        var detailPanel = new Ext.Panel({
            layout: 'vbox',
//            flex: 4,
            margin: '10 10 10 10',
            items: [{
                    xtype: 'panel',
                    layout: 'hbox',
                    style: 'background-color:rgba(255, 255, 255, 1);padding: 10px;margin-bottom:5px;border-radius:10px;',
                    items: [{
                            html: Loc.t('RESERVATION.TIME')
                        }, {xtype: 'spacer'}, {
                            html: '12/3/14-7:15 AM',
                            itemId:'bookDateTimeid'
                        }]
                }, {
                    xtype: 'panel',
                    layout: 'hbox',
                    style: 'background-color:rgba(255, 255, 255, 1);padding: 10px;margin-bottom:5px;border-radius:10px;',
                    items: [{
                            html: Loc.t('RESERVATION.PRICE'),
                        }, {xtype: 'spacer'}, {
                            html: '$10.00',
                            itemId:'bookPriceid'
                        }]
                }, {
                    xtype: 'panel',
                    layout: 'hbox',
                    style: 'background-color:rgba(255, 255, 255, 1);padding: 10px;margin-bottom:5px;border-radius:10px;',
                    items: [{
                            html: Loc.t('RESERVATION.PREPAYMENT'),
                        }, {xtype: 'spacer'}, {
                            html: '$2',
                            itemId:'reservationFeeId'
                        }]
                }]
        });
        var payPanel = new Ext.Panel({
            items: [{
                    xtype: 'fieldset',
                    items: [{
                            xtype: 'selectfield',
                            label: Loc.t('ORDER.PAYMENTMETHOD'),
                            itemId:'paymethodeid',
                            defaultPhonePickerConfig : {
                                doneButton : Loc.t('ORDER.DONE'),
                                cancelButton : Loc.t('ORDER.CANCEL')
                            },
                            labelWidth:'40%',
                            usePicker:true,
                            options: [
                                {text: 'Cash', value: 'cash'},
                            ]
                        }]
                }]
        })
        var btnPanel = new Ext.Panel({
            layout: {
                type: 'hbox',
                pack: 'center'
            },
            items: [
                {xtype: 'spacer'}, {
                    xtype: 'button',
                    width: '60%',
                    style:'padding:10px;',
                    ui: 'confirm',
                    text: Loc.t('RESERVATION.CONFIRM'),
                    scope:this,
                    handler:this.onConfirm
                }, {
                    xtype: 'spacer'
                }]
        })
        var finalPanel = new Ext.Panel({
            layout: 'vbox',
            scrollable: true,
            style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [resPanel, detailPanel,payPanel,btnPanel,{xtype:'spacer',height:10}]
        })
        this.add([finalPanel])

//      this.add([resPanel,btnPanel])
    },
    onConfirm:function(){
        this.fireEvent('onConfirmBtn',this)
    }
   
});