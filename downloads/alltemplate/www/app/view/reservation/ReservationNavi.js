Ext.define("MyApp.view.reservation.ReservationNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.TimePickerField"
    ],
    alias: "widget.reservationnavi",
    config: {
        navigationBar: {
            hidden: false
        },
        items: [/*{
			xtype: 'reservationview',
			title: Loc.t('RESERVATION.TITLE'),
			scrollable: {
				indicators: false
			}
		}*/ {
			xtype: 'formpanel',
			items:[{
                xtype: 'fieldset',
                items: [{
					xtype: 'hiddenfield',
					name: 'iApplicationId',
					value: TextConstants.ApplicationId
                }, {
					xtype: 'textfield',
					name: 'fullname',
					placeHolder: Loc.t('CONTACTUS.NAME') + '*'
				}, {
					xtype: 'emailfield',
					name: 'email',
					placeHolder: Loc.t('HOME.EMAIL') + '*'
				}, {
					xtype: 'numberfield',
					name: 'mobile',
					placeHolder: Loc.t('RESERVATION.MOBILENO') + '*'
				}, {
					xtype: 'datepickerfield',
					name: 'date',
					placeHolder: Loc.t('CATELOG.DATE') + '*',
					dateFormat: 'd/m/Y',
					picker: {
						doneButton: Loc.t('BUTTON.OK'),
						cancelButton: Loc.t('BUTTON.CANCEL'),
						yearFrom: new Date().getFullYear(),
						yearTo: new Date().getFullYear() + 1
					}
				}, {
					xtype: 'timepickerfield',
					name: 'time',
					placeHolder: Loc.t('RESERVATION.TIME') + '*'
				}, {
					xtype: 'numberfield',
					name: 'noOfPersons',
					placeHolder: Loc.t('RESERVATION.NOOFPERSON') + '*'
				}, {
					xtype: 'textareafield',
					name: 'particular',
					placeHolder: Loc.t('RESERVATION.PERTICULAR')
				}]
            }, {
				xtype: 'button',
				text: Loc.t('RESERVATION.BOOKBUTTON'),
				baseCls: 'submitbuttonCls',
				margin: 5,
				itemId: 'sumbitReservation'
            }]
		}]
    }
});
