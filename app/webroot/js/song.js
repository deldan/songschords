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
		//return chord.replace(/[DoReMiFaSolLaSi]#?/g,
		return chord.replace(/[CDEFGAB]#?/g,
		function(match) {
			var i = (scale.indexOf(match) + amount) % scale.length;
			return scale[ i < 0 ? i + scale.length : i ];
		});
	}
	var allChords = function (){
		var arr = new Array();
		var i = 0;
		$('pre a').each(function () {
			arr[i] = $(this).text();
			i++;
		});
		arr = $.unique(arr);
        arr = arr.join(" ");
        console.log(arr);
        jtab.render($('#jtab'), arr);
        $("#jtab").html(arr.sort().join(","));
	}

	chordUpDown();
	allChords();
};