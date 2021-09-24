<script src="https://unpkg.com/@shopify/app-bridge@2"></script>
<script>
var AppBridge = window['app-bridge'];
var actions = window['app-bridge'].actions;
var TitleBar = actions.TitleBar;
var Button = actions.Button;
var Redirect = actions.Redirect;
var createApp = AppBridge.default;
var Modal = actions.Modal;
var app= createApp(
    { 
 
        apiKey:'e6ab6265e31ce653ea02ad34560b08588845',
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
