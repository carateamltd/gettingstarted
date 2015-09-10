Ext.define('MyApp.view.custom.CustomDetail', {
    extend: 'Ext.Container',
    alias: 'widget.customdetail',
    config: {
        layout: 'card'
    },
    initialize: function () {
    	var title=this.config.data.vTitle;
    	var desc=this.config.data.tDescription;
        var finalPanel = new Ext.Panel({
            layout: 'fit',
            scrollable:true,
            items: [{
                html:'<div style="width:100%;word-break: break-word;">'+
                	'<strong style="display: block;width:100%;text-align:center;">'+ title + '</strong>'+
                	'<div style="padding:5px;width:100%;word-break: break-word;">'+ desc + '</div>'+
                '</div>',
            		defaults: {
						styleHtmlContent: true
					}
                }
            ]
        });
        this.add([finalPanel])
    }
});
