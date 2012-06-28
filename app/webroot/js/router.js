window.SongsRouter = Backbone.Router.extend({

  initialize: function () {
    this.all();
  },

  routes: {
    "": "home",
    "song": "song",
    "song/:query": "song",
  },

  all: function () {

  },

  home: function () {

  },

  song: function () {
  }

});

window.navigateTo = function (route) {
  Router.navigate(route, { trigger: true, replace: true });
};

$(function () {
  window.Router = new SongsRouter();
  Backbone.history.start({ silent: true });
  Backbone.history.loadUrl(window.location.pathname.replace(/^\//, ''));
});
