Ext.define('MyApp.view.ecommarce.EcommarceDetails', {
    extend: 'Ext.Container',
    alias: 'widget.ecommarcedetails',
    config: {
        layout: 'card',
        title: Loc.t('ECOMMERCE.TITLE')
    },
    initialize: function () {
        var storeData = this.config.data;
        console.log('=====================DATA START=====================');
        console.log(storeData);
        console.log('=====================DATA END=====================');
        var headerImage = storeData.vCatalogueImage;
        var Title = storeData.vCatalogueTagname;
        var descr = storeData.tDescription;
        var quantity = storeData.tTotalProduct;
        var vSize = storeData.vSize;
        var vCurrency = storeData.vCurrency;
    
        var mystore = Ext.getStore('catelogsizestoreid');
        var count = mystore.getCount();
        var height = count * 50 + 30;
       
        var sizeListid;
        var qunt_select=new Array;
        var size_select=new Array;

        /*
    		Quantity
    	*/
        for(var init=1;init<=quantity;init++){
            qunt_select.push({text: init, value: init});
        }

        /*
            Sizes
        */
        for(var init=1;init<=1;init++){
            size_select.push({text: vSize});
        }

        sizeListid = Ext.create('Ext.List', {
            height: height,
            store: 'catelogsizestoreid',
            scrollable: false,
            itemId: 'commerceSizeListid',
            style: 'background-color:transparent;',
            itemTpl: '<div class="chooseSizeCls"><input type="radio" name="size" value="size1" style="zoom: 2;margin-right: 10px;"><span style="top: -8px;  position: relative;">{vSizeName} (${fSizePrice})</span></div>'
        })
        var ImagePanel = new Ext.Panel({
            layout: {
                type: 'vbox',
                pack: 'center'
            },
            scrollable: {
                indicators: false
            },
            items: [{
                    html: '<div style="text-align:center;font-weight: bold;font-size: 18px;">' + Title + '<div>',
                    margin: '10 0 10 0'
                }, {
                    html: '<div style="text-align:center"><img src="http://' + headerImage + '" width="100%"/></div>',
                    margin: '0 10 10 10'
                }, {
                    html: '<div style="text-align:center;font-weight: bold;font-size: 18px;padding-left: 10px;">'+Loc.t('ECOMMERCE.DETAILS')+'</div>',
                    margin: '0 10 0 10'
                }, {
                    html: '<div style="text-align:left;font-size: 16px;word-wrap:break-word;width:100%">' + descr + '</div>',
                    itemId: 'itemDetail_panelid',
                    margin: '0 10 0 10'
                },
                sizeListid,
                {
                    xtype: 'fieldset',
                    margin: 10,
                    title: 'Quantity:',
                    items: [{
                        xtype: 'selectfield',
                        itemId: 'qtyCatalogueID',
                        defaultPhonePickerConfig : {
                            doneButton : 'Ok',
                            cancelButton : 'Annuler'
                        },
                        usePicker: true,
                        options: qunt_select
                    }]
                },
                {
                    xtype: 'button',
                    margin: '10 10 10 10',
                    padding: 10,
                    itemId:'ecommerce_AddtocartBtnid',
                    text: 'Add to Cart',
                    ui: 'action',
                    scope: this,
                    handler: this.onBuy
                }
            ]
        })
        this.add([ImagePanel])
    },
    
    onBuy:function(){
         var storeData = this.config.data;
   //      var size = '2'; //Ext.getCmp("qtyCatalogueID").getValue();
         this.fireEvent("onBuyTest",storeData,'asasa')
    }
})
