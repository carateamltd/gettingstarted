Ext.define('MyApp.model.AppointmentModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [{
                name: 'appointmentdate',
                type: 'string'
            }, {
                name: 'appointmentTime',
                type: 'string'
            }, {
                name: 'appointmentname',
                type: 'string'
            }, {
                name: 'email',
                type: 'string'
            }, {
                name: 'phonename',
                type: 'string'
            }, {
                name: 'remark',
                type: 'string'
            }],
        validations: [{
                field: 'appointmentdate',
                type: 'presence',
                message: 'Date is required.'
            }, {
                field: 'appointmentTime',
                type: 'presence',
                message: 'Time is required.'
            }, {
                field: 'appointmentname',
                type: 'presence',
                message: 'name is required.'
            }, {
                field: 'email',
                type: 'email',
                message: 'email is required.'
            }, {
                field: 'phonename',
                type: 'presence',
                message: 'phone number is required.'
            }, {
                field: 'remark',
                type: 'presence',
                message: 'Remark is required.'
            }] 
    } 
});         