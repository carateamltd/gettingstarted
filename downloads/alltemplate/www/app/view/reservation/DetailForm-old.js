Ext.define('MyApp.view.reservation.DetailForm', {
    extend: 'Ext.Container',
    alias: 'widget.detailform',
//    requires:['MyApp.view.OrderView.PayPalView'],
    config: {
        layout: 'card',
        title: Loc.t('RESERVATION.CUSTOMERDETAILS')
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
                            label: Loc.t('RESERVATION.FIRSTNAME'),
                            name: 'fname',
                            itemId: 'firstnameid'
                        },
                        {
                            xtype: 'textfield',
                            label: Loc.t('RESERVATION.LASTNAME'),
                            name: 'lastname',
                            itemId: 'lastnameid'
                        },
                        {
                            xtype: 'emailfield',
                            label: Loc.t('RESERVATION.EMAIL'),
                            name: 'email',
                            itemId: 'emailid'
                           
                        },
                        {
                            xtype: 'numberfield',
                            label: Loc.t('RESERVATION.MOBILENO'),
                            name: 'mobileno',
                            itemId: 'mobilenum'
                        }

                    ]
                }, {
                    xtype: 'button',
                    text: Loc.t('RESERVATION.CONFIRMBOOKING'),
                    baseCls: 'submitbuttonCls',
                    margin: 5,
                    scope: this,
                    handler: this.onConfirmBooking
                }]
        });
        var finalPanel = new Ext.Panel({
            layout: 'fit',
            style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [panel]
        })
        this.add([finalPanel])

    },
    onConfirmBooking: function () {
        this.fireEvent('onConfirmBooking', this)
    }

});

