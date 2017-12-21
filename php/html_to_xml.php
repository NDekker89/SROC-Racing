

		<?php 
			//header("Content-type: text/xml");

			// Enable displaying of errors
			// (!) Disable on PRD environment
			//ini_set('display_errors', 'On');
			//error_reporting(E_ALL | E_STRICT);
								
			include("class_lib.php");

			if(isset($_POST['submit'])) 
			{

				$results = new raceResult($_POST);


				$xml = new SimpleXMLElement('<result/>');
				$race = $xml->addChild('race');
				
				$id = $race->addChild('id', $results->raceId);

				$polePos = $race->addChild('polePos', $results->polePos);
				$polePos->addAttribute('polePoint', 1);

				$pos1 = $race->addChild('pos1', $results->pos1);
				$pos2 = $race->addChild('pos2', $results->pos2);
				$pos3 = $race->addChild('pos3', $results->pos3);
				$pos4 = $race->addChild('pos4', $results->pos4);
				$pos5 = $race->addChild('pos5', $results->pos5);
				$pos6 = $race->addChild('pos6', $results->pos6);
				$pos7 = $race->addChild('pos7', $results->pos7);
				$pos8 = $race->addChild('pos8', $results->pos8);
				$pos9 = $race->addChild('pos9', $results->pos9);
				$pos10 = $race->addChild('pos10', $results->pos10);

				$pos1->addAttribute('points', 25);
				$pos2->addAttribute('points', 18);
				$pos3->addAttribute('points', 15);
				$pos4->addAttribute('points', 12);
				$pos5->addAttribute('points', 10);
				$pos6->addAttribute('points', 8);
				$pos7->addAttribute('points', 6);
				$pos8->addAttribute('points', 4);
				$pos9->addAttribute('points', 2);
				$pos10->addAttribute('points', 1);


				$fileName = $results->raceId;

				if (!file_exists('../data/results')) {
			    	mkdir('../data/results', 0755, true);
				}

				$dom = new DOMDocument('1.0');
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->loadXML($xml->asXML());
				
				//Save XML to file 
				$dom->save('../data/results/'.$fileName.'.xml');

			}

		?>

		
