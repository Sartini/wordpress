window.AppRouter = Backbone.Router.extend({
    routes: {
        "" : "renderHome",
        "?:querystring" : "renderHome",
        "*actions" : "renderPage",
        "*actions?:querystring" : "renderPage"
    },
    initialize: function () {
        window.app_view = new AppView();

        //when your application starts up
        Backbone.history.start({ pushState: Modernizr.history, silent: true, root: '/wpapp/' });
        if(!Modernizr.history) {
            var rootLength = Backbone.history.options.root.length;
            var fragment = window.location.pathname.substr(rootLength);
            Backbone.history.loadUrl(fragment, { trigger: true });
            app_view.pageIdToBody(fragment.replace('/', ''));
        } else {
            Backbone.history.loadUrl(Backbone.history.getFragment())
            //Linha abaixo pega o slug da pagina, o que vem depois da url --Backbone.history.fragment.replace('/', '')
            app_view.pageIdToBody(Backbone.history.fragment.replace('/', ''));
        }

        this.setActiveMenu();
    },
    setActiveMenu: function(){
        if(Backbone.history.fragment)
            var fragment = Backbone.history.fragment;

        app_view.activateMenu(fragment);
    },
    renderHome: function () {
        debugger;
        window.homeView = new HomeView();
    },
    renderPage: function(){
        debugger;
        window.pageView = new PageView();
    }
});

$(document).ready(function() {
    debugger;
    window.app_router = new AppRouter();
});