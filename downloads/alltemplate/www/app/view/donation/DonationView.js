Ext.define('MyApp.view.donation.DonationView', {
    extend: 'Ext.Container',
    alias: 'widget.donationview',
//    requires:['MyApp.view.OrderView.PayPalView'],
    config: {
        layout: 'card',
        title: Loc.t('DONATION.TITLE')
    },
    initialize: function () {

        var panel = new Ext.form.Panel({
            layout: 'vbox',
            items: [{
                    xtype: 'fieldset',
                    defaults: {
                        labelWidth: '40%'
                    },
                    items: [
                        {
                            xtype: 'textfield',
                            label: Loc.t('CATELOG.NAME'),
                            name: 'fullname',
                            itemId: 'fullnameid'
                        }, {
                            xtype: 'textfield',
                            label: Loc.t('DONATION.ORG'),
                            name: 'organization',
                            itemId: 'organizationid'
                        },
                        {
                            xtype: 'textfield',
                            label: Loc.t('DONATION.CURRENCYCODE'),
                            name: 'currencycode',
                            itemId: 'currencycodeid'
                        },
                        {
                            xtype: 'textfield',
                            label: Loc.t('DONATION.AMOUNT'),
                            name: 'ammount',
                            itemId: 'ammountid'
                        }

                    ]
                }, {
                    xtype: 'button',
                    text: Loc.t('CONTACTUS.SUBMIT'),
                    baseCls: 'submitbuttonCls',
                    margin: 5,
                    scope: this,
                    handler: this.onSumbit
                }]
        });
        var topToolbar = new Ext.Toolbar({
            docked: 'top',
            title: Loc.t('CONTACTUS.TITLE')
        });
        var finalPanel = new Ext.Panel({
            layout: 'fit',
            style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [panel]
        })
        this.add([finalPanel])

    },
    onSumbit: function () {
    	this.fireEvent('onSubmitTap',this)
    }

});

