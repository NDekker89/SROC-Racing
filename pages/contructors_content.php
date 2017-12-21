			<div class="container ccontent">
				<div class="content_wrapper ranking">
					
					<div class="header ranking">
						<h1>Season 4 Constructor Standings</h1>
					</div>

					<div class="ranking_wrapper">

						<table id="teams">
							<tr>
								<th>POS</th>
								<th>TEAM</th>
								<th>TOTAL PTS</th>
								<th id="team_th">TEAM</th>
							</tr>

							<?php 

								// Enable displaying of errors
								// (!) Disable on PRD environment
								//ini_set('display_errors', 'On');
								//error_reporting(E_ALL | E_STRICT);
						
								include '../php/calcRanking.php';

								// Sort Array
								 usort($teamsArray, "sort_drivers_points_desc");

								// Output data to HTML
								foreach ($teamsArray as $key => $team) {

									// Calculate the position by looking at the index key
									$position = $key +1;

							?>

									<tr id="<?=$team->getId()?>">
										<td class="pos"><span><?=$position?></span></td>
										<td class="name"><?=$team->get_name()?></td>
										<td class="points"><?=$team->getPoints()?></td>
										<td class="team <?=$team->getId()?>"></td>
									</tr>

							<?php
								}	
									
							?>  							
						</table>

					</div>
				</div>
			</div>