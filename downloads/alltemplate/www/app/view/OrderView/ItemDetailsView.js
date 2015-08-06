Ext.define('MyApp.view.OrderView.ItemDetailsView', {
    extend: 'Ext.Container',
    alias: 'widget.itemdetailsview',
    config: {
        layout: 'card',
        title:Loc.t('ORDER.ITEMDETAILS')
    },
    initialize: function () {
        var storeData = this.config.data;
        console.log('=====================DATA START=====================');
        console.log(storeData);
        console.log('=====================DATA END=====================');
        var headerImage = storeData.vImage;
        var Title = storeData.vItemName;
        var descr = storeData.tDescription;

        var vCurrency = storeData.vCurrency;
        console.log('=====================DATA CURR=====================');
        console.log(vCurrency);
        console.log('=====================DATA CURR=====================');
        var mystore = Ext.getStore('sizeitemstoreid');
        var optionstore = Ext.getStore('optionitemstoreid');
        var count=mystore.getCount();
        var optionListCount=optionstore.getCount();
        var height=count*50 + 30;
        var optionListHeight=optionListCount*50 + 20;
        var sizeListid;
        var optionListid;
        if(count == 0){
            sizeListid = Ext.create('Ext.Spacer',{height:2});
        }else{
            sizeListid =  Ext.create('Ext.List',{
                    height:height,
                    store: 'sizeitemstoreid',
                    scrollable:false,
                    itemId:'sizeitemListID',
                    style:'background-color:transparent;',
                    itemTpl:'<div class="chooseSizeCls"><input type="radio" name="size" value="size1" style="zoom: 2;margin-right: 10px;"><span style="top: -8px;  position: relative;">{vSizeName} ({fPrice} '+vCurrency+')</span></div>'    
            })
        }
        if(optionListCount == 0){
              optionListid =Ext.create('Ext.Spacer',{height:2});
        }else{
            optionListid = Ext.create('Ext.List',{
                    height:optionListHeight,
                    store: 'optionitemstoreid',
                    scrollable:false,
                    itemId:'optionListid',
                    style:'background-color:transparent;',
                    itemTpl:'<div class="chooseSizeCls"><input type="checkbox" name="size" value="size1" style="zoom: 2;margin-right: 10px;"><span style="top: -8px;  position: relative;">{vOptName} ({fCharge} '+vCurrency+')</span></div>'
            })
        }
        
        
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
                    html: '<div style="text-align:left;font-weight: bold;font-size: 18px;padding-left: 10px;">'+Loc.t('ORDER.DETAILS')+'</div>',
                    margin: '0 10 0 10'
                }, {
                    html: '<div style="text-align:left;font-size: 16px;word-wrap:break-word;width:100%">' + descr + '</div>',
                    itemId: 'itemDetail_panelid',
                    margin: '0 10 0 10'
                }, 
                {
                    xtype: 'fieldset',
                    margin: 10,
                    title: Loc.t('ORDER.CHOOSESIZE'),
                    itemId:'sizeLabelid'
                },sizeListid,{
                    xtype: 'fieldset',
                    margin: 10,
                    title: Loc.t('ORDER.CHOOSEOPTION'),
                    itemId:'optionLableid'
                },
                optionListid,{
                    xtype: 'fieldset',
                    margin: '0 10 10 10',
                    title: Loc.t('ORDER.SPECIFICINSTRUCTION'),
                    items: [{
                            xtype: 'textfield',
                            itemId: 'specificTextfieldid'
                        }]
                },{
                    xtype: 'fieldset',
                    margin: 10,
                    title: Loc.t('ORDER.QUANTITY'),
                    items: [{
                            xtype: 'selectfield',
                            itemId: 'qtyItemID',
                            usePicker: true,
                            defaultPhonePickerConfig : {
                                doneButton : 'Ok',
                                cancelButton : 'Annuler'
                            },
                            options: [
                                {text: '1', value: '1'},
                                {text: '2', value: '2'},
                                {text: '3', value: '3'},
                                {text: '4', value: '4'},
                                {text: '5', value: '5'},
                                {text: '6', value: '6'},
                                {text: '7', value: '7'},
                                {text: '8', value: '8'},
                                {text: '9', value: '9'},
                                {text: '10', value: '10'}
                            ]
                        }]
                },{
                    xtype: 'button',
                    margin: '0 10 10 10',
                    padding: 10,
                    text: Loc.t('ORDER.ADDITEMTOORDER'),
                    ui: 'round',
                    scope: this,
                    handler: this.onAddOrder
                }]
        })
        this.add([ImagePanel])
    },
    onAddOrder: function () {
        var storeData = this.config.data;
//        var headerImage=storeData.vImage;
//        var Title=storeData.vItemName;
//        var descr=storeData.tDescription;
        console.log('in view');
        this.fireEvent('onAddOrderTap', storeData)
    }
})