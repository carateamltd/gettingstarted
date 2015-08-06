Ext.define('MyApp.model.MessageModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'id',type:'string'},
            {name: 'message', type: 'string'},
            {name: 'date', type: 'string'},
        ],
//        proxy: {
//            type: 'sqlitestorage',
//            dbConfig: {
//                tablename: 'message',
//                dbConn: MyApp.util.InitSQLite.getConnection()
//            }
//        }
    }
});
  