					<div class="header admin_page clearfix">
							<h1>Admin Console</h1>
					</div>					

					<div class="admin_page_wrapper clearfix">

						<div class="admin_page_tabs">
							<div class="admin_page_tab active" id="admin_race_tab" data-admintab="1">
								<h3>Races</h3>
							</div>
							<div class="admin_page_tab not_active" id="admin_driver_tab" data-admintab="2">
								<h3>Drivers</h3>
							</div>
							<div class="admin_page_tab not_active" id="admin_team_tab" data-admintab="3">
								<h3>Teams</h3>
							</div>
						</div>


						<div class="admin_page_text visible" data-admintab="1">
									
									<form name="resultInput" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateRaceResultForm()" method="post">
										<fieldset>
											<legend>Input race results</legend>
										  	<label for="races">Select race:</label><br>
										  	<select name="races" required>
										  		<option disabled selected value> -- select an option -- </option>

										  		<?php 

										  			// Enable displaying of errors
													// (!) Disable on PRD environment
													//ini_set('display_errors', 'On');
													//error_reporting(E_ALL | E_STRICT);

													

													if( ! $xmlRace = simplexml_load_file('../data/races.xml') ) 
													{ 
														 echo 'unable to load XML file'; 
													} 
													else 
													{ 
														foreach( $xmlRace as $race ) 
														{ 
															$id = $race->id;
															$name = $race->name;
															$winner = $race->winner;

															if($winner != null) {
													?>			
						    								<option value="<?=$id?>"><?=$id?></option>
						    						<?php		
						    								} 
														}
													}
												?>
											</select>
											
											<br/>
											<br/>


											<label for="polePos">Pole position:</label><br/>
											<select name="polePos" required>
												<option disabled selected value> -- select an option -- </option>

													<?php

														if( ! $xmlDriver = simplexml_load_file('../data/drivers.xml') ) 
														{ 
														 echo 'unable to load XML file'; 
														} 
														else 
														{
														foreach ($xmlDriver as $driver)  {
															$id = $driver->id;
															$name = $driver->name;

														?>

															<option value="<?=$id?>"><?=$name?></option>
														<?php
															}
														}

													?>
													
											</select>
											<br/>
											<br/>

											<div class="selectPos clearfix">
												<div class="selectPosInput">
											<?php 

												for ($i=1; $i < 11; $i++) { 

													$pos = $i;

													if ($pos == 6) {
													   echo "<div class='selectPosInput'>";
													}

											?>
													<div class="posInput">
														<label for="pos<?=$pos?>">Position <?=$pos?>:</label><br/>
														<select name="pos<?=$pos?>">
															<option disabled selected value> -- select an option -- </option>

																<?php
																	foreach ($xmlDriver as $driver)  {
																		$id = $driver->id;
																		$name = $driver->name;

																	?>

																		<option value="<?=$id?>"><?=$name?></option>

																	<?php
																	}

																?>
																
														</select>
														</div>
												<?php
													if ($pos == 5) {
													   echo "</div>";
													} else if ($pos == 10) {
														echo "</div>";
													}
												}
												?>
											</div>

											
											</fieldset>
											<br/>
											<br/>
											<input type="submit" class="button" value="Submit" name="submit">
										  	 <input type="reset" class="button" value="Reset"> 
										  	 <a class="button" href="?logout=true" id="logoutBtn">Logout</a>

									</form>

									<?php

										include("../php/html_to_xml.php");

									?>




								</div>
								
								<div class="admin_page_text driver not_visible" data-admintab="2">

									<form name="newDriverInput" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm('races')" method="post">
										<fieldset>
											<legend>Input new driver</legend>

											<label for="driverName">Driver name:</label><br>
										  	<input type="text" name="driverName" required>

										  	<br/>
											<br/>


										  	<label for="driverTeam">Driver team:</label><br>
										  	<select name="driverTeam" required>
										  		<option disabled selected value> -- select an option -- </option>

										  		<?php 													

													if( ! $xmlTeams = simplexml_load_file('../data/teams.xml') ) 
													{ 
														 echo 'unable to load XML file'; 
													} 
													else 
													{ 
														foreach( $xmlTeams as $team ) 
														{ 

															$team = $team->id;

													?>			
						    								<option value="<?=$team?>"><?=$team?></option>
						    						<?php		

														}
													}
												?>
											</select>
										  		

										</fieldset>

										<br/>
										<br/>
										<input type="submit" class="button" value="Submit" name="submit2">
										<input type="reset" class="button" value="Reset"> 
										<a class="button" href="?logout=true" id="logoutBtn">Logout</a>

									</form>

								</div>

								<div class="admin_page_text team not_visible" data-admintab="3">

									<form name="newTeamInput" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm('teams')" method="post">
										<fieldset>
											<legend>Input new team</legend>

											<label for="teamName">Team name:</label><br>
										  	<input type="text" name="teamName" required>

										  	<br/>
											<br/>										  		

										</fieldset>

										<br/>
										<br/>
										<input type="submit" class="button" value="Submit" name="submit3">
										<input type="reset" class="button" value="Reset"> 
										<a class="button" href="?logout=true" id="logoutBtn">Logout</a>

									</form>

								</div>

							</div>

  											