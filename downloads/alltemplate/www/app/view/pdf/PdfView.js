Ext.define('MyApp.view.pdf.PdfView', {
    extend: 'Ext.Container',
    alias: 'widget.pdfview',
    config: {
        layout: 'card',
        title: Loc.t('PDF.PDFVIEWER')
    },
    initialize: function () {
        var pdf = this.config.data.vPdfFile
        var pdfPanel = new Ext.Panel({
            layout: 'fit',
            items: [{
//                    html: '<embed type="application/pdf"  src='+pdf+'  height="480px"/>',
//                    centered: true
                    xtype: 'pdfpanel',
                    src: pdf, // URL to the PDF - Same Domain or Server with CORS Support
                    style: {
                        backgroundColor: '#333'
                    }
                }]
        });
        var finalPanel = new Ext.Panel({
            layout: 'fit',
//    		style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [pdfPanel]
        })
        this.add([finalPanel])



    }
})
