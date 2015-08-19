Ext.define('MyApp.view.voicerecording.VoiceRecording', {
    extend: 'Ext.Container',
    alias: 'widget.voicerecording',
    config: {
        layout: 'card'
    },
    initialize: function () {


        var myPanel = new Ext.Panel({
            layout: {
                type: 'auto',
                pack: 'center'
            },
            itemId: 'mypanelid',
//            style:' background-image: url("img/splash.png");',
            items: [{
                    html: '<div style="text-align:center"><img src="img/splash.png" width="100px" /></div>',
                    margin: 10
                }, {
                    xtype: 'panel',
                    margin: '0 0 10 0',
                    layout: {
                        type: 'hbox',
                        pack: 'center'
                    },
                    items: [{xtype: 'spacer'}, {
                            xtype: 'button',
                            padding: 10,
                            text: Loc.t('VOICERECORD.RECORD'),
                            scope: this,
                            handler: this.onRecord
                        }, {xtype: 'spacer'}, {
                            xtype: 'button',
                            padding: 10,
                            text: Loc.t('VOICERECORD.PLAY'),
                            scope: this,
                            handler: this.onPlay
                        }, {xtype: 'spacer'}, {
                            xtype: 'button',
                            padding: 10,
                            text: Loc.t('VOICERECORD.SEND'),
                            scope: this,
                            handler: this.onEmail
                        }, {xtype: 'spacer'}]
                },
                {
                    html: '<audio controls src="img/maid.mp3" type="audio/mpeg"> </audio>',
                    hidden: true,
                }]
        })
        var topToolbar = new Ext.Toolbar({
            title: Loc.t('VOICERECORD.TITLE'),
//            baseCls: 'younaviCls',
//            height: 50,
            docked: 'top'
        })

        this.add([topToolbar, myPanel])


    },
    onPlay: function () {
//        this.fireEvent('onPlay',this)
        playAudio();
    },
    onRecord: function () {
//        this.fireEvent('onRecord',this)
        recordAudio();
    },
    onEmail: function () {
        Email()
    }
})