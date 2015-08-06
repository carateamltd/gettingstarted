Ext.define('MyApp.view.reservation.TimeView', {
    extend: 'Ext.Container',
    alias: 'widget.timeview',
    requires:['MyApp.view.reservation.ConfirmView'],
    config: {
        layout: 'card',
        title: Loc.t('RESERVATION.CUSTOMERDETAILS')
    },
    initialize: function () {
        var store = Ext.getStore('timestore');
        console.log(store.getCount())
        var Pictures_Video_ListView = new Ext.create('Ext.DataView', {
            scrollable: {
                direction: 'horizontal',
                indicators: false,
                directionLock: true
            },
            inline: {
                wrap: false
            },
            selectedCls: 'color:transperent',
            height: 80,
            itemId: 'timestore',
            
            emptyText: Loc.t('RESERVATION.NODATAAVAILABLE'),
            store: 'timestore',
            itemTpl: '<div style="width:50px">{time}<div>'


        });
        var panel = new Ext.form.Panel({
            layout: 'vbox',
            items: [
                {
                    xtype: 'fieldset',
                    items: [{
                            xtype: 'datepickerfield',
                            label: Loc.t('RESERVATION.BOOKINGDATE'),
                            itemId:'dateID',
                            name: 'birthday',
                            value: new Date(),
//                            listeners: {
//                                change: function (newDate, navidate, oldDate, eOpts) {
//                                    var check = new Date(navidate);
//                                    var check123 = new Date(oldDate);
//                                    var cDate=new Date();
//                                    cDate=new Date(cDate);
//                                    if (check > cDate || check == cDate) {
//                                        console.log("Success");
//                                    }else{
//                                        console.log("fail");
//                                        this.setValue(cDate)
//                                    }
//                                }
//
//                            }
                        }]
                },
                {
                     xtype: 'fieldset',
                    items: [{
                            xtype: 'selectfield',
                            label: Loc.t('RESERVATION.SELECTTIME'),
                            usePicker: true,
                            itemId:'timeid',
                            defaultPhonePickerConfig : {
                                doneButton : 'Ok',
                                cancelButton : 'Annuler'
                            },
                            store: 'timestore',
                            displayField: 'time',
                            valueField: 'time',
                        }]
                }, {
                    xtype: 'panel',
                    hegiht: 80,
//                    style: 'background-color:black;',
                    items: [{
                            xtype: 'button',
                            text: Loc.t('RESERVATION.BOOK'),
                            ui:'confirm',
                            height:50,
                            margin: 10,
                            scope: this,
                            handler: this.onBook
                        }]
                }]
        });


        this.add([panel])

    },
    onBook:function(){
        this.fireEvent('onBookTap',this)
    }
});

