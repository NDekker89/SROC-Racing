<?php
	
	class driver {
		public $id;
		public $name;
		public $totalPoints;
		public $wins;
		public $poles;
		public $team;

		function __construct($drivers_id, $drivers_name, $drivers_points, $drivers_wins, $drivers_poles, $new_team) {
			$this->id = (string)$drivers_id;
			$this->name = (string)$drivers_name;
			$this->totalPoints = (int)$drivers_points;
			$this->wins = (int)$drivers_wins;
			$this->poles = (int)$drivers_poles;
			$this->team = (string)$new_team;
		}

		function setPoints($input) {

			foreach ($input as $key => $iinput) {
				
				if($key == $this->id) {
					$this->totalPoints = $iinput;
				}
			}
		}

		function setPoles($input) {

			foreach ($input as $key => $iinput) {
				
				if($key == $this->id) {
					$this->poles = $iinput;
				}
			}
		}

		function setWins($input) {

			foreach ($input as $key => $iinput) {
				
				if($key == $this->id) {
					$this->wins = $iinput;
				}
			}
		}

		function getId() {
			return $this->id;
		}

		function set_name($new_name) {
			$this->name = $new_name;
		}
		function get_name() {
			return $this->name;
		}


		function addPoints($points) {
			$this->totalPoints = $this->totalPoints + $points;
		}
		function getPoints() {
			return $this->totalPoints;
		}



		function addWins($win) {
			$this->wins = $this->wins + $win;
		}
		function getWins() {
			return $this->wins;
		}


		function addPoles($pole) {
			$this->poles = $this->poles + $pole;
		}
		function getPoles() {
			return $this->poles;
		}


		function setTeam($new_team) {			
			$this->team = $new_team;
		}
		function getTeam() {
			return $this->team;
		}	
	}

	class team extends driver {

		function __construct($team_id, $team_name, $team_points) {
			$this->id = $team_id;
			$this->name = $team_name;
			$this->totalPoints = $team_points;
		}

	}

	class raceResult {

		public $raceId;
		public $polePos;
		
		public $pos1;
		public $pos2;
		public $pos3;
		public $pos4;
		public $pos5;
		public $pos6;
		public $pos7;
		public $pos8;
		public $pos9;
		public $pos10;


		function __construct($post) {

			$this->raceId = $post["races"];
			$this->polePos = $post["polePos"];

			
			$this->pos1 = $post["pos1"];
			$this->pos2 = $post["pos2"];
			$this->pos3 = $post["pos3"];
			$this->pos4 = $post["pos4"];
			$this->pos5 = $post["pos5"];
			$this->pos6 = $post["pos6"];
			$this->pos7 = $post["pos7"];
			$this->pos8 = $post["pos8"];
			$this->pos9 = $post["pos9"];
			$this->pos10 = $post["pos10"];			
		}


	}


	function sort_drivers_points_asc($a, $b) {
		if ($a->getPoints() == $b->getPoints()) {
        return 0;
    	} else {
    	return ($a->getPoints()-$b->getPoints()) ? ($a->getPoints()-$b->getPoints())/abs($a->getPoints()-$b->getPoints()) : 0;
		}
	}

	function sort_drivers_points_desc($a, $b) {
		if ($a->getPoints() == $b->getPoints()) {
        return 0;
    	} else {
    	return ($b->getPoints()-$a->getPoints()) ? ($b->getPoints()-$a->getPoints())/abs($b->getPoints()-$a->getPoints()) : 0;
		}
	}

	
	// Function for Comparing strings, not integers
	/*
	function sort_drivers_points_desc($a, $b) {
		return strcmp($b->getPoints(), $a->getPoints());
	}*/
	
 
	function calcBehindLead($lead, $points) {
		$difference = $lead - $points;
		if ($difference == 0) {
			return "-";
		} else {
			return $difference;
		}
	}

	function calcBehindNext($lead, $points) {
		$difference = $lead - $points;
		return $difference;
	}

?>