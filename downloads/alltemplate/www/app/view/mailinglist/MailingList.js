Ext.define('MyApp.view.mailinglist.MailingList', {
    extend: 'Ext.Container',
    alias: 'widget.mailinglistview',
//    requires:['MyApp.view.OrderView.PayPalView'],
    config: {
       layout:'card',
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
                        label: 'Name:',
                        name: 'fullname',
                        itemId:'fullnameid'
                    },{
                        xtype: 'textfield',
                        label: 'Email:',
                        name: 'email',
                        itemId:'emailid'
                    }
                   
                   
                ]
            },{
            	xtype:'button',
            	text:'Subscribe',
            	baseCls:'submitbuttonCls',
            	margin:5,
            	scope:this,
            	handler:this.onSumbit
            }]
    	});
    	var topToolbar=new Ext.Toolbar({
    		docked:'top',
			height: 50,
                title:'Mailing view'
    	})
    	var finalPanel=new Ext.Panel({
    		layout:'fit',
    		style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
    		items:[topToolbar,panel]
    	})
    	this.add([finalPanel])
    	
    },
    onSumbit:function(){
    	this.fireEvent('onSubmitTap',this)
    }

});

