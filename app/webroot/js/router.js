window.SongsRouter = Backbone.Router.extend({

  initialize: function () {
    this.all();
  },

  routes: {
    "": "home",
    "registro": "register",
    "song": "song",
    "song/:query": "song",
    "cancion": "song",
    "cancion/:query": "song",
  },

  all: function () {

  },

  home: function () {
    song();
  },

  song: function () {
    song();
  },

  register: function () {
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
