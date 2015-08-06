/**
 * Created by hirendave on 5/15/15.
 */
Ext.define('MyApp.model.CatalogProduct', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iCatelogueId', type:'int'},
            {name: 'text', type: 'string'},
            {name: 'vImage', type: 'string'},
            {name: 'tDescription', type: 'string'},
            {name: 'tTotalProduct', type: 'string'},
            {name: 'vCurrency', type: 'string'},
            {name: 'vCurrencyCode', type: 'string'},
            {name: 'eStatus', type: 'string'},
            {name: 'sizes', type: 'auto'},
            {name: 'option', type: 'auto'}
        ],
        idProperty: 'iCatelogueId'
    }
});
