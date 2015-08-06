Ext.define('MyApp.view.quote.QuoteView', {
    extend: 'Ext.Container',
    alias: 'widget.quoteview',
//    requires: ['MyApp.view.OrderView.PayPalView'],
    config: {
        layout: 'card',
       
    },
    initialize: function () {
        var panel = new Ext.form.Panel({
            layout: 'vbox',
            itemId: 'appointmentformid',
                    items: [
                        {
                            xtype: 'textfield',
                            label: 'Name:',
                            name: 'quotetname',
                            itemId: 'quotenameid'
                        }, {
                            xtype: 'emailfield',
                            label: 'Email:',
                            name: 'quoteemail',
                            itemId: 'quoteemailid'
                        }, {
                            xtype: 'numberfield',
                            label: 'Phone no:',
                            name: 'quotephonenumber',
                            itemId: 'quotephonenumberid'
                        },
                        {
                            xtype: 'textfield',
                            label: 'Comment:',
                            name: 'quotecomment',
                            itemId: 'quotecommentid'
                        }, {
                            xtype: 'button',
                            text: 'Submit',
                            baseCls: 'submitbuttonCls',
                            margin: 5,
                            scope: this,
                            handler: this.onSumbit
                        }
                    ]
        });
        var finalPanel = new Ext.Panel({
            layout: 'fit',
            style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [{xtype: 'toolbar', title: 'Quotation', docked: 'top', height: 50}, panel]
        })
        this.add([finalPanel])

    },
    onSumbit: function () {

        this.fireEvent('onQuoteSubmitTap', this)
    }

});

