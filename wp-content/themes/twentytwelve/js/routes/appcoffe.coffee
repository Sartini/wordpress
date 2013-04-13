window.AppRouter = Backbone.Router.extend(
  routes:
    "": "renderHome"
    "?:querystring": "renderHome"
    "*actions": "renderPage"
    "*actions?:querystring": "renderPage"

  initialize: ->
    window.app_view = new AppView()
    
    #when your application starts up
    Backbone.history.start
      pushState: Modernizr.history
      silent: true
      root: "/jornadas/"

    unless Modernizr.history
      rootLength = Backbone.history.options.root.length
      fragment = window.location.pathname.substr(rootLength)
      Backbone.history.loadUrl fragment,
        trigger: true

      app_view.pageIdToBody fragment.replace("/", "")
    else
      Backbone.history.loadUrl Backbone.history.getFragment()
      app_view.pageIdToBody Backbone.history.fragment.replace("/", "")
    @setActiveMenu()

  setActiveMenu: ->
    fragment = Backbone.history.fragment  if Backbone.history.fragment
    app_view.activateMenu fragment

  renderHome: ->
    debugger
    window.homeView = new HomeView()

  renderPage: ->
    debugger
    window.pageView = new PageView()
)
$(document).ready ->
  debugger
  window.app_router = new AppRouter()
