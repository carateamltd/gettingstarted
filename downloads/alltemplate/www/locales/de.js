/**
 @classes singleton class which holds all translated static text in German
 Ext.ux.Localization determines language and than uses corresponding file from folder locales
 @example text: Loc.t('BUTTON.CANCEL')
 */
 
Ext.define('locales.de', {
    extend: 'Ext.Base',
    singleton: true,
    LOADMSG: 'Chargement...',
    BUTTON: {
        BACK: 'Retour',
        OK: 'OK',
        CANCEL: 'Annuler',
        YES: 'Ja',
        NO: 'Nein',
        SUBSCRIBE: "S'abonner"
    },
    MAIN: {
        WELCOME: 'Willkommen',
        WELCOMEMESSAGE: 'Willkommensnachricht',
        WELCOMESENCHA: 'Willkommen bei Sencha Touch 2',
        WELCOMETEXT1: "Sie haben gerade ein neues Sencha Touch 2 Projekt erstellt. Was Sie hier sehen ist der Inhalt von ",
        WELCOMETEXT2: " - bearbeiten Sie diese Datei und aktualisieren Sie die Seite um Änderungen hier zu sehen.",
        GETSTARTED: 'Einführung',
        GETTINGSTARTED: 'Einführung',
        THANKSSUBSCRIBE: 'Merci de vous inscrire'
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
        SORRY: 'Désolé',
        ONOFFTIME: 'On / Off Time',
        DAY: 'Jour',
        OPRNFROM: 'Ouvert Du',
        OPRNTO: 'Ouvert à',
        SUNDAY: 'Dimanche',
        MONDAY: 'Lundi',
        TUESDAY: 'Mardi',
        WEDNESDAY: 'Mercredi',
        THURSDAY: 'Jeudi',
        FRIDAY: 'Vendredi',
        SATURDAY: 'Samedi'
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
        TITLE: 'PDF',
        NOPDFAVL: 'Pas de pdf est disponible',
        PDFVIEWER:'PDF Viewer'
    },
    RSSFEEDS:{
        TITLE: 'RSS Feeds',
        RSSFEEDNOTVALID: 'RSS feed ne est pas valable !!',
        RSSFEEDNOTAVL: 'Aucun flux RSS est disponible'
    },
    WEBSITES:{
        TITLE: 'Site Web',
        NOWEBLISTAVL: 'Aucune liste de site Web est disponible'
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
        TITLE: 'Around Us',
        DISTANCE: 'Distance',
        LIST: 'Liste',
        MAP: 'Carte',
        BTN1: '',
        BTN2: '',
        BTN3: ''
    },
    VOICERECORD:{
    	RECORD:'Record',
    	PLAY:'Jouer',
    	SEND:'Envoyer',
        TITLE: 'Mémos vocaux'
    },
    SOCIALMEDIA:{
        TITLE: 'MÉDIAS SOCIAUX',
        SOCIALPAGES: 'Pages sociaux'
    },
    QRCODE:{
        TITLE: 'Qr Code',
        NODATAAVAILABLE: 'Pas De Données Disponibles',
        STARTDATE: 'Date De Début',
        ENDDATE: 'Date De Fin',
        QRVIEW: 'Qr Voir'
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
        NONEWSISAVAILABLE: 'Pas de '
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
        CANCEL: 'Annuler',
        VARIENT: 'Varient',
        PAYMENTMETHOD: 'Mode de paiement'
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
        NOLOYALTYSECRETAVAILABE: 'Veuillez entrer le bon code.',
        NOMORECOUPONAVAILABLE: 'Code Scret Incorrecte',
        ENTERSECRETCODE: 'Entrez le code secret',
        STAMPCARD: 'Tamponner la Carte',
        PLEASEHANDYOURDEVICE: 'Veuillez donner votre téléphone au caissier(e) pour tamponner votre carte de fidélité.',
        SECRETCODE: 'code secret',
        SUBMITCODE: 'Tamponner',
        NOOFUSE: 'Nombre de tampon',
        SHARE: 'Partager',
        TOTAL:'Total tampon',
        SORRY: 'Pardon'
    },
    CUSTOM:{
        TITLE: 'Les Informations',
        NODATAAVAILABLE:'Aucune information disponible.'
    },
    MESSAGE:{
        TITLE: 'Message',
        NOMESSAGEAVAILABLE: 'Pas de messages disponibles',
        SUREDELETEMSG: 'Etes-vous sûr que vous voulez supprimer les messages'
    },
    DOWNLOAD:{
        TITLE: 'TÉLÉCHARGER',
        NODOWNLOADAVAILABLE: 'Aucun téléchargement est disponible'
    },
    PARTNERS:{
        TITLE: 'LES PARTENAIRES',
        NOPARTNERAVL: 'Aucun Partners est disponible'
    },
    MORTGAGECALCULATOR:{
        TITLE: 'Calculatrice hypothécaire',
        HOMEPRICE: 'Accueil Prix',
        DOWNPAYMENT: 'Acompte',
        LOANAMOUNT: 'Montant du prêt',
        INTERESTRATE: "Taux d'intérêt",
        LOANTERM: 'Prêt à terme',
        EMI: 'Montant mensuel (EMI)',
        CALCULATE: 'Calculer'
    },
    SCIENTIFICCALCULATOR:{
        TITLE: 'Calculatrice Scientifique'
    },
    NOTEPAD:{
        TITLE: 'BLOC-NOTES',
        SAVE: 'Sauvegarder',
        LIST: 'Remarque Liste'
    },
    SCANNER:{
        TITLE: 'Scanner',
        TEXT: 'Scan'
    },
    APPOINTMENT:{
        TITLE: 'Rendez Vou',
        SUCCESSFULLYADDED:'Nomination ajouté avec succès',
        CHECKINTERNETCONNECTION: 'Veuillez verifier votre Connexion internet svp.',
        NOTCONFIRMMSG: 'Votre rendez-vous est toujours pas confirmer',
        CONFIRMMSG: 'Votre rendez-vous est maintenant confirmer'
    },
    QUOTATION:{
        TITLE: 'Citation',
        SUCCESSFULLYADDED: 'Devis ajouté avec succès'
    },
    REVIEW:{
        TITLE: 'Examen',
        ADDSUCCESS: 'Revue ajoutée viennent succès'
    },
    TESTIMONIAL:{
        TITLE: 'TÉMOIGNAGE',
        NOTESTIMONIALAVL: "Pas d'appréciation est disponible",
        ADDSUCCESS: 'Témoignage ajoutée viennent succès'
    },
    COUPOUN:{
        TITLE: 'Coupoun',
        CODE: 'Promo Code',
        IMGTITLE: "Titre de l'image vient ici",
        ISSUEDATE: "DATE D'ÉMISSION",
        VALIDTILL: "VALABLE JUSQU'AU"
    },
    SURVEY:{
        TITLE: 'Enquête'
    },
    CATELOG:{
        TITLE: 'Catalogue',
        NODATAAVAILABLE: 'Aucun article disponible.',
        DETAILS: 'Description',
        CART: 'Panier',
        ADDTOCART: 'Ajouter au panier',
        CARTDETAILS: 'Panier Détails',
        NOCARTPRODUCTAVAILABLE: 'Aucune panier produit est disponible',
        CUSTOMER: 'Contact Client',
        NAME:'Nom et Prénom',
        EMAIL: 'email',
        ADDRESS: 'Adresse',
        CITY: 'Ville',
        STATE: 'Département',
        PIN: 'Code postal',
        CHECKOUT: 'Suivant',
        ALERT: 'Message',
        NAMEERROR: 'Veuillez entrer votre nom',
    	EMAILERROR: 'Veuillez entrer votre email',
    	AREAERROR: "S'il vous plaît entrez le nom de domaine",
    	ADDRESSERROR: 'Adresse ne peut être vide',
    	CITYERROR: 'Ville ne peut pas être vide',
    	STATEERROR: 'État ne peut pas être vide',
    	PINERROR: 'Pin ne peut pas être vide',
    	CUSTOMERSAVE: 'Détails Saved',
    	SIZESELECT: 'Sélectionnez une taille svp.',
    	CARTITEMADD: 'Panier mis à jour',
		CARTITEMDELETE: 'Article supprimer',
    	CARTITEMUPDATE: 'Panier mis à jour',
    	CARTTOTAL: 'Montant Total',
    	ORDERDETAILS: 'Détail de la commande',
    	HOMEDELIVERY: 'Livraison à Domicile',
    	TAKEAWAY: 'A Emporter',
    	HOMEDELIVERYDETAILS: 'Livraison',
    	DATE: 'Date',
    	TIME: 'Heure',
    	ADDRESS: 'Adresse de Livraison',
    	STREETNO: 'Rue',
    	TOWNCITY: 'Ville/Localité',
    	ZIPCODE: 'Code Postal',
    	TEL: 'No. de Tel.',
    	APARTMENTNO: 'No. Appartement',
    	REMARKS: 'Remarques',
    	TAKEOUTDETAILS: 'A Emporter',
    	CONFIRM: 'Confirmer Commande',
    	ARTICLES: 'Articles',
    	SIZE: 'Taille',
    	OPTION: 'Option',
    	PRICE: 'Prix',
    	QTY: 'Qté',
    	SELECTOPTION: 'Veuillez sélectionner mode de livraison svp.',
    	EMPTYTEL: 'Veuillez entrer votre numéro de téléphone.',
    	CLIENTDETAILS: 'Détail Client',
    	SELECT: 'Sélectionner',
    	AREANAME: "Nom de la zone",
    	COMMENT: 'Commentaire',
    	ERROR: 'erreur',
    	TYPE: 'Type',
    	SURE: 'Êtes-vous sûr?'
    },
    NEWARRIVAL:{
        TITLE: 'Nouvel Arrivage',
        NONEWARRIVAL: 'Aucune arrivée de nouveaux est disponible',
        DETAILS: 'Description',
        NEWARRIVALDETAILS: "Nouveaux détails de l'arrivée"
    },
    DONATION:{
        TITLE: 'Le Don',
        THANKYOUDONATION: 'Merci pour le don',
        CHECKINTERNETCONNECTION: 'Veuillez verifier votre Connexion internet svp.',
        ORG: 'Organisation',
        CURRENCYCODE: 'Code de devise',
        AMOUNT: 'Amount'
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
        TITLE: 'Informations sur les billets',
        NOTICKETLISTAVL: 'Aucune liste de tickets est disponible'
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
        TITLE: 'BLOG',
        SHARE: 'Partager',
        EMPTYTEXT: 'Pas de blog est disponible'
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
    },
    FANWALL: {
    	TITLE: 'Fanwall',
    	NOOBJAVAILABLE: 'Aucun objet est disponible'
    },
    MAILING: {
    	MAILINGVIEW: 'Voir postale',
    	TITLE: 'Liste de diffusion'
    },
    PAYPAL: {
    	TITLE:'Paypal Voir',
    	BUTTON: 'Pay Pal'
    },
    CART: {
    	REMOVE: 'Retirer du panier',
    	ADD: 'Ajouter au panier'
    },
    PURCHASE: {
    	SUCCESS: 'acheté avec succès'
    }
});
