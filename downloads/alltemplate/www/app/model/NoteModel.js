Ext.define('MyApp.model.NoteModel', {
    extend: 'Ext.data.Model',
    config: {
         idProperty: 'id',
        fields: [
            {name: 'text', type: 'string'},
            {name: 'date', type: 'date'},
        ]
    },
    proxy: {
            type: 'sqlitestorage',
            dbConfig: {
                tablename: 'notepad',
                dbConn: MyApp.util.InitSQLite.getConnection()
            }
        }
});
