Ext.define('MyApp.services.RemoteService', {
    singleton: true,
    remoteCall: function(url, successCb, failureCb) {
        Ext.Ajax.request({
            url: url,
//            timeout: 100000,
//            method: 'GET',
//            headers: {
//                "cache-control": "no-cache",
//                "content": "text/html",
//                "charset": "UTF-8"
//            },
            success: function(response) {
//            	appUnmask();
                console.log("=========================+++++++++++++++++++++++++++");
            	console.log(response);
//            	console.log(JSON.stringify(response));
            	console.log("=========================+++++++++++++++++++++++++++++++");
                var responseData = Ext.decode(response.responseText);
            	console.log(responseData)
            	if(responseData.status != "Fail"){
                    appUnmask();
            	return successCb(responseData);
            	}else{
                    appUnmask();
                    console.log('fail come')
                    return failureCb(responseData);
            	}
          
            },
            failure: function(response) {
                appUnmask();
//                alert("fail")
                appCustomAlert(TextConstants.MESSAGE, TextConstants.NetWork_Problem);
//            	console.log(JSON.stringify(response))
            
          
                
            },
            reader: {
                type: 'json',
                root: 'data',
            }
        });
    }
     
});