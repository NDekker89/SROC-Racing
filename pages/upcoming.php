<<<<<<< HEAD
			
						<?php 

							if( ! $xml = simplexml_load_file('data/races.xml') ) 
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

									$the_date = DateTime::createFromFormat('Y-m-d', $date);
    								$now = new DateTime();

    								$writtenDate = $the_date->format('d M Y');

    								if($the_date > $now) {
    								?>

    								<div class="upcoming">
										<a href="pages/championship.php">
											<h3 class="upcoming_title">Upcoming event</h3>
											<div class="calendar_wrapper" id="calendar_2017">
													
												<div class="race" id="<?=$id?>">
													<div class="race_img">
													</div>
													<div class="race_info">
														<div class="race_date">
															<p><span><?=$writtenDate?></span></p>
														</div>
														<div class="race_name">
															<h3><?=$name?></h3>
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>

    								<?php

    								break;

    								} else {
    									
    								}
								
								}
							}
						?>




			
=======
			<div class="upcoming">
				<a href="pages/championship.php">
					<h3 class="upcoming_title">Upcoming event</h3>
					<div class="calendar_wrapper" id="calendar_2017">
							
						<div class="race" id="bahrain">
							<div class="race_img">
							</div>
							<div class="race_info">
								<div class="race_date">
									<p><span>26 NOVEMBER</span></p>
								</div>
								<div class="race_name">
									<h3>BAHRAIN GRAND PRIX</h3>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
>>>>>>> bff6cfba815797e8e6692e84df59b818792687ac
