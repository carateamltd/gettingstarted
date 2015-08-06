/**
 @classes singleton class which holds all translated static text in German
 Ext.ux.Localization determines language and than uses corresponding file from folder locales
 @example text: Loc.t('BUTTON.CANCEL')
 */
Ext.define('locales.de', {
    extend: 'Ext.Base',
    singleton: true,
    BUTTON: {
        BACK: 'Zurück',
        OK: 'OK',
        CANCEL: 'Abbrechen',
        YES: 'Ja',
        NO: 'Nein'
    },
    MAIN: {
        WELCOME: 'Willkommen',
        WELCOMEMESSAGE: 'Willkommensnachricht',
        WELCOMESENCHA: 'Willkommen bei Sencha Touch 2',
        WELCOMETEXT1: "Sie haben gerade ein neues Sencha Touch 2 Projekt erstellt. Was Sie hier sehen ist der Inhalt von ",
        WELCOMETEXT2: " - bearbeiten Sie diese Datei und aktualisieren Sie die Seite um Änderungen hier zu sehen.",
        GETSTARTED: 'Einführung',
        GETTINGSTARTED: 'Einführung'
    },
    HOME:{
        TITLE: 'Accueil',
        DESCRIPTION: 'Description',
        NODESCMESSAGE: 'Aucune description disponible',
        DETAILS: 'Détails',
        WEBSITE: 'Site Internet',
        EMAIL: 'Email',
        TELEPHONE: 'Téléphone',
        ADDRESS: 'Adresse',
        CITY: 'Ville',
        STATE: 'Région',
        ZIP: 'ZIP',
        SORRY: 'Désolé'
    },
    EVENT:{
        TITLE: 'Événement',
        STARTDATE: 'Début',
        ENDDATE: 'Fin',
        DESC: 'Description',
        NOEVENTAVAILABLE: 'Aucun événement'
    },
    MAILINGLIST:{
        TITLE: 'LISTE DE DIFFUSION'
    },
    PDF:{
        TITLE: 'PDF'
    },
    RSSFEEDS:{
        TITLE: 'Rss Feeds',
        RSSFEEDNOTVALID: 'Rss feed ne est pas valable !!'
    },
    WEBSITES:{
        TITLE: 'Site Web'
    },
    YOUTUBE:{
        TITLE: 'Youtube',
        NOVIDEOAVAILABLE: "Aucune vidéo n'est disponible.",
        VIDEO: 'Vidéo'
    },
    LOCATION:{
        TITLE: 'Emplacement',
        NAME: 'Nom',
        ADDRESS: 'Adresse',
        SEND: 'Envoyer',
        WEB: 'Toile',
        CALL: 'Appel',
        NOLOCATIONAVAILABLE: 'Désolé pas de données disponibles',
        MAPVIEW: 'Voir la carte'
    },
    GALLERY:{
        TITLE: 'Galerie',
        NOIMAGESAVAILABLE: 'La galerie est vide.'
    },
    AROUND:{
        TITLE: 'Around Us'
    },
    VOICERECORD:{
        TITLE: 'Mémos vocaux'
    },
    SOCIALMEDIA:{
        TITLE: 'MÉDIAS SOCIAUX'
    },
    QRCODE:{
        TITLE: 'Qr Code',
        NODATAAVAILABLE: 'Pas De Données Disponibles',
        STARTDATE: 'Date De Début',
        ENDDATE: 'Date De Fin'
    },
    CONTACTUS:{
        TITLE: 'Contactez Nous',
        NAME: 'Nom',
        EMAIL: 'E-mail',
        MESSAGE: 'Message',
        SUBMIT: 'Envoyer',
        TELEPHONE: 'Téléphone',
        MESSAGETHANKYOU: 'Merci pour votre message.'
    },
    MENU:{
        TITLE: 'Menu',
        MENUDETAILS: 'Menu Détails',
        NAME: 'Nom',
        PRICE: 'Prix',
        SIZE: 'Portion',
        OPTION: 'Option',
        NOMENUAVAILABLE: 'Aucun menu publié'
    },
    NEWS:{
        TITLE: 'Info',
        NONEWSISAVAILABLE: 'Non Nouvelles est disponible'
    },
    ORDER:{
        TITLE: 'Commande',
        SUBMITORDER: 'commande',
        SUBMITORDERDETAIL : 'Commander',
        ORDERDETAIL: 'Détails Article',
        ITEMDETAILS: "Détails d'article",
        SHOWORDER: 'Panier',
        NAME: 'Nom',
        QUANTITY: 'Quantité',
        PRICE: 'Prix',
        DELETE: 'Suprimmer',
        NORECORDFOUND: 'Aucun article disponible dans cette catégorie.',
        YOURORDERSUCCESS: 'Votre commande ajouté avec succès',
        CHECKCONNVECTION: 'Se il vous plaît Vérifiez votre connexion Internet',
        ORDERHISTORYFOUND: "Pas d'historique des commandes trouvé",
        ALLFIELDMANDATORY:'Tous les champs sont obligatoires',
        SPECIFICINSTRUCTION: 'Remarque',
        ORDERHISTORY: 'Historique Des Commandes',
        ADDITEMTOORDER: 'Commander',
        CHOOSESIZE: 'Portion',
        DETAILS: 'Description',
        TOTALAMT: 'Prix',
        CHOOSEOPTION: 'Choisissez une option',
        DONE:'Ok',
        CANCEL: 'Annuler'
    },
    RESERVATION:{
        TITLE: 'Réservation',
        NORESERVATIONAVAILABLE: 'Aucune Réservation.',
        SCHEDULETITLE: 'Horaire Réservation',
        CUSTOMERDETAILS: 'Détails du client',
        TIME: 'Temps',
        PRICE: 'Prix',
        PREPAYMENT: 'Prépaiement',
        CONFIRM: 'Confirmer',
        SERVICETITLE: 'Service',
        DURATION: 'Durée',
        BOOKIT: 'Réservez It !!!',
        BOOKINGDATE: 'Date',
        SELECTTIME:'Heure',
        BOOK: 'Suivant',
        FIRSTNAME: 'Prénom',
        LASTNAME: 'Nom De Famille',
        EMAIL: 'E-mail',
        MOBILENO: 'Mobile',
        CONFIRMBOOKING : 'Confirmer la réservation',
        SCHEDULERESERVATION: 'Horaire Réservation',
        PAST: 'Précédent',
        UPCOMING: 'Suivant',
        NODATAAVAILABLE: 'Pas De Données Disponibles'
    },
    LOYALTY:{
        TITLE: 'Fidélité',
        NOLOYALTYAVAILABE: 'Aucun programme de fidélité disponible.',
        NOLOYALTYSECRETAVAILABE: 'Se il vous plaît entrer le code secret correct',
        NOMORECOUPONAVAILABLE: 'Code Scret Incorrecte',
        ENTERSECRETCODE: 'Entrez le code secret',
        STAMPCARD: 'Tamponner la Carte',
        PLEASEHANDYOURDEVICE: 'Veuillez donner votre téléphone au caissier(e) pour tamponner votre carte de fidélité.',
        SECRETCODE: 'code secret',
        SUBMITCODE: 'Tamponner',
        NOOFUSE: 'Nombre de tampon',
        SHARE: 'Partager',
        TOTAL:'Total tampon'
    },
    CUSTOM:{
        TITLE: 'Les Informations',
        NODATAAVAILABLE:'Aucune information disponible.'
    },
    MESSAGE:{
        TITLE: 'Message',
        NOMESSAGEAVAILABLE: 'Pas de messages disponibles'
    },
    DOWNLOAD:{
        TITLE: 'TÉLÉCHARGER'
    },
    PARTNERS:{
        TITLE: 'LES PARTENAIRES'
    },
    MORTGAGECALCULATOR:{
        TITLE: 'Calculatrice hypothécaire'
    },
    SCIENTIFICCALCULATOR:{
        TITLE: 'CalculatriceScientifique'
    },
    NOTEPAD:{
        TITLE: 'BLOC-NOTES'
    },
    SCANNER:{
        TITLE: 'Scanner'
    },
    APPOINTMENT:{
        TITLE: 'Rendez Vou',
        SUCCESSFULLYADDED:'Nomination ajouté avec succès',
        CHECKINTERNETCONNECTION: 'Veuillez verifier votre Connexion internet svp.'
    },
    QUOTATION:{
        TITLE: 'Citation',
        SUCCESSFULLYADDED: 'Devis ajouté avec succès'
    },
    REVIEW:{
        TITLE: 'Examen'
    },
    TESTIMONIAL:{
        TITLE: 'TÉMOIGNAGE'
    },
    COUPOUN:{
        TITLE: 'Coupoun'
    },
    CATELOG:{
        TITLE: 'Catalogue',
        NODATAAVAILABLE: 'Aucun article disponible.',
        DETAILS: 'Description',
        CART: 'Panier',
        CUSTOMER: 'Contact Client',
        NAME:'Nom et Prénom',
        EMAIL: 'email',
        ADDRESS: 'Adresse',
        CITY: 'Ville',
        STATE: 'Département',
        PIN: 'Code postal',
        CHECKOUT: 'Suivant',
        ALERT: 'Message',
        NAMEERROR: 'Nom ne peut pas être vide',
    	EMAILERROR: 'Email ne peut être vide',
    	ADDRESSERROR: 'Adresse ne peut être vide',
    	CITYERROR: 'Ville ne peut pas être vide',
    	STATEERROR: 'État ne peut pas être vide',
    	PINERROR: 'Pin ne peut pas être vide',
    	CUSTOMERSAVE: 'Détails Saved',
    	SIZESELECT: 'Please select a size',
    	CARTITEMADD: 'Panier mis à jour',
    	CARTITEMDELETE: 'Item deleted from cart',
    	CARTITEMUPDATE: 'Panier mis à jour',
    	CARTTOTAL: 'Montant Total',
    	ORDERDETAILS: 'Détail de la commande',
    	HOMEDELIVERY: 'Livraison à Domicile',
    	TAKEAWAY: 'A Emporter',
    	HOMEDELIVERYDETAILS: 'Détails- Livraison à Domicile',
    	DATE: 'Date',
    	TIME: 'Heure',
    	ADDRESS: 'Adresse',
    	STREETNO: 'Rue',
    	TOWNCITY: 'Ville/Localité',
    	ZIPCODE: 'Code Postal',
    	TEL: 'No. de Tel.',
    	APARTMENTNO: 'No. Appartement',
    	REMARKS: 'Remarques',
    	TAKEOUTDETAILS: 'Détail- A Emporter',
    	CONFIRM: 'Confirmer Commande'
    },
    NEWARRIVAL:{
        TITLE: 'Nouvel Arrivage',
        NONEWARRIVAL: 'Aucune arrivée de nouveaux est disponible'
    },
    DONATION:{
        TITLE: 'Le Don',
        THANKYOUDONATION: 'Merci pour le don',
        CHECKINTERNETCONNECTION: 'Veuillez verifier votre Connexion internet svp.'
    },
    SERVICE:{
        TITLE: 'Service',
        SERVICEDETAILS: 'Détails de services',
        DETAILS: 'Description',
        DAY: 'Jour',
        PRICE: 'Prix',
        SERVICEFROM: 'Début',
        SERVICETO: 'Fin',
        NOSERVICEAVAILABLE: 'Aucun service disponible.'
    },
    TICKETINFO:{
        TITLE: 'Informations sur les billets'
    },
    ECOMMERCE:{
        TITLE: 'E Commerce',
        SEARCH: 'Recherche',
        NODATAAVAILABLE: 'Aucun article disponible',
        CARTTITLE: 'Détail panier',
        SIZES: 'Portion',
        DETAILS: 'Description'
    },
    BLOG:{
        TITLE: 'BLOG'
    },
    MENUOFTHEDAY:{
        TITLE: 'Menu du jour',
        NOMENUAVAILABLE: 'Aucun Menu du jour disponible.',
        PRICE: 'Prix',
        SIZES: 'Portion',
        OPTIONS: 'Options'
    },
    LOCALIZATION: {
        CHANGELANGUAGE: 'Sprache Wechseln',
        CHANGELANGUAGEQUESTION: 'Sie müssen die Applikation neu starten, damit die neue Sprache angezeigt werden kann.'
    }
});
