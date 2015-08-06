Ext.define('MyApp.view.OrderView.PayPalView', {
    extend: 'Ext.Container',
    alias: 'widget.paypalview',
    config: {
       layout:'card',
       style:'background-color:white;',
       title:'Paypal View'
    },
    initialize: function() {
    	   
    	var panel=new Ext.form.Panel({
    		layout:'vbox',
    		pack:'center',
    		items:[{
            	xtype:'button',
            	text:'Pay Pal',
            	baseCls:'submitbuttonCls',
            	margin:5,
            	scope:this,
            	handler:this.onSumbit
            }]
    	});
    	
    	this.add([panel])
    	
    },
    onSumbit:function(){
        TextConstants.PayOption='order'
    	OnBuy();
    }

});

