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
                        label: Loc.t('CATELOG.NAME'),
                        name: 'fullname',
                        itemId:'fullnameid'
                    },{
                        xtype: 'textfield',
                        label: Loc.t('CATELOG.EMAIL'),
                        name: 'email',
                        itemId:'emailid'
                    }
                   
                   
                ]
            },{
            	xtype:'button',
            	text:Loc.t('BUTTON.SUBSCRIBE'),
            	baseCls:'submitbuttonCls',
            	margin:5,
            	scope:this,
            	handler:this.onSumbit
            }]
    	});
    	var topToolbar=new Ext.Toolbar({
    		docked:'top',
			height: 50,
                title:Loc.t('MAILING.MAILINGVIEW')
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

