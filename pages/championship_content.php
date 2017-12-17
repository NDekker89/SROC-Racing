			<div class="container ccontent">
				<div class="content_wrapper calendar">
					<div class="header calendar">
						<h1>Season 4 Calendar</h1>
					</div>
					
					<div class="calendar_wrapper clearfix" id="calendar_2017">
						
						<?php 

							// Enable displaying of errors
							// (!) Disable on PRD environment
							ini_set('display_errors', 'On');
							error_reporting(E_ALL | E_STRICT);

							include '../php/calcRaces.php';

							foreach ($result as $key => $race) { 

								$id = $key;
								$name = $race[1];
								$winner = $race[0]; 
								$date = $race[2];
								
								$the_date = DateTime::createFromFormat('Y-m-d', $date);
    							$now = new DateTime();

    							if($the_date < $now) {
    									$finished = "finished";
    							} else {
    								$finished = " ";
    							}

    							$writtenDate = $the_date->format('d M Y');

						?>

						<div class="race <?=$finished?>" id="<?=$id?>">
							<div class="race_img">
							</div>
							<div class="race_info">
								<div class="race_date">
									<p><span class="rdate"><?=$writtenDate?></span></p>
								</div>
								<div class="race_name">
									<h3><?=$name?></h3>
								</div>
								<div class="race_winner">
									<p><?=$winner?></p>
								</div>
							</div>
						</div>
						
						<?php

							}

						?>

					</div>
				</div>
			</div>