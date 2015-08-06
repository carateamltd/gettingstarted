/**
 * Created by hirendave on 5/25/15.
 */
Ext.define('MyApp.model.OrderCartModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iItemId', type:'int'},
            {name: 'iAppTabId', type: 'int'},
            {name: 'iMenuId', type: 'int'},
            {name: 'vImage', type: 'string'},
            {name: 'vVarient', type: 'auto'},
            {name: 'text', type: 'string'},
            {name: 'tDescription', type: 'string'},
            {name: 'fPrice', type: 'string'},
            {name: 'eStatus', type: 'string'},
            {name: 'vCurrency', type: 'string'},
            {name: 'sizes', type: 'auto'},
            {name: 'options', type: 'auto'},
            {name: 'selectedSize',type: 'string'},
            {name: 'selectedOption',type: 'int'},
            {name: 'selectedQty',type: 'int'},
            {name: 'price',type: 'int'}
        ],
        idProperty: 'iItemId'
    },
    proxy: {
        type: 'sqlitestorage',
        dbConfig: {
            tablename: 'cart',
            dbConn: MyApp.util.InitSQLite.getConnection()
        }
    }
});
