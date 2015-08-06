Ext.define('MyApp.model.QuotationModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [{
                name: 'quotetname',
                type: 'string'
            }, {
                name: 'quoteemail',
                type: 'string'
            }, {
                name: 'quotephonenumber',
                type: 'string'
            }, {
                name: 'quotecomment',
                type: 'string'
            }],
        validations: [{
                field: 'quotetname',
                type: 'presence',
                message: 'Name is required.'
            }, {
                field: 'quoteemail',
                type: 'email',
                message: 'Email is required.'
            }, {
                field: 'quotephonenumber',
                type: 'presence',
                message: 'Phone is required.'
            }, {
                field: 'quotecomment',
                type: 'presence',
                message: 'Comment is required.'
            }] 
    } 
});         