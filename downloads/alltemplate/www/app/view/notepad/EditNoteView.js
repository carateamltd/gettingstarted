Ext.define('MyApp.view.notepad.EditNoteView', {
    extend: 'Ext.Container',
    alias: 'widget.editnoteview',
    config: {
        fullscreen: true,
        layout: 'card'
    },
    initialize: function () {

        var firstPanel = new Ext.Panel({
            layout:{
                 type:'vbox',
                 pack:'center'
            },
            
            items: [{
                    xtype: 'fieldset',
                    items: [{
                            xtype: 'textareafield',
                            itemId:'noteTextAreaID',
                            maxRows: 20,
                            clearIcon:false
                        }]


                }]
        });
        this.add([firstPanel])





    }
})