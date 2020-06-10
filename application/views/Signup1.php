<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />	
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" />	
    
	
</head>
<body>

<div id="container">
    <div class="form">
        
        <ul class="tab-group">
            <li class="tab active"><a href="#signup">Sign Up</a></li>
            <li class="tab"><a href="#login">Log In</a></li>
        </ul>
        
        <div class="tab-content">
            <div id="signup">   
            <h1>Sign Up for Free</h1>
            
            <form action="/" method="post" name="SignUpForm">
            
            <div class="top-row">
                <div class="field-wrap">
                <label>
                    First Name<span class="req">*</span>
                </label>
                <input type="text" name="Sfname" id="Sfname" required autocomplete="off" />
                </div>
            
                <div class="field-wrap">
                <label>
                    Last Name<span class="req">*</span>
                </label>
                <input type="text" name="Slname" id="Slname" required autocomplete="off"/>
                </div>
            </div>

            <div class="field-wrap">
                <label>
                Email Address<span class="req">*</span>
                </label>
                <input type="email" name="SEmail" id="SEmail" required autocomplete="off"/>
            </div>
            
            <div class="field-wrap">
                <label>
                Set A Password<span class="req">*</span>
                </label>
                <input type="password" name="SPswd" id="SPswd" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
                <label>
                Confirm Password<span class="req">*</span>
                </label>
                <input type="password" name="SCPswd" id="SCPswd" required autocomplete="off"/>
            </div>
            
            <button type="submit" class="button button-block"/>Get Started</button>
            
            </form>

            </div>
            
            <div id="login">   
            <h1>Welcome Back!</h1>
            
            <form action="/" method="post">
            
                <div class="field-wrap">
                <label>
                Email Address<span class="req">*</span>
                </label>
                <input type="email"required autocomplete="off"/>
            </div>
            
            <div class="field-wrap">
                <label>
                Password<span class="req">*</span>
                </label>
                <input type="password"required autocomplete="off"/>
            </div>
            
            <p class="forgot"><a href="#">Forgot Password?</a></p>
            
            <button class="button button-block"/>Log In</button>
            
            </form>

            </div>
            
        </div><!-- tab-content -->
        
    </div> <!-- /form -->
</div>

</body>
<script src="<?php echo base_url(); ?>js/custome_js.js" ></script>	
</html>