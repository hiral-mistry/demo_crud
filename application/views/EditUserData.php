<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit User Data</title>
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
        <div class="col-md-12 text-center"><h2>Edit Data</h2></div>
        
        <form method="post" name="SignUpForm">
            
            <div class="col-md-12 marging-bottom-div"> 
                <div class="col-md-4">
                    <label>
                        First Name<span class="req">*</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="first_name" id="first_name" value="<?php echo $userdata['first_name']; ?>" class="form-control" autocomplete="off" />
                </div>
            </div>

            <div class="col-md-12 marging-bottom-div"> 
                <div class="col-md-4">
                    <label>
                        Last Name<span class="req">*</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="last_name" id="last_name" value="<?php echo $userdata['last_name']; ?>" class="form-control" autocomplete="off" />
                </div>
            </div>

            <div class="col-md-12 marging-bottom-div"> 
                <div class="col-md-4">
                    <label>
                        Email<span class="req">*</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="email" id="email" value="<?php echo $userdata['email']; ?>" class="form-control" autocomplete="off" />
                </div>
            </div>

            <div class="col-md-12 marging-bottom-div"> 
                <div class="col-md-4">
                
                </div>
                <div class="col-md-6">
                    <button type="button"  class="btn btn-success" data-id="<?php echo $userdata['id']; ?>" name="Submit" id="EditSubmit">Edit</button>
                </div>
            </div>
            <div class="col-md-12" id="error-box"></div>
        </form> 
    </div>   
</div>

</body>
<script>
$(document).ready(function(){
 
    $('#EditSubmit').click(function(){
        $("#error-box").html("");
        var id = $(this).attr("data-id");
        var arr = {};
        $('.form-control').each(function(index, value) {
            arr[$(this).attr("name")] = $(this).val();
        });
        
        $.ajax({
            url:'<?=base_url()?>index.php/AdminDashBoard/EditSubmitData/'+id,
            method: 'post',
            data: arr,
            dataType: 'json',
            success: function(response){

                if(response.code == "1"){
                    window.location.href ="<?=base_url()?>index.php/AdminDashBoard";
                }else{
                    $("#error-box").html(response.error);
                }
                
            }
        });
    });
 
 });
</script>
</html>