Ext.define('MyApp.view.calculator.MortgageCalculator', {
    extend: 'Ext.Container',
    alias: 'widget.mortgagecalculator',
    config: {
        layout: 'card',
    },
    initialize: function () {
        var opts = [{
                text: '1.00%',
                value: 1
            }, {
                text: '2.00%',
                value: 2
            }, {
                text: '3.00%',
                value: 3
            }, {
                text: '4.00%',
                value: 4
            },{
                text: '5.00%',
                value: 5
            },{
                text: '6.00%',
                value: 6
            },{
                text: '7.00%',
                value: 7
            },{
                text: '8.00%',
                value: 8
            },{
                text: '9.00%',
                value: 9
            },{
                text: '10.25%',
                value: 10.25
            }];
        var loanTermsOpt = [{
                text: '3 Yr.',
                value: 3
            },{
                text: '5 Yr.',
                value: 5
            },{
                text: '8 Yr.',
                value: 8
            },{
                text: '10 Yr.',
                value: 10
            },{
                text: '15 Yr.',
                value: 15
            },{
                text: '20 Yr.',
                value: 20
            },{
                text: '25 Yr.',
                value: 25
            },{
                text: '30 Yr.',
                value: 30
            },{
                text: '35 Yr.',
                value: 35
            },{
                text: '40 Yr.',
                value: 40
            }];
        var panel = new Ext.form.Panel({
            layout: 'vbox',
            items: [{
                    xtype: 'fieldset',
                    defaults: {
                        labelWidth: '40%'
                    },
                    items: [
                        {
                            xtype: 'numberfield',
                            label: 'Home Price:',
                            name: 'homeprice',
                            itemId: 'homepriceID'
                        },
                        {
                            xtype: 'numberfield',
                            label: 'Down Payment:',
                            name: 'downpayment',
                            itemId: 'downPaymentID'
                        },
                        {
                            xtype: 'numberfield',
                            label: 'Loan Amount:',
                            disabled: true,
                            itemId:'loanAmtId',
                            name: 'loanAmt'
                        },
                        {
                            xtype: 'selectfield',
                            label: 'Interest Rate',
                            itemId:'interestRateID',
                            usePicker: true,
                            options: opts
                        },{
                            xtype: 'selectfield',
                            label: 'Loan Term',
                            itemId:'loantermsID',
                            usePicker: true,
                            options: loanTermsOpt
                        },{
                            xtype: 'numberfield',
                            label: 'Monthly Amount(EMI):',
                            name: 'monthlyamt',
                            disabled: true,
                            itemId: 'monthlyAmtId'
                        }
                    ]
                }, {
                    xtype: 'button',
                    text: 'Calculate',
                    baseCls: 'submitbuttonCls',
                    margin: 5,
                    scope: this,
                    handler: this.onCalucalate
                }]
        });
        var finalPanel = new Ext.Panel({
            layout: 'fit',
            style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [{xtype:'toolbar',docked:'top',title:'Mortgage Calculator',height:50},panel]
        })
        this.add([finalPanel])
    },
    onCalucalate: function () {
        this.fireEvent('onCalucalate', this)
    }

});

