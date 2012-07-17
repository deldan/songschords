<?php
App::uses('Component', 'Controller');
class ChordsComponent extends Component {

	private $type = 'sharps';
    private $notes = array(
            'scale' => array(
              'C'  => 1,
              'C#' => 2,
              'Db' => 2,
              'D'  => 3,
              'D#' => 4,
              'Eb' => 4,
              'E'  => 5,
              'Fb' => 5,
              'F'  => 6,
              'F#' => 7,
              'Gb' => 7,
              'G'  => 8,
              'G#' => 9,
              'Ab' => 9,
              'A'  => 10,
              'A#' => 11,
              'Bb' => 11,
              'B'  => 12,
              'Cb' => 12
            ),
		      'flats'  => array(1 => 'C', 'Db', 'D', 'Eb', 'E', 'F', 'Gb', 'G', 'Ab', 'A', 'Bb', 'B'),
		      'sharps' => array(1 => 'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B')
   );

	private $search = '`([ABCDEFG][b#]?(?=\s(?![a-zH-Z])|(?=(2|5|6|7|9|11|13|6\/9|7\-5|7\-9|7\#5|7\#9|7‌​\+5|7\+9|7b5|7b9|7sus2|7sus4|add2|add4|add9|aug|dim|dim7|m\|maj7|m6|m7|m7b5|m9|m1‌​1|m13|maj7|maj9|maj11|maj13|mb5|m|sus|sus2|sus4|\))(?=(\s|\/)))|(?=(\/|\.|-|\(|\)))))`';
	private $search2 = '`([ABCDEFG][b#]?[m]?[\(]?(2|5|6|7|9|11|13|6\/9|7\-5|7\-9|7\#5|7\#9|7\+5|7\+9|7b5|7b9|7sus2|7sus4|add2|add4|add9|aug|dim|dim7|m\|maj7|m6|m7|m7b5|m9|m11|m13|maj7|maj9|maj11|maj13|mb5|m|sus|sus2|sus4)?(\))?)(?=\s|\.|\)|-|\/)`';
	private $formattedChords = array();
	private $replacementChords = array();
	private $song;

	public function searchChords($song = null) {

		$this->song = $song;
	    preg_match_all($this->search, $this->song, $song_chords);

	    $u = array_unique($song_chords[0]);
	    foreach ($u as $chord){
	            if (strlen($chord) > 1  && ($chord{1} == "b" || $chord{1} == "#"))
	                    array_push($this->formattedChords,substr($chord,0, 2));
	            else
	                    array_push($this->formattedChords,substr($chord,0, 1));
	    }

	    foreach($this->formattedChords as &$note){
	            $note = "/\|".$note."\|/";
	    }
	    $this->song = preg_replace($this->formattedChords, $this->replacementChords, $this->song);
	    $html= preg_replace($this->search2,'<a>$1</a>',$this->song);

		return $html;
    }

}
?>