<?php
	
	class driver {
		protected $id;
		protected $name;
		protected $totalPoints;
		protected $starts;
		protected $wins;
		protected $poles;
		protected $team;

		function __construct($drivers_id, $drivers_name, $drivers_points, $drivers_starts, $drivers_wins, $drivers_poles, $new_team) {
			$this->id = $drivers_id;
			$this->name = $drivers_name;
			$this->totalPoints = $drivers_points;
			$this->starts = $drivers_starts;
			$this->wins = $drivers_wins;
			$this->poles = $drivers_poles;
			$this->team = $new_team;
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


		function setPoints($points) {
			$this->totalPoints = $points;
		}
		function addPoints($points) {
			$this->totalPoints = $this->totalPoints + $points;
		}
		function getPoints() {
			return $this->totalPoints;
		}


		function setStarts($starts) {
			$this->starts = $starts;
		}
		function addStarts($starts) {
			$this->totalStarts = $this->totalStarts + $starts;
		}
		function getStarts() {
			return $this->starts;
		}


		function setWins($win) {
			$this->wins = $wins;
		}
		function addWins($win) {
			$this->wins = $this->wins + $win;
		}
		function getWins() {
			return $this->wins;
		}


		function setPoles($pole) {
			$this->poles = $pole;
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

	/*
	/ Function for Comparing strings, not integers
	/
	function sort_drivers_points_desc($a, $b) {
		return strcmp($b->getPoints(), $a->getPoints());
	}
	*/

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