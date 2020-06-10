<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin DashBoard</title>
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

    <div class="row">
        <div class="col-md-8 col-md-push-2">
        <div class="col-md-12">
            <div class="col-md-1">Sr No </div>
            <div class="col-md-2">First Name </div>
            <div class="col-md-2">Last Name </div>
            <div class="col-md-4">Email </div>
            <div class="col-md-3">Action </div>
        </div>
        

        <?php 
        $cnt = 1;
        foreach ($userdata as $val){?>
            <div class="col-md-12" style="margin-bottom:10px">
                <div class="col-md-1"><?php echo $cnt;  ?></div>
                <div class="col-md-2"><?php echo $val['first_name']; ?> </div>
                <div class="col-md-2"><?php echo $val['last_name']; ?></div>
                <div class="col-md-4"><?php echo $val['email']; ?> </div>
                <div class="col-md-3"><a class="btn btn-warning" href="<?php echo base_url();?>index.php/AdminDashBoard/EditData/<?php echo $val['id']; ?>">Edit</a> | 
                <a class="btn btn-success deleteData" data-id="<?php echo $val['id'];?>">Delete</a>  
                </div>
            </div> 
        <?php $cnt++; } ?>
        
        </div>  
    </div>
</div>

</body>
<script>
$(document).ready(function(){
 
    $('.deleteData').click(function(){
        var data_id = $(this).attr("data-id");
        
        $.ajax({
            url:'<?=base_url()?>index.php/AdminDashBoard/DeleteData',
            method: 'post',
            data: {"data-id": data_id},
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