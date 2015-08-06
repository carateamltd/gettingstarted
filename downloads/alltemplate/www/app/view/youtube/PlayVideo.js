//Ext.define('MyApp.view.youtube.PlayVideo', {
//    extend: 'Ext.Panel',
//    xtype: 'playvideo',
//    requires: [],
//    config: {
//              items:[{
//                     
//           html: '<iframe height="100px" width="100px" class="youtube-player" type="text/html" src="http://www.youtube.com/embed/9IYRC7g2ICg?modestbranding=1&showsearch=0&theme=dark&showinfo=0&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>',
//                     
//              }]
//    }
//});

Ext.define('MyApp.view.youtube.PlayVideo', {
    extend: 'Ext.Panel',
    alias: "widget.playvideo",
    requires: [],
    config: {
        layout: 'card',
        height:'60%',
        width: '100%',
        style: 'border-radius:10px;',
        hideOnMaskTap: false,
        scrollable: false,
        modal: true,
        showAnimation: {
            type: 'fade',
            duration: 400,
            easing: 'ease-in'
        },
        centered: true,
        fullscreen: true,
    },
    initialize: function() {

        var topPanel = new Ext.Toolbar({
            docked: 'top',
            itemId:'videotoolbarid',
            title:Loc.t('YOUTUBE.VIDEO'),
            items: [{xtype:'spacer'},{
                    xtype: 'button',
                    iconCls: 'delete',
                    iconMask:true,
                    scope: this,
                    handler: this.onCancle
                }]
        });

    
        var btnPanel = new Ext.Panel({
            layout: 'fit',
            height:'100%',
            margin:5,
            scrollable:{
            	direction:"horizontal"
            },
            items: [{
            			html:'<iframe  class="youtube-player" type="text/html" src="http://www.youtube.com/embed/vP0gT-G4AEI?" frameborder="0" allowfullscreen></iframe>',
            			itemId:'videoid'
                }]
        });
       
      

        this.add([topPanel,btnPanel]);
    },
    onCancle:function(){
    	  this.fireEvent('onCancle', this)
    }
  
});

