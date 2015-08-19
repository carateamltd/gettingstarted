Ext.define('MyApp.view.OrderView.PayPalView', {
    extend: 'Ext.Container',
    alias: 'widget.paypalview',
    config: {
       layout:'card',
       style:'background-color:white;',
       title:Loc.t('PAYPAL.TITLE')
    },
    initialize: function() {
    	   
    	var panel=new Ext.form.Panel({
    		layout:'vbox',
    		pack:'center',
    		items:[{
            	xtype:'button',
            	text:Loc.t('PAYPAL.BUTTON'),
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

