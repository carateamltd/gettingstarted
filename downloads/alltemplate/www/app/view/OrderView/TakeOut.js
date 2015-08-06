/**
 * Created by hirendave on 5/25/15.
 */
/**
 * Created by hirendave on 5/15/15.
 */
Ext.define('MyApp.view.OrderView.TakeOut', {
    extend: 'Ext.form.Panel',
    alias: 'widget.takeout',
    config: {
        itemId: 'takeOut',
        id: 'takeOut',
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
				xtype: "textfield",
				label: Loc.t('CATELOG.NAME'),
				name: "vName"
			}, {
				xtype: "numberfield",
				label: Loc.t('CATELOG.TEL'),
				name: "tel"
			}, {
				xtype: "textareafield",
				label: Loc.t('CATELOG.REMARKS'),
				name: "remarks"
			}]
		}]
    }
})