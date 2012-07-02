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
			e.preventDefault();
			if ($(this).children('i').hasClass('icon-star-empty')) {
    			$('#favorite').children('i').removeClass('icon-star-empty');
    			$('#favorite').children('i').addClass('icon-star');
		  	} else {
		    	$('#favorite').children('i').removeClass('icon-star');
    			$('#favorite').children('i').addClass('icon-star-empty');
		  	}

			//$(this).children('i').toggleClass('icon-star-empty');
		});
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

	chordUpDown();
	allChords();
	favorite();
};