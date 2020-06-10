<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />	
    <!-- <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" />	 -->
    <style>
    .marging-bottom-div{
        margin-bottom:20px;
    }
    </style>    
	
</head>
<body>

<div class="row">
    <div class="container">
        <div class="col-md-12 text-center"><h2>Admin Login</h2></div>
        
        <form method="post" name="SignUpForm">
            <div class="col-md-12" id="error-box"></div>
            
            <div class="col-md-12 marging-bottom-div"> 
                <div class="col-md-4">
                    <label>
                        UserName<span class="req">*</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="name" id="name" class="form-control" autocomplete="off" />
                </div>
            </div>

            <div class="col-md-12 marging-bottom-div"> 
                <div class="col-md-4">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off" />
                </div>
            </div>
            <div class="col-md-12 marging-bottom-div"> 
                <div class="col-md-4">
                
                </div>
                <div class="col-md-6">
                    <button type="button"  class="btn btn-success" name="Login" id="LoginSubmit">Login</button>
                </div>
            </div>
        </form> 
    </div>   
</div>

</body>
<script>
$(document).ready(function(){
 
    $('#LoginSubmit').click(function(){
        $("#error-box").html("");
        var arr = {};
        $('.form-control').each(function(index, value) {
            arr[$(this).attr("name")] = $(this).val();
        });
        console.log(arr);
        $.ajax({
            url:'<?=base_url()?>index.php/AdminLogin/LoginUser',
            method: 'post',
            data: arr,
            dataType: 'json',
            success: function(response){
                if(response.code == "1"){
                    window.location.href ="<?=base_url()?>index.php/AdminDashBoard";
                }else{
                    $("#error-box").val(response.error);
                }
            }
        });
    });
 
 });
</script>
</html>