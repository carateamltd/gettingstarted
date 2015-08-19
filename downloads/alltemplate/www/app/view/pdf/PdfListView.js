Ext.define('MyApp.view.pdf.PdfListView', {
    extend: 'Ext.List',
    xtype: 'pdflistview',
    requires: ['MyApp.view.pdf.PdfView'],
    config: {
    	scrollable:{
        	indicators:false
        },
        emptyText:Loc.t('PDF.NOPDFAVL'),
    	style: "background-image: url('img/splash.png');",
        store: 'pdfstoreid',
        itemTpl:'<div style="background: rgba(255, 255, 255, 0.73);border-radius:10px;margin:10px;padding:10px;">{vPdfTitle}</div>',
       
    }
});