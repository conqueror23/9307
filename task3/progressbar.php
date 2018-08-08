<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id = 'progerss_bar' style = 'border:1px solid black;height:30px;width:300px;'>
         <?php
           for($a=1;$a<=100;$a++){
	          echo '<div style = "height:30px;position:relative;float:left;width:3px;background-color:blue">';
	          echo '</div>';
	         ob_flush();
	         flush();
	          usleep(10000);
           };
         ?>
        </div>

  
        <script>location.replace("progressbar.php")</script>
    
    </body>
</html>