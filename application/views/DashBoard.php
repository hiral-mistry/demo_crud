<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DashBoard</title>
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
        <div class="col-md-12 text-center"><h2>Hello <?php echo $name;?></h2></div>        
        <div class="col-md-12 text-right"><a href="<?php echo base_url();?>index.php/DashBoard/Logout">Log out</a></div>        
        
    </div>   
</div>

</body>
<script>
$(document).ready(function(){
 
    $('#FormSubmit').click(function(){
        $("#error-box").html("");
        var arr = {};
        $('.form-control').each(function(index, value) {
            arr[$(this).attr("name")] = $(this).val();
        });
        console.log(arr);
        $.ajax({
            url:'<?=base_url()?>index.php/Signup/SignupUser',
            method: 'post',
            data: arr,
            dataType: 'json',
            success: function(response){

                if(response.code == "1"){
                    window.location.href ="<?=base_url()?>index.php/Login";
                }else{
                    $("#error-box").val(response.error);
                }
                
            }
        });
    });
 
 });
</script>
</html>