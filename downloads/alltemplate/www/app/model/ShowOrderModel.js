Ext.define("MyApp.model.ShowOrderModel", {
extend: 'Ext.data.Model',
config: {
  idProperty: 'id',
  fields: [
      {name: 'iOrderId', type: 'string'},
      {name: 'iUserId', type: 'string'},
      {name: 'iApplicationId', type: 'string'},
      {name: 'iAppTabId', type: 'string'},
      {name: 'iMenuId', type: 'string'},
      {name: 'iItemId', type: 'string'},
      {name: 'vQuantity', type: 'string'},
      {name: 'fPrice', type: 'string'},
      {name: 'status', type: 'string'},
      {name: 'vName', type: 'string'},
      {name: 'vStatus', type: 'string'},
      {name: 'vItemName', type: 'string'},
      {name: 'vVarient', type: 'string'},
      {name: 'tDescription', type: 'string'},
      {name: 'eStatus', type: 'string'},
      {name: 'Total', type: 'string'},
      {name: 'vImage', type: 'string'},
      {name: 'vCurrency', type: 'string'}
  ]
}
});
