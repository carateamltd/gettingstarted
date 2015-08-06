Ext.define('MyApp.store.OrderSummaryStore', {
    extend: 'Ext.data.Store',
    config: {
        fields: ['orderType', 'deliverydate', 'deliverytime', 'vName', 'strNo', 'vCity', 'vPincode', 'tel', 'apartmentNo', 'remarks'],
        autoLoad: false
    }
});
 