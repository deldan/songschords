window.addsong = function () {
	var autocompleteArtist = function () {
		$('#query_artist').autocomplete({ 
		    serviceUrl:'/artists/searchArtist',
		    minChars:2, 
		    delimiter: /(,|;)\s*/, // regex or character
		    maxHeight:400,
		    width:300,
		    zIndex: 9999,
		    deferRequestBy: 0, //miliseconds
		    // params: { country:'Yes' }, //aditional parameters
		    noCache: false, //default is false, set to true to disable caching
		    // callback function:
		    //onSelect: function(value, data){ alert('You selected: ' + value + ', ' + data); },
		    // local autosugest options:
		    //lookup: ['January', 'February', 'March', 'April', 'May'] //local lookup values 
		});
	}
	var autocompleteSong = function () {
		$('#query_song').autocomplete({ 
		    serviceUrl:'/songs/searchSong',
		    minChars:2, 
		    delimiter: /(,|;)\s*/, // regex or character
		    maxHeight:400,
		    width:300,
		    zIndex: 9999,
		    deferRequestBy: 0, //miliseconds
		    // params: { country:'Yes' }, //aditional parameters
		    noCache: false, //default is false, set to true to disable caching
		    // callback function:
		    //onSelect: function(value, data){ alert('You selected: ' + value + ', ' + data); },
		    // local autosugest options:
		    //lookup: ['January', 'February', 'March', 'April', 'May'] //local lookup values 
		});
	}
	autocompleteArtist();
	autocompleteSong();
};