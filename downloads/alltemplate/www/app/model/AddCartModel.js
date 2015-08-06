Ext.define('MyApp.model.AddCartModel', {
    extend: 'Ext.data.Model',
    config: {
       fields: [
           {name:'iCatelogueId', type:'int'},
           {name: 'text', type: 'string'},
           {name: 'vImage', type: 'string'},
           {name: 'tDescription', type: 'string'},
           {name: 'vCurrencyCode', type: 'string'},
           {name: 'tTotalProduct', type: 'string'},
           {name: 'vCurrency', type: 'string'},
           {name: 'eStatus', type: 'string'},
           {name: 'sizes', type: 'auto'},
           {name: 'option', type: 'auto'},
           {name: 'selectedSize',type: 'string'},
           {name: 'selectedOption',type: 'int'},
           {name: 'selectedQty',type: 'int'},
           {name: 'price',type: 'int'}
        ],
        idProperty: 'iCatelogueId'
    },
    proxy: {
            type: 'sqlitestorage',
            dbConfig: {
                tablename: 'cart',
                dbConn: MyApp.util.InitSQLite.getConnection()
            }
        }
});
  