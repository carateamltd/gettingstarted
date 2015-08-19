Ext.define('MyApp.view.contactus.ContactView', {
    extend: 'Ext.Container',
    alias: 'widget.contactview',
//    requires:['MyApp.view.OrderView.PayPalView'],
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
                        label: Loc.t('CONTACTUS.NAME')+'*',
                        name: 'fullname*',
                        itemId:'fullnameid'
                    },{
                        xtype: 'textfield',
                        label: Loc.t('CONTACTUS.EMAIL')+'*',
                        name: 'email*',
                        itemId:'emailid'
                    },
                    {
                        xtype: 'numberfield',
                        label: Loc.t('CONTACTUS.TELEPHONE')+'*',
                        name: 'mobileno',
                        itemId:'mobilenumid'
                    },
                   {
                        xtype: 'textareafield',
                        label: Loc.t('CONTACTUS.MESSAGE')+'*',
                        name: 'messagefield*',
                        itemId:'messagefieldid',
                        flex: 10,
                        height: 200
                    }
                   
                ]
            },{
            	xtype:'button',
            	text:Loc.t('CONTACTUS.SUBMIT'),
            	baseCls:'submitbuttonCls',
            	margin:5,
            	scope:this,
            	handler:this.onSumbit
            }]
    	});
    	var topToolbar=new Ext.Toolbar({
    		docked:'top',
            title:Loc.t('CONTACTUS.TITLE')
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

