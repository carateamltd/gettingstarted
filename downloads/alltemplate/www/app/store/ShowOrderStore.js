Ext.define("MyApp.store.ShowOrderStore", {
    extend: "Ext.data.Store",
    requires: [
        'MyApp.model.ShowOrderModel'
    ],
    config: {
        model: 'MyApp.model.ShowOrderModel',
        storeId: 'showorderstoreid',
        data:[
              {id:'1',name:'pulaav',qty:'2',price:'500'},
              {id:'2',name:'Biryaani',qty:'3',price:'800'}
          ]
    }
});