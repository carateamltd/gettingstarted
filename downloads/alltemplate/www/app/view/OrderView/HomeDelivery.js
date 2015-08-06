/**
 * Created by hirendave on 5/25/15.
 */
/**
 * Created by hirendave on 5/15/15.
 */
Ext.define('MyApp.view.OrderView.HomeDelivery', {
    extend: 'Ext.form.Panel',
    alias: 'widget.homedelivery',
    config: {
        itemId: 'homeDelivery',
        id: 'homeDelivery',
        layout: 'vbox',
        items: [{
			xtype:'button',
			text:Loc.t('CATELOG.CHECKOUT'),
			docked: 'bottom',
			itemId: 'btnFillCustomerDetails',
			id: 'btnFillCustomerDetails',
			baseCls:'submitbuttonCls',
			margin:5,
			handler: function(){
				//MyApp.app.getController('OrderController').onBtnCheckOutTap();
			}
		}, {
			xtype: "fieldset",
			items: [{
				xtype: "datepickerfield",
				label: Loc.t('CATELOG.DATE'),
				name: 'deliverydate',
				value: new Date(),
				dateFormat: 'd/m/y'
			}, {
				xtype: "textfield",
				label: Loc.t('CATELOG.TIME'),
				name: 'deliverytime'
			}, {
				html: Loc.t('CATELOG.ADDRESS'),
				styleHtmlContent: true,
				style: 'font-weight: bolder;'
			}, {
				xtype: "textfield",
				label: Loc.t('CATELOG.NAME'),
				name: "vName"
			}, {
				xtype: "textfield",
				label: Loc.t('CATELOG.STREETNO'),
				name: "strNo"
			}, {
				xtype: "textfield",
				label: Loc.t('CATELOG.TOWNCITY'),
				name: "vCity"
			}, {
				xtype: "numberfield",
				label: Loc.t('CATELOG.ZIPCODE'),
				name: "vPincode"
			}, {
				xtype: "numberfield",
				label: Loc.t('CATELOG.TEL'),
				name: "tel"
			}, {
				xtype: "textfield",
				label: Loc.t('CATELOG.APARTMENTNO'),
				name: "apartmentNo"
			}, {
				xtype: "textareafield",
				label: Loc.t('CATELOG.REMARKS'),
				name: "remarks"
			}]
		}]
    }
})