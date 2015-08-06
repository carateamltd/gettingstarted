Ext.define('MyApp.view.OrderView.CustomerOrderDetailView', {
    extend: 'Ext.Container',
    alias: 'widget.customerorderdetailview',
    requires:['MyApp.view.OrderView.PayPalView'],
    config: {
       layout:'card',
       title:'Customer Details'
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
                        label: 'Full Name*:',
                        name: 'fullname',
                        itemId:'fullnameid'
                    },
                    {
                        xtype: 'numberfield',
                        label: 'Mobile No*:',
                        name: 'mobileno',
                        itemId:'mobilenum'
                    },
                    {
                        xtype: 'textfield',
                        label: 'Area Name*:',
                        name: 'areaname',
                        itemId:'areanameid'
                    },
                    {
                        xtype: 'textfield',
                        label: 'Address*:',
                        name: 'address',
                        itemId:'addressid'
                    },{
                        xtype: 'textfield',
                        label: 'Email*:',
                        name: 'email',
                        itemId:'emailid'
                    },{
                        xtype: 'numberfield',
                        label: 'Pin Code*:',
                        name: 'pincode',
                        itemId:'pincodeid'
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

