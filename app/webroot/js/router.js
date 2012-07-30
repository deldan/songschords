window.SongsRouter = Backbone.Router.extend({

  initialize: function () {
    this.all();
  },

  routes: {
    "": "home",
    "registro": "register",
    "song": "song",
    "song/:query": "song",
    "cancion/view/": "song",
    "cancion": "song",
    "cancion/:query": "song",
    "cancion/view/:query": "song",
    "songs/addSong": "addsong",
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
  },

  addsong: function () {
    addsong();
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
