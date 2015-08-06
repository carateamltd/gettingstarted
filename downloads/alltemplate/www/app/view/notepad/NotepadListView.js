Ext.define('MyApp.view.notepad.NotepadListView', {
    extend: 'Ext.List',
    xtype: 'notepadlistciew',
    requires: ['MyApp.view.notepad.EditNoteView'],
    config: {
        scrollable: {
            indicators: false
        },
        emptyText: 'No Note is Available',
        style: "background-image: url('img/splash.png');font-family:RalewayRegular;font-style:italic;",
        store: 'notestroid',
        itemTpl: new Ext.XTemplate('<div style="background:rgba(255, 255, 255, 0.73);\n\
                                    border-radius:10px;margin:10px;padding-left: 10px;padding-bottom: 28px;"><div>{[this.getText(values)]}</div>\n\
                                    <div style="float: left;margin: 5px;">Words: {[this.countWord(values)]}</div>\n\
                                    <div style="float: right;margin: 5px;">{date:date("j F Y")}</div>\n\
                                </div>', {
            countWord: function (values) {
                console.log('enter')
                var str=values.text;
                var count = 0, i, foo = str.length;
                console.log(str.charAt(i))
                for (i = 0; i <= foo; i++) {
                    if (str.charAt(i) == " ") {
                        count++;
                    }
                    
                }
                console.log('total words= '+count)
                return count + 1;
            },
            getText:function(values){
                 var str = values.text.replace(/\n/g, '<br />');
                  return str
            }
        }),
    }
});
