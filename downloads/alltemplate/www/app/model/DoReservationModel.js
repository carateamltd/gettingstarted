Ext.define('MyApp.model.DoReservationModel', {
    extend: 'Ext.data.Model',
    config: {
       fields: [
           {name:'fullname'},
           {name: 'email'},
           {name: 'mobile'},
           {name: 'date'},
           {name: 'time'},
           {name: 'noOfPersons'}
        ],
        validations: [{
			 type: 'presence',
			 name: 'fullname',
			 message: Loc.t('RESERVATION.VALIDATIONS.NAME')
		 }, {
			 type: 'format',
			 name: 'email',
			 matcher: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
			 message: Loc.t('RESERVATION.VALIDATIONS.EMAIL')
		 }, {
			 type: 'presence',
			 name: 'mobile',
			 message: Loc.t('RESERVATION.VALIDATIONS.MOBILE')
		 }, {
			 type: 'presence',
			 name: 'date',
			 message: Loc.t('RESERVATION.VALIDATIONS.DATE')
		 }, {
			 type: 'presence',
			 name: 'time',
			 message: Loc.t('RESERVATION.VALIDATIONS.TIME')
		 }, {
			 type: 'presence',
			 name: 'noOfPersons',
			 message: Loc.t('RESERVATION.VALIDATIONS.PERSONS')
		 }]
    }
});
  