<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html' charset='utf-8 ' />
		<meta name='viewport' content='width=device-width, initial-scale=1' />
		<link rel='stylesheet' href='css/bootstrap.min.css' />
        <title>Login and Registration Form</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'> 
        <meta name='author' content='Jagmeet Singh And Navdeep Singh' />
        <link rel='stylesheet' type='text/css' href='css/demo.css' />
        <link rel='stylesheet' type='text/css' href='css/style.css' />
		<link rel='stylesheet' type='text/css' href='css/animate-custom.css' />
    </head>
    <body>


    <?php 
    require 'navigation.php';
    ?>

        <div class='container'>
            <header>
                <h1>Login and Registration Form <span>Weather Predictor</span></h1>
				<nav class='codrops-demos'>
					<span id='headerWhite'>Enter the details to Login or Sign Up</span>
				</nav>
            </header>
            <section>
                <div id='container_demo' >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class='hiddenanchor' id='toregister'></a>
                    <a class='hiddenanchor' id='tologin'></a>
                    <div id='wrapper'>
                        <div id='login' class='animate form'>
                            <form method='post' action='login.php' autocomplete='on'> 
                                <h1>Log in</h1> 
                                <!-- 2 field -->
                                <p> 
                                    <label for='emailSignIn' class='uname' data-icon='u' > Enter email </label>
                                    <input id='username' name='emailSignIn' required='required' type='text' placeholder='email'/>
                                </p>
                                <p> 
                                    <label for='password' class='youpasswd' data-icon='p'> Enter password </label>
                                    <input id='password' name='password' required='required' type='password' placeholder='password' /> 
                                </p>
                                <!-- upto this -->

                                <p class='keeplogin'> 
									<input type='checkbox' name='loginkeeping' id='loginkeeping' value='loginkeeping' /> 
									<label for='loginkeeping'>Keep me logged in</label>
								</p>
                                <p class='login button'> 
                                    <input type='submit' value='Login' /> 
								</p>
                                <p class='change_link'>
									Not a member yet ?
									<a href='#toregister' class='to_register'>Join us</a>
								</p>
                            </form>
                        </div>

                        <div id='register' class='animate form'>
                            <form  method='post' action='login.php' autocomplete='on'> 
                                <h1> Sign up </h1> 
                                

                                <!-- 4 fields -->
                                <p> 
                                    <label for='nameSignUp' class='uname' data-icon='u'> Enter Name</label>
                                    <input id='usernamesignup' name='nameSignUp' required='required' type='text' placeholder='Name' />
                                </p>
                                <p> 
                                    <label for='emailSignUp' class='youmail' data-icon='e' > Enter email</label>
                                    <input id='emailsignup' name='emailSignUp' required='required' type='email' placeholder='email'/> 
                                </p>
                                <p> 
                                    <label for='passwordSignUp' class='youpasswd' data-icon='p'>Enter password </label>
                                    <input id='passwordsignup' name='passwordSignUp' required='required' type='password' placeholder='password'/>
                                </p>
                                <p> 
                                    <label for='passwordSignUpConfirm' class='youpasswd' data-icon='p'>Please confirm your password </label>
                                    <input id='passwordsignup_confirm' name='passwordSignUpConfirm' required='required' type='password' placeholder='password'/>
                                </p>
                                <!-- upto this -->


                                <p class='signin button'> 
									<input type='submit' value='Sign up'/> 
								</p>
                                <p class='change_link'>  
									Already a member ?
									<a href='#tologin' class='to_register'> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
					
			   </div>  
			   
            </section>
        </div>
		<div id='footer'>
        
                Copyright © WeatherPredictor.com
        
                </div>
		
    </body>
</html>