Ext.define("MyApp.view.pdf.PdfNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.pdf.PdfListView"
    ],
    alias: "widget.pdfnavi",
    config: {
        navigationBar: {
            hidden: false,
//            baseCls: 'younaviCls',
//            height: 50,
//            items:[{
//                      xtype:'button',
//                      ui:'plain',
//                      text:'<img src="img/backbtn.png" />'
//            }]
        },
        items: [{
                xtype: 'pdflistview',
                title: Loc.t('PDF.TITLE'),
                scrollable: {
                    indicators: false
                }
            }]
    }
});
