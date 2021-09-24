</main>

<script src="https://unpkg.com/@shopify/app-bridge@2"></script>

<script src= 'https://6ca8-190-104-119-240.ngrok.io/elana/scripts/bridge.js'></script>
<script src="https://unpkg.com/@shopify/app-bridge-utils"></script>
<script>
var AppBridge = window['app-bridge'];
var actions = window['app-bridge'].actions;


var TitleBar = actions.TitleBar;
var Button = actions.Button;
var Redirect = actions.Redirect;
var createApp = AppBridge.default;
var Modal = actions.Modal;


var $_NGROK_URL =  'http://6ca8-190-104-119-240.ngrok.io/';

var  apiKey = 'e6ab6265e31ce653ea02ad34560b0858';
var redirectUri = $_NGROK_URL;
var host= 'http://6ca8-190-104-119-240.ngrok.io';
var permissionUrl = 'https://'+
                    
host+
                    
'/admin'+
                    
'/oauth/authorize?client_id='+
                    
apiKey+
                    
'&scope=read_products,read_content&redirect_uri='+
                    
redirectUri;
// If the current window is the 'parent', change the URL by setting location.href
if (window.top == window.self) {
  
window.location.assign(permissionUrl);
  
// If the current window is the 'child', change the parent's URL with Shopify App Bridge's Redirect action
} else {
  
var app2 = createApp({
    
apiKey: apiKey,
    
host: host
  
});
  
Redirect.create(app2).dispatch(Redirect.Action.REMOTE, permissionUrl);
}









var app= createApp(
    { 
        apiKey:'e6ab6265e31ce653ea02ad34560b0858',
        shopOrigin: '<?php echo $shopify->get_url(); ?>'
    });
        
var titleBarOptions = {
  title: 'efregf'
};
var myTitleBar = TitleBar.create(app, titleBarOptions);
const modalOpt ={
    title: 'modak',
    message: 'efe'
};
const examplemodal = Modal.create(app, modalOpt);
const redirect = Redirect.create(app);
var installbn = Button.create(app, {label: 'Install Script'});
installbn.subscribe(Button.Action.CLICK, data => {
examplemodal.dispatch(Modal.Action.OPEN);
});

</script>
</body>
</html>