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
                            label: Loc.t('CATELOG.NAME'),
                            name: 'quotetname',
                            itemId: 'quotenameid'
                        }, {
                            xtype: 'emailfield',
                            label: Loc.t('CATELOG.EMAIL'),
                            name: 'quoteemail',
                            itemId: 'quoteemailid'
                        }, {
                            xtype: 'numberfield',
                            label: Loc.t('CATELOG.TEL'),
                            name: 'quotephonenumber',
                            itemId: 'quotephonenumberid'
                        },
                        {
                            xtype: 'textfield',
                            label: Loc.t('CATELOG.COMMENT'),
                            name: 'quotecomment',
                            itemId: 'quotecommentid'
                        }, {
                            xtype: 'button',
                            text: Loc.t('CONTACTUS.SUBMIT'),
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
            items: [{xtype: 'toolbar', title: Loc.t('QUOTATION.TITLE'), docked: 'top', height: 50}, panel]
        })
        this.add([finalPanel])

    },
    onSumbit: function () {

        this.fireEvent('onQuoteSubmitTap', this)
    }

});

