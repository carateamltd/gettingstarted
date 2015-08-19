Ext.define('MyApp.view.catelog.CatelogDetails', {
    extend: 'Ext.Container',
    alias: 'widget.catelogdetails',
    config: {
        layout: 'card',
        title: Loc.t('CATELOG.TITLE'),
    },
    initialize: function () {
        var storeData = this.config.data;
        var headerImage = storeData.vCatalogueImage;
        var Title = storeData.vCatalogueTagname;
        var descr = storeData.tDescription;
        var quantity = storeData.tTotalProduct;
        var qunt_select=new Array;
        var vCurrency = storeData.vCurrency;

        for(var init=1;init<=quantity;init++){
            qunt_select.push({text: init, value: init});
        }

        var objCatelogsizeStore = Ext.getStore('catelogsizestoreid');
        var count=objCatelogsizeStore.getCount();
        var height=count*50 + 30;

        var length = objCatelogsizeStore.getCount();

        var sizeListid;
        sizeListid = Ext.create('Ext.List', {
            height: height,
            store: 'catelogsizestoreid',
            scrollable: false,
            itemId: 'commerceSizeListid',
            style: 'background-color:transparent;',
            itemTpl: '<div class="chooseSizeCls"><input type="radio" name="size" value="size1" style="zoom: 2;margin-right: 10px;"><span style="top: -8px;  position: relative;">{vSizeName} {fSizePrice} '+vCurrency+'</span></div>'
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
                    html: '<div style="text-align:left;font-weight: bold;font-size: 18px;padding-left: 10px;">'+ Loc.t('ECOMMERCE.DETAILS') +'</div>',
                    margin: '0 10 0 10'
                }, {
                    html: '<div style="text-align:left;font-size: 16px;word-wrap:break-word;width:100%">' + descr + '</div>',
                    itemId: 'itemDetail_panelid',
                    margin: '0 10 0 10'
                }, 
                
                sizeListid,{
                    xtype: 'fieldset',
                    margin: 10,
                    title: Loc.t('CATELOG.QTY'),
                    items: [{
                        xtype: 'selectfield',
                        itemId: 'qtyCatalogueID',
                        defaultPhonePickerConfig : {
                            doneButton : Loc.t('ORDER.DONE'),
                            cancelButton : Loc.t('ORDER.CANCEL')
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
                //    text: 'Add to Cart',
                    ui: 'action',
                    scope: this,
                    handler: this.onBuy
                }
            ]
        })
        this.add([ImagePanel])
    }

})