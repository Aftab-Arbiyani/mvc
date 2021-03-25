<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="<?php echo $this->baseUrl('Skin/Customer/Css/font-awesome.css'); ?>" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo $this->baseUrl('Skin/Customer/Css/bootstrap.css'); ?>" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="<?php echo $this->baseUrl('Skin/Customer/Css/jquery.smartmenus.bootstrap.css'); ?>" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseUrl('Skin/Customer/Css/jquery.simpleLens.css'); ?>">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseUrl('Skin/Customer/Css/slick.css'); ?>">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseUrl('Skin/Customer/Css/nouislider.css'); ?>">
    <!-- Theme color -->
    <link id="switcher" href="<?php echo $this->baseUrl('Skin/Customer/Css/theme-color/default-theme.css'); ?>" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="<?php echo $this->baseUrl('Skin/Customer/Css/sequence-theme.modern-slide-in.css'); ?>" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="<?php echo $this->baseUrl('Skin/Customer/Css/style.css'); ?>" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

  </head>

    <body>
        <div> <?php echo $this->getChild('header')->toHtml();  ?> </div>
        <div><?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?> </div>
        
        <div><?php echo $this->createBlock('Block\Home\Index')->toHtml();  ?></div>
        <div><?php echo $this->getChild('footer')->toHtml();  ?></div>

        <script type='text/javascript' src='<?php echo $this->baseUrl('Skin/Customer/Js/jquery-3.6.0.js'); ?>'></script>
        <script type='text/javascript' src='<?php echo $this->baseUrl('Skin/Customer/Js/mage.js'); ?>'></script><div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $this->baseUrl('Skin/Customer/Js/bootstrap.js'); ?>"></script>  
        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Customer/Js/jquery.smartmenus.js'); ?>"></script>
        <!-- SmartMenus jQuery Bootstrap Addon -->
        <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Customer/Js/jquery.smartmenus.bootstrap.js'); ?>"></script>  
        <!-- To Slider JS -->
        <script src="<?php echo $this->baseUrl('Skin/Customer/Js/sequence.js'); ?>"></script>
        <script src="<?php echo $this->baseUrl('Skin/Customer/Js/sequence-theme.modern-slide-in.js'); ?>"></script>  
        <!-- Product view slider -->
        <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Customer/Js/jquery.simpleGallery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Customer/Js/jquery.simpleLens.js'); ?>"></script>
        <!-- slick slider -->
        <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Customer/Js/slick.js'); ?>"></script>
        <!-- Price picker slider -->
        <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Customer/Js/nouislider.js'); ?>"></script>
        <!-- Custom js -->
        <script src="<?php echo $this->baseUrl('Skin/Customer/Js/custom.js'); ?>"></script> 

    </body>
</html>