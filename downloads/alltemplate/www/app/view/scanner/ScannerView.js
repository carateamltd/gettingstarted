Ext.define('MyApp.view.scanner.ScannerView', {
    extend: 'Ext.Container',
    alias: 'widget.scannerview',
    config: {
        layout: 'card',
        title: Loc.t('SCANNER.TITLE')
    },
    initialize: function () {

        
        var btnPanel = new Ext.Panel({
            layout: {
                type: 'hbox',
                pack: 'center'
            },
            items: [
                {xtype: 'spacer'}, {
                    xtype: 'button',
                    width: '60%',
                    style:'padding:10px;',
                    ui: 'confirm',
                    text: Loc.t('SCANNER.TEXT'),
                    scope:this,
                    handler:this.onConfirm
                }, {
                    xtype: 'spacer'
                }]
        })
        var finalPanel = new Ext.Panel({
            layout: {
                type:'vbox',
                pack:'center'
            },
            scrollable: true,
            style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [btnPanel]
        })
        this.add([finalPanel])
    },
    onConfirm:function(){
        this.fireEvent('onScan',this)
    }
   
});