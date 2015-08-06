Ext.define('MyApp.view.donation.DonationView', {
    extend: 'Ext.Container',
    alias: 'widget.donationview',
//    requires:['MyApp.view.OrderView.PayPalView'],
    config: {
        layout: 'card',
        title: 'Donation'
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
                            label: 'Name:',
                            name: 'fullname',
                            itemId: 'fullnameid'
                        }, {
                            xtype: 'textfield',
                            label: 'Organization:',
                            name: 'organization',
                            itemId: 'organizationid'
                        },
                        {
                            xtype: 'textfield',
                            label: 'Currency Code:',
                            name: 'currencycode',
                            itemId: 'currencycodeid'
                        },
                        {
                            xtype: 'textfield',
                            label: 'Ammmount:',
                            name: 'ammount',
                            itemId: 'ammountid'
                        }

                    ]
                }, {
                    xtype: 'button',
                    text: 'Submit',
                    baseCls: 'submitbuttonCls',
                    margin: 5,
                    scope: this,
                    handler: this.onSumbit
                }]
        });
        var topToolbar = new Ext.Toolbar({
            docked: 'top',
            title: 'Contact us'
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

