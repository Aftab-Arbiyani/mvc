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
        <table style="width: 100%; border: 1px solid black; height: 100%" >
            <tr >
                <td colspan="3" style="height: 100px; width: 100%; border: 1px solid black"><?php $this->getChild('header')->toHtml();  ?></td>
            </tr>
            <tr>
                <td style="height: 500px; border: 1px solid black; width: 10%;"><?php $this->getChild('left')->toHtml(); ?></td>
                <td style="height: 500px; border: 1px solid black; width: 30%;"><?php $this->getChild('content')->toHtml(); ?></td>
                <td style="height: 500px; border: 1px solid black; width: 10%;"><?php $this->getChild('right')->toHtml();?></td>
            </tr>
            <tr>
                <td colspan="3" style="height: 100px; border: 1px solid black"><?php $this->getChild('footer')->toHtml(); ?></td>
            </tr>
        </table>  
    </body>
</html>