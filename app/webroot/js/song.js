window.song = function () {

	var chordUpDown = function () {
		$('#minus').on('click', function (e) {
			e.preventDefault();
			$('pre a').each(function () {
				var newChord = transposeChord($(this).text(), -1);
				$(this).text($(this).text().replace($(this).text(),newChord));
			});
			allChords();
	    });
	    $('#plus').on('click', function (e) {
	    	e.preventDefault();
			$('pre a').each(function () {
				var newChord = transposeChord($(this).text(), 1);
				$(this).text($(this).text().replace($(this).text(),newChord));
			});
			allChords();
	    });
	}

	var transposeChord = function (chord, amount) {
		//var scale = ["Do", "Do#", "Re", "Re#", "Mi", "Fa", "Fa#", "Sol", "Sol#", "La", "La#", "Si"];
		var scale = ["C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B"];
		//return chord.replace(/[DoReMiFaSolLaSi]#?/gi,
		return chord.replace(/[CDEFGAB]#?/g,
			function(match) {
				var i = (scale.indexOf(match) + amount) % scale.length;
				return scale[ i < 0 ? i + scale.length : i ];
			}
		);
		//alert(transposeChord("Dm7/G", 2)); // gives "Em7/A"
		//alert(transposeChord("Fmaj9#11", -23)); // gives "F#maj9#11"
	}

	var favorite = function () {
		$('#favorite').on('click', function (e) {
			var id = $('#favorite').attr('href');
			console.log(id);
			e.preventDefault();
			var email = $("#UserEmail").val();
		      $.ajax({
		        type    : 'POST',
		        dataType: "json",
		        data  : { Song: { id: id } },
		        cache : false,
		        url   : "/users/addfavorite",
		        success: function(data) {
		          console.log(data.favorite);
		          if(data.favorite == true){
		          	$('#favorite').children('i').removeClass('icon-star-empty');
    				$('#favorite').children('i').addClass('icon-star');
		          }else{
		          	$('#favorite').children('i').removeClass('icon-star');
    				$('#favorite').children('i').addClass('icon-star-empty');
		          }
		        }
		      });
		    });


			/*if ($(this).children('i').hasClass('icon-star-empty')) {
    			$('#favorite').children('i').removeClass('icon-star-empty');
    			$('#favorite').children('i').addClass('icon-star');
		  	} else {
		    	$('#favorite').children('i').removeClass('icon-star');
    			$('#favorite').children('i').addClass('icon-star-empty');
		  	}*/

			//$(this).children('i').toggleClass('icon-star-empty');
	}

	var allChords = function () {
		var arr = new Array();
		var i = 0;
		$('pre a').each(function () {
			arr[i] = $(this).text();
			i++;
		});
		sortAndUnique(arr);
        arr = arr.join(" ");
        jtab.render($('#jtab'), arr);
	}

	var sortAndUnique = function ( my_array ) {
	    my_array.sort();
	    for ( var i = 1; i < my_array.length; i++ ) {
	        if ( my_array[i] === my_array[ i - 1 ] ) {
	                    my_array.splice( i--, 1 );
	        }
	    }
	    return my_array;
	};

	var printSong = function () {
		$('#print').on('click', function (e) {
			e.preventDefault();
			//$('#song').printPreview();
			styleSheets = []
			styleSheets.push("http://"+window.location.host+'/theme/Bootstrap/css/bootstrap.min.css')
			title = $(".hero-unit h1").html()
			print_div("song",styleSheets, title)
			return( false );
		});
	}

	var addComment = function () {
		$('#CommentAddCommentForm').bind(
			'submit', function(){
				$.ajax({
					async:true,
					type:'post',
					complete:function(request, json)
					{$('#comments').html(request.responseText); },
					data:$('#CommentAddCommentForm').serialize(),
					url:'/comments/addComment'
				})
			}
		);

	}
	/*var SongsModel = Backbone.Model.extend({
	    initialize: function(){
	       console.log('Esta funcion se llamará en la creación de cada instancia')
	    },
	    defaults : {
		    "name" : "",
		    "song" : ""
		},
		urlRoot : "/backbones/view/1",
		parse : function(response) {
			if (response.SongsModel != undefined) {
			  	return response.SongsModel;
			}
				return response;
		}
	});
	var Songs = Backbone.Collection.extend({
		model : SongsModel,
		url : "/backbones"
	});
	// Crear instancia
    var songs = new SongsModel;
    songs.fetch({
	success : function(songs, response) {
		// 取得に成功した場合の処理
		console.log('ok');
		console.log(response);
	},
	error : function(songs, response) {
		// エラーが発生した場合の処理
		console.log('error');
	}
    });*/

	chordUpDown();
	allChords();
	favorite();
	printSong();
	addComment();
};