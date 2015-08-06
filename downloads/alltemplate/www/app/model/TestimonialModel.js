Ext.define('MyApp.model.TestimonialModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name:'iTestonomialId', type:'int'},     
            {name:'iTestonomialName', type:'string'},     
            {name:'tDescription',type:'string'},
                   ]
    }
});
