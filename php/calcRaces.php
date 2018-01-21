<?php

	/*
	Get empty Races from races.xml
	Put each race apart in xmlRaces array
	*/

	$xmlRaces = array();

	if (! $xmlRace = simplexml_load_file('../data/races.xml')) { 

		echo 'unable to load XML file'; 

	} else {

		foreach ($xmlRace as $race) { 
			$id = (string)$race->id;
			$name = (string)$race->name;
			$winner = (string)$race->winner;
			$date = (string)$race->date;

			$xmlRaces[$id] = array($winner, $name, $date);
		}
	}
																			

	/*
	Get all race results from folder
	Put each race apart in resultItems array
	*/										

	$dir = "../data/results/";
	$resultItems = array();

	foreach (glob($dir."*.xml") as $fileName) {
	
		$raceResult = simplexml_load_file($fileName);

		$id = (string)$raceResult->race->id;
		$winner = (string)$raceResult->race->pos1;

		$xmlDrivers = simplexml_load_file('../data/drivers.xml');

		foreach ($xmlDrivers as $driver) { 
			$dId = (string)$driver->id;
			$dName = (string)$driver->name;

			if($winner == $dId) {
				$winner = $dName;
			}
		};

		$resultItems[$id] = array($winner);
	}



	/*
	Loop trough xmlRaces array
	Foreach of them, loopt trough the results array
	If the ID of the xmlRace == resultId,
	Then make the winner of XML race the same as the winner
	of the resultRace
	*/

											
	$result = array_replace_recursive($xmlRaces, $resultItems);										


?>