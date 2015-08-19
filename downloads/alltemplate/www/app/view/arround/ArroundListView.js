Ext.define('MyApp.view.arround.ArroundListView', {
    extend: 'Ext.Container',
    alias: 'widget.arrounduslist',
    requires: ['MyApp.view.arround.ArroundUS'],
    config: {
        layout: 'card',
        title: Loc.t('CATELOG.CONFIRM')
    },
    initialize: function () {
        var arround_ListView = new Ext.create('Ext.List', {
            selectedCls: 'color:transperent',
            height: 300,
            emptyText: Loc.t('LOCATION.NOLOCATIONAVAILABLE'),
            hidden: false,
            itemId: 'arroundListId',
            style: 'background-color:transparent',
            store: 'arroundstoreid',
            itemTpl: new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n\
        		 <tr><td height="100px" width="40%" style="vertical-align: bottom;padding: 0px;"><img src="http://{rImage}" style="height:110px; width:100%; vertical-align: bottom;border-radius:10px 0px 0px 10px; overflow:hidden;" /></td>\n\
        		 <td height="100px" valign="top">\n\
        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{[this.getNameText()]}: {rName}</div>\n\
        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:0px 0px 0px 10px;">{[this.getAddressText()]}: {rAddress1}</div>\n\
        		<div style="font-weight:bold;font-size:14px; font-style:italic;padding:5px 0px 0px 10px;">{[this.getDistanceText()]}: {distance}</div>\n\
        		</td></tr></table>',
        		{
        			getNameText: function(){
        				return Loc.t('CATELOG.NAME')
        			},
        			getAddressText: function(){
        				return Loc.t('CATELOG.ADDRESS')
        			},
        			getDistanceText: function(){
        				return Loc.t('AROUND.DISTANCE')
        			}
        		}
        	)
        });

        var resPanel = new Ext.Panel({
            style: 'background-color:rgba(35,91,66,0.2);',
            items: [{
                    xtype: 'segmentedbutton',
                    height: 40,
                    margin: 10,
                    itemId: 'arroundsegmentedbtnid',
                    layout: {
                        type: 'hbox',
                        pack: 'center',
                        align: 'stretchmax'
                    },
                    items: [
                        {
                            text: Loc.t('AROUND.LIST'),
                            width: "50%",
                            pressed: true
                        },
                        {
                            text: Loc.t('AROUND.MAP'),
                            width: "50%",
                        }

                    ]
                }]
        })
                  var ArroundusSubStore = Ext.getStore('arroundsubstoreid');
                  console.log(ArroundusSubStore);
                 
                 
        var detailPanel = new Ext.Panel({
            layout: 'fit',
            height: 300,
            margin: '10 0 0 0',
            hidden: true,
            itemId: 'mapitemid',
            items: [{
                    xtype: 'arroundus'
                }, {
                    xtype: 'panel',
                    layout: 'hbox',
                    docked:'bottom',
                    height:40,
                    items: [{
                            xtype: 'button',
                            itemId:'btn1id',
                            text: Loc.t('AROUND.BTN1'),
                            ui:'plain',
//                            style:'color:black;background-color:'+btn1_bg_color,
                            flex:1
                        }, {
                            xtype: 'button',
                            itemId:'btn2id',
                            text: Loc.t('AROUND.BTN2'),
                            ui:'plain',
//                            style:'color:black;background-color:'+btn2_bg_color,
                            flex:1
                        },{
                            xtype: 'button',
                             itemId:'btn3id',
                            text:Loc.t('AROUND.BTN3'),
                            ui:'plain',
//                            style:'color:black;background-color:'+btn3_bg_color,
                            flex:1
                        }]
                }]
        });

        var finalPanel = new Ext.Panel({
            layout: 'vbox',
            scrollable: false,
            style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [resPanel, arround_ListView, detailPanel]
        })
        this.add([finalPanel])

    },
    onConfirm: function () {
        this.fireEvent('onConfirmBtn', this)
    }
});