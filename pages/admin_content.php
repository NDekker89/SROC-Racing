			<div class="container ccontent">
				<div class="content_wrapper admin_page">
					
					

							<section>

								<?php
									 
									session_start();

									
									 
									// ***************************************** //
									// **********	DECLARE VARIABLES  ********** //
									// ***************************************** //
									 
									$username = 'srocadmin';
									$password = 'schumacher123';
									 
									$random1 = 'rfgeughedabsk';
									$random2 = 'ashdjalkj234552jhhfgjfg';
									 
									$hash = md5($random1.$password.$random2); 
									 
									$self = $_SERVER['REQUEST_URI'];
									 
									 
									// ************************************ //
									// **********	USER LOGOUT  ********** //
									// ************************************ //
									 
									if(isset($_GET['logout']))
									{
										unset($_SESSION['login']);
									}
									 
									 
									// *********************************************** //
									// **********	USER IS LOGGED IN	********** //
									// *********************************************** //
									 
									if (isset($_SESSION['login']) && $_SESSION['login'] == $hash) {

										include("admin/admin_form.php");

									}
									 
									 
									// *********************************************** //
									// **********	FORM HAS BEEN SUBMITTED	********** //
									// *********************************************** //
									 
									else if (isset($_POST['submit'])) {
									 
										if ($_POST['username'] == $username && $_POST['password'] == $password){
										
											//IF USERNAME AND PASSWORD ARE CORRECT SET THE LOG-IN SESSION
											$_SESSION["login"] = $hash;
											header("Location: $_SERVER[PHP_SELF]");
									 
										} else {
									 
											// DISPLAY FORM WITH ERROR
											display_login_form();
											echo '<p class="wrongLogin">Username or password is invalid</p>';
									 
										}
									}	
									 
									 
									// *********************************************** //
									// **********	SHOW THE LOG-IN FORM	********** //
									// *********************************************** //
									 
									else { 
									 
										display_login_form();
									 
									}
									 
									 
									function display_login_form(){ ?>

										<div class="form">
										    <form class="login-form" action="<?php echo $self; ?>" method='post'>
										      <input type="text" placeholder="username" name="username" id="username"/>
										      <input type="password" placeholder="password" name="password" id="password"/>
										      <input type="submit" name="submit" value="Login" id="loginBtn">
										    </form>
										 </div>
									 
										
									 
									<?php } ?>
							</section>

						
					
				</div>
			</div>