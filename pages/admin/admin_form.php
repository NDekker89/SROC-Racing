<div class="admin_page_wrapper clearfix">

						<div class="header admin_page">
							<h1>Admin Console</h1>
						</div>

						<div class="admin_page_text">

								<p>
									
									<form name="resultInput" action="<?php echo $_SERVER['PHP_SELF']; ?>"" onsubmit="return validateRaceResultForm()" method="post">
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

															<option value="<?=$id?>"><?=$id?></option>
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

																		<option value="<?=$id?>"><?=$id?></option>

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
									  	</fieldset>
									</form>

									<?php

										include("../php/html_to_xml.php");

									?>


								</p>

								</div>

							</div>
