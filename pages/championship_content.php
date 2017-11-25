			<div class="container ccontent">
				<div class="content_wrapper calendar">
					<div class="header calendar">
						<h1>Season 4 Calendar</h1>
					</div>
					
					<div class="calendar_wrapper clearfix" id="calendar_2017">
	
						<?php 

							if( ! $xml = simplexml_load_file('../data/races.xml') ) 
							{ 
								 echo 'unable to load XML file'; 
							} 
							else 
							{ 
								foreach( $xml as $race ) 
								{ 
									$id = $race->id;
									$name = $race->name;
									$date = $race->date;
									$winner = $race->winner; 

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
							}
						?>

					</div>
				</div>
			</div>