			<div class="container ccontent">
				<div class="content_wrapper ranking">
					
					<div class="header ranking">
						<h1>Season 4 Ranking</h1>
					</div>

					<div class="ranking_wrapper">

						<table id="teams">
							<tr>
								<th>POS</th>
								<th>DRIVER</th>
								<th>TOTAL PTS</th>
								<th>BEHIND LEAD</th>
								<th>BEHIND NEXT</th>
								<th>WINS</th>
								<th>POLES</th>
								<th id="team_th">TEAM</th>
							</tr>


							<?php 

								// Enable displaying of errors
								// (!) Disable on PRD environment
								//ini_set('display_errors', 'On');
								//error_reporting(E_ALL | E_STRICT);


								include '../php/calcRanking.php';
								

								// Sort Array
								usort($driversArray, "sort_drivers_points_desc");

								// Get points of nr1
								$mostPoints = $driversArray[0]->getPoints();

								// Get previous index in array 
								//To be used in calculatign the difference in points
								$previous = 0;

								// Output data to HTML
								foreach ($driversArray as $key => $driver) {

									// Calculate the position by looking at the index key
									$position = $key +1;

									// Get points of the above driver
									$nextPoints = $driversArray[$previous]->getPoints();

									?>

									<tr id="<?=$driver->getId()?>">
										<td class="pos"><span><?=$position?></span></td>
										<td class="name"><?=$driver->get_name()?></td>
										<td class="points"><?=$driver->getPoints()?></td>
										<td class="beh_lead"><?=calcBehindLead($mostPoints, $driver->getPoints())?></td>
										<td class="beh_next"><?=calcBehindNext($nextPoints, $driver->getPoints())?></td>
										<td class="wins"><?=$driver->getWins()?></td>
										<td class="poles"><?=$driver->getPoles()?> </td>
										<td class="team <?=$driver->getTeam()?>"></td>
									</tr>

								 	<?php

								 	// Set current driver as the "previous" driver
								 	$previous = $key;
								}	
									
							?>                    

						</table>

					</div>
				</div>
			</div>