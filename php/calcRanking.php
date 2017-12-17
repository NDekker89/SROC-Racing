<?php 

	// Enable displaying of errors
	// (!) Disable on PRD environment
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	include("../php/class_lib.php");

	/*
	Get drivers from drivers.xml
	Create array of driver objects
	Create array of drivers ID+points
	*/

	$driversArray = [];
	$driverPoints = array();
	$driversPoints = array();

	if (! $xmlDriver = simplexml_load_file('../data/drivers.xml')) {  
		echo 'unable to load XML file'; 
	} 
	else {

		foreach ($xmlDriver as $driver) {
		$driversArray[] = new driver(
		$driver->id, 
		$driver->name, 
		$driver->totalPoints, 
		$driver->wins,
		$driver->poles,
		$driver->team);
		}

		foreach ($xmlDriver as $drive) {
		$id = (string)$drive->id;
		$totalPoints = (int)$drive->totalPoints;

		$driverPoints[$id] = $totalPoints;
		}

		$driversPoints = array($driverPoints);
										
	}


	// Create array for the drivers
	$teamsArray = [];

	// Load XML file, create team objects and add them to array
	if( ! $xml = simplexml_load_file('../data/teams.xml') ) 
	{ 
		echo 'unable to load XML file'; 
	} 
	else 
	{ 
		foreach ($xml as $team) {
			$teamsArray[] = new team(
			$team->id, 
			$team->name, 
			$team->totalPoints);
		}
	}


	/*
	Get all race results from folder
	Put each race apart in resultItems array
	*/										

											
	$dir = "../data/results/";
	$resultItems = array();
	$resultPolePos = array();
	$resultWins = array();

	foreach (glob($dir."*.xml") as $fileName) {
		$raceResult = simplexml_load_file($fileName);

		$polePos = (string)$raceResult->race->polePos;
		$polePoints = (int)$raceResult->race->polePos['polePoint'];

		$winner = (string)$raceResult->race->pos1;
		$win = (int)"1";

		$id = (string)$raceResult->race->id;
		$pos1 = (string)$raceResult->race->pos1;
		$pos2 = (string)$raceResult->race->pos2;
		$pos3 = (string)$raceResult->race->pos3;
		$pos4 = (string)$raceResult->race->pos4;
		$pos5 = (string)$raceResult->race->pos5;
		$pos6 = (string)$raceResult->race->pos6;
		$pos7 = (string)$raceResult->race->pos7;
		$pos8 = (string)$raceResult->race->pos8;
		$pos9 = (string)$raceResult->race->pos9;
		$pos10 = (string)$raceResult->race->pos10;

		$points1 = (int)$raceResult->race->pos1['points'];
		$points2 = (int)$raceResult->race->pos2['points'];
		$points3 = (int)$raceResult->race->pos3['points'];
		$points4 = (int)$raceResult->race->pos4['points'];
		$points5 = (int)$raceResult->race->pos5['points'];
		$points6 = (int)$raceResult->race->pos6['points'];
		$points7 = (int)$raceResult->race->pos7['points'];
		$points8 = (int)$raceResult->race->pos8['points'];
		$points9 = (int)$raceResult->race->pos9['points'];
		$points10 = (int)$raceResult->race->pos10['points'];

		$resultItems[] = array(
			$pos1 => $points1,
			$pos2 => $points2,
			$pos3 => $points3,
			$pos4 => $points4,
			$pos5 => $points5,
			$pos6 => $points6,
			$pos7 => $points7,
			$pos8 => $points8,
			$pos9 => $points9,
			$pos10 => $points10
		);

		$resultPolePos[] = array(
			$polePos => $polePoints
		);

		$resultWins[] = array(
			$winner => $win
		);
	}


	/*
	Calculate final Result
	*/	

	$result = array_merge_recursive($driversPoints, $resultItems);

	$final = array();

	array_walk_recursive($result, function($item, $key) use (&$final){
		$final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
	});

	$resultPolePoss = array();

	array_walk_recursive($resultPolePos, function($item, $key) use (&$resultPolePoss){
		$resultPolePoss[$key] = isset($resultPolePoss[$key]) ?  $item + $resultPolePoss[$key] : $item;
	});

	$finalWins = array();

	array_walk_recursive($resultWins, function($item, $key) use (&$finalWins){
		$finalWins[$key] = isset($finalWins[$key]) ?  $item + $finalWins[$key] : $item;
	});


	/* 
	Input final results in drivers object
	*/

	foreach ($driversArray as $driver) {

		$driver->setPoints($final);
		$driver->setPoles($resultPolePoss);
		$driver->setWins($finalWins);
	}



	/*
	Calculate ranking of teams
	*/

	$teamResult = array();

	foreach ($driversArray as $team) {
		$teamId = (string)$team->team;
		$teamPoints = (int)$team->totalPoints;

		$teamResult[] = array($teamId => $teamPoints);

	}

	$finalTeamResult = array();

	array_walk_recursive($teamResult, function($item, $key) use (&$finalTeamResult){
		$finalTeamResult[$key] = isset($finalTeamResult[$key]) ?  $item + $finalTeamResult[$key] : $item;
	});

	foreach ($teamsArray as $team) {
		$team->setPoints($finalTeamResult);
	}


?>