Ext.define('MyApp.view.OrderView.CustomerOrderDetailView', {
    extend: 'Ext.Container',
    alias: 'widget.customerorderdetailview',
    requires:['MyApp.view.OrderView.PayPalView'],
    config: {
       layout:'card',
       title:Loc.t('CATELOG.CLIENTDETAILS')
    },
    initialize: function() {
    	   
    	var panel=new Ext.form.Panel({
    		layout:'vbox',
    		items:[{
                xtype: 'fieldset',
                defaults:{
                	labelWidth:'40%'
                },
                items: [
                    {
                        xtype: 'textfield',
                        label: Loc.t('CATELOG.NAME'),
                        name: 'fullname',
                        itemId:'fullnameid',
                        required: true
                    },
                    {
                        xtype: 'numberfield',
                        label: Loc.t('RESERVATION.MOBILENO'),
                        name: 'mobileno',
                        itemId:'mobilenum',
                        required: true
                    },
                    {
                        xtype: 'textfield',
                        label: Loc.t('CATELOG.AREANAME'),
                        name: 'areaname',
                        itemId:'areanameid',
                        required: true
                    },
                    {
                        xtype: 'textfield',
                        label: Loc.t('CATELOG.ADDRESS'),
                        name: 'address',
                        itemId:'addressid',
                        required: true
                    },{
                        xtype: 'textfield',
                        label: Loc.t('CATELOG.EMAIL'),
                        name: 'email',
                        itemId:'emailid',
                        required: true
                    },{
                        xtype: 'numberfield',
                        label: Loc.t('CATELOG.ZIPCODE'),
                        name: 'pincode',
                        itemId:'pincodeid',
                        required: true
                    }
                   
                ]
            },{
            	xtype:'button',
            	text:Loc.t('ORDER.SUBMITORDER'),
            	baseCls:'submitbuttonCls',
            	margin:5,
            	scope:this,
            	handler:this.onSumbit
            }]
    	});
    	var finalPanel=new Ext.Panel({
    		layout:'fit',
    		style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
    		items:[panel]
    	})
    	this.add([finalPanel])
    	
    },
    onSumbit:function(){
    	this.fireEvent('onSubmitTap',this)
    }

});

