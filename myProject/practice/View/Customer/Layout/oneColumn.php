<html>
    <head>
        <script type='text/javascript' src='<?php echo $this->baseUrl('Skin/Admin/Js/jquery-3.6.0.js'); ?>'></script>
        <script type='text/javascript' src='<?php echo $this->baseUrl('Skin/Admin/Js/mage.js'); ?>'></script><div>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> 
        <link rel="stylesheet" href="<?php echo $this->baseUrl('Skin/Admin/Css/style.css'); ?>">
    </head>
    <body>
        <div> <?php echo $this->getChild('header')->toHtml();  ?> </div>
        <div><?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?> </div>
        <div><?php echo $this->getChild('content')->toHtml();  ?></div>
        <div><?php echo $this->getChild('footer')->toHtml();  ?></div>
    </body>
</html> 