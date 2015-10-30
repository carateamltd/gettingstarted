Ext.define('MyApp.view.appointment.AppointmentView', {
    extend: 'Ext.Container',
    alias: 'widget.appointmentview',
    requires: ['MyApp.view.OrderView.PayPalView'],
    config: {
        layout: 'card',
        title: 'Customer Details'
    },
    initialize: function () {
        var otherOptions = [{
                text: '09:00',
                value: '09:00'
            }, {
                text: '10:00',
                value: '10:00'
            }, {
                text: '11:00',
                value: '11:00'
            }, {
                text: '12:00',
                value: '12:00'
            }, {
                text: '13:00',
                value: '13:00'
            }, {
                text: '14:00',
                value: '14:00'
            }, {
                text: '15:00',
                value: '15:00'
            }, {
                text: '16:00',
                value: '16:00'
            }, {
                text: '17:00',
                value: '17:00'
            }, {
                text: '18:00',
                value: '18:00'
            }, {
                text: '19:00',
                value: '19:00'
            }, {
                text: '20:00',
                value: '20:00'
            }, {
                text: '21:00',
                value: '21:00'
            }, {
                text: '22:00',
                value: '22:00'
            }, {
                text: '23:00',
                value: '23:00'
            }, {
                text: '24:00',
                value: '24:00'
            }];

        var panel = new Ext.form.Panel({
            layout: 'vbox',
            itemId: 'appointmentformid',
//            items: [{
//                    xtype: 'fieldset',
//                    defaults: {
//                        labelWidth: '40%'
//                    },
                    items: [
                        {
                            xtype: 'datepickerfield',
                            label: Loc.t('CATELOG.DATE'),
                            itemId: 'dateID',
                            name: 'appointmentdate',
                            value: new Date(),
							picker: {
								doneButton: Loc.t('BUTTON.OK'),
								cancelButton: Loc.t('BUTTON.CANCEL')
							}
                        }, {
                            xtype: 'selectfield',
                            label: Loc.t('CATELOG.TIME'),
                            itemId:'appointmenttimeid',
                            name: 'appointmentTime',
                            options: otherOptions
                        },
                        {
                            xtype: 'textfield',
                            label: Loc.t('CATELOG.NAME'),
                            name: 'appointmentname',
                            itemId: 'appointmentnameid'
                        }, {
                            xtype: 'emailfield',
                            label: Loc.t('CATELOG.EMAIL'),
                            name: 'email',
                            itemId: 'emailid'
                        }, {
                            xtype: 'numberfield',
                            label: Loc.t('CATELOG.TEL'),
                            name: 'phonename',
                            itemId: 'phonenameid'
                        },
                        {
                            xtype: 'textfield',
                            label: Loc.t('CATELOG.REMARKS'),
                            name: 'remark',
                            itemId: 'remarkid'
                        }, {
                            xtype: 'button',
                            text: Loc.t('CATELOG.CONFIRM'),
                            baseCls: 'submitbuttonCls',
                            margin: 5,
                            scope: this,
                            handler: this.onSumbit
                        },{
                            xtype:'panel',
                            itemId:'appointmentcnfrmTextid',
                            html:'<div style="text-align: center;  margin-top: 10px;  color: red;font-weight: bold;">'+Loc.t('APPOINTMENT.NOTCONFIRMMSG')+'</div>'
                            
                        }
                    ]
//                }]
        });
        var finalPanel = new Ext.Panel({
            layout: 'fit',
            style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [{xtype: 'toolbar', title: Loc.t('APPOINTMENT.TITLE'), docked: 'top', height: 50}, panel]
        })
        this.add([finalPanel])

    },
    onSumbit: function () {

        this.fireEvent('onConfirmTap', this)
    }

});

