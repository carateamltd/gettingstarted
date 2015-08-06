Ext.define('MyApp.view.OrderView.OrderDetailView', {
    extend: 'Ext.List',
    xtype: 'orderdetailview',
    requires: ['MyApp.view.OrderView.ShowOrderView', 'MyApp.view.OrderView.ItemDetailsView'],
    config: {
        style: "background-image: url('img/splash.png');",
        store: 'OrderDetailStore',
        id: 'orderDetailViewPanel',
        itemId: 'orderDetailViewPanel',
        height: '100%',
        styleHtmlContent: true,
        width: '100%',
        layout: {
            type: 'fit'
        },
        inline: {
            wrap: true
        },
        itemCls: 'dataview-item',
        itemTpl: '<div style="height:100px;width:100%;font-size: 12px;">'+
            '<div style="text-align: left;float:left;width:30%">'+
            '<img src="http://{vImage}" height="100px" width="100px"/>' +
            '</div>'+
            '<div style="text-align: left;float:right;padding-left:10px;width:70%">'+
            '<div style="font-weight: bold">{text}</div>'+
            '<div >{tDescription}</div>'+
            '</div>'+
            '</div>'+
            '<tpl if="sizes.length != 0" >'+
            '<div style="margin-top:15px;height:25px;font-size: 12px;">'+
            '<span style="font-weight:bold;position:relative;top:5px">Size : </span>'+
            '<div class="styled-select">'+
            '<select style="" id="ordersize_{iItemId}" onchange="MyApp.app.getController(\'OrderController\').changeProductSizePrice(this, \'detailView\')"><option value="NA">-Select-</option>'+
            '<tpl for="sizes">'+
            '<option value="{iSizeId}">{vSizeName} ({parent.vCurrency}{fPrice})</option>'+
            '</tpl>'+
            '</select>'+
            '</div>'+
            '</div>'+
            '</tpl>'+
            '<tpl if="options.length != 0" >'+
            '<div style="margin-top:15px;height:25px;font-size: 12px;">'+
            '<span style="font-weight:bold;position:relative;top:5px">Option : </span>'+
            '<div class="styled-select">'+
            '<select style="" id="orderoption_{iItemId}" onchange="MyApp.app.getController(\'OrderController\').changeProductOptionPrice(this, \'detailView\')"><option value="NA">-Select-</option>'+
            '<tpl for="options">'+
            '<option value="{iOptionId}">{vOptName} ({parent.vCurrency}{fCharge})</option>'+
            '</tpl>'+
            '</select>' +
            '</div>'+
            '</div>'+
            '</tpl>'+
            '<div id="orderprice_{iItemId}"style="margin-top:5px;height:25px;font-size: 12px;font-weight:bold">'+
            '<tpl if="sizes.length == 0" >'+
            'Price : {vCurrencyCode}{fPrice}'+
            '<tpl else>'+
            'Price : -' +
            '</tpl>'+
            '</div>'+
            '<div style="width:50%;float:left;margin-top:5px;font-weight:bold;font-size:12px">Qty : <input value="1" id="orderqty_{iItemId}" type="text" style="width:40px;height:40px"></div>'+
            '<div style="width:50%;float:right;margin-top:5px"><button id="ordercart_{iItemId}" onclick="MyApp.app.getController(\'OrderController\').addProductToCart(this)" class="cartBtn" style="float: right;width: 40px; height: 40px;" type="button"></button></div>'
    }
});
