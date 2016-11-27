<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $pageTitle; ?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/bootstrap-datepicker3.css" rel="stylesheet">
        <link href="<?php echo base_url();?>fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/scripts.js"></script>
        <?php 
        if (isset($script)) {
        	foreach ($script as $js) { ?>
        	<script src="<?php echo base_url().'js/'.$js;?>.js"></script>
        <?php } }?>
        <script src="<?php echo base_url();?>js/admin-script.js"></script>        
	</head>
	<body>