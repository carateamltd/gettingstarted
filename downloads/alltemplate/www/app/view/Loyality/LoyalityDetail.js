Ext.define('MyApp.view.Loyality.LoyalityDetail', {
    extend: 'Ext.Panel',
    xtype: 'loyalitydetail',
    requires: [],
    config: {
    		 layout:'card',
    		 title: Loc.t('LOYALTY.TITLE'),
    },
        initialize: function() {
            var myPanel=Ext.Panel({
                height:50,
                style:'background-color:#FFEBCD',
                margin:'40 10 0 10',
                layout:'vbox',
                 items:[{xtype:'spacer'},{
    			 xtype:'panel',
    			 layout:{
    				  type: 'hbox',
    	              pack: 'center'
    			 },
    			 items:[{
    				 html:'',
    				 itemId:'coupenBtnId'
    			 }]
    		 },{xtype:'spacer'}]
            });
            var msgPanel=new Ext.Panel({
            	margin:'10 10 0 10',
            	layout:'vbox',
            	items:[{
            		xtype:'panel',
            		layout:'hbox',
            		items:[{
            			xtype:'spacer'
            		},{
            		  html:Loc.t('LOYALTY.STAMPCARD'),
            		  styleHtmlContent:true,
                      style:'word-wrap: break-word;font-size:28px;font-weight:bold;',
            		},{
            			xtype:'spacer'
            		}]
            		
            	},{
            		html:'<div style="text-align:center;">'+Loc.t('LOYALTY.PLEASEHANDYOURDEVICE')+'</div>',
            		margin:'0 0 10 0'
            	}]
            });
            var usePanel=new Ext.Panel({
            	style:'background-color:rgba(255, 255, 255, 0.43)',
            	margin:'0 10 10 10',
            	
            	items:[{
            		xtype:'fieldset',
            		items:[{
            			xtype:'passwordfield',
            			name:'secretcode',
            			placeHolder: Loc.t('LOYALTY.SECRETCODE'),
            			itemId:'secretCodeID',
            		},{
            			xtype:'button',
            			text:Loc.t('LOYALTY.SUBMITCODE'),
            			ui:'action',
            			margin:'2% 0 2% 25%',
            			baseCls:'submitbuttonCls',
            			width:'50%',
            			itemId:'submitBtnID',
            			scope:this,
            			handler:this.onSubmit
            		}]
            	}]
            });
            var myPanel2=Ext.Panel({
                layout:'vbox',
                style: "background-image: url('img/splash.png');",
                items:[
                    myPanel,
                    msgPanel,
                    usePanel
                ]
            });
            
            this.add([myPanel2])
    
         },
         onSubmit:function(){
//        	 alert('onSubmit tap')
        	  this.fireEvent('onSecretSubmitTap', this)
        	 
         }
         
});