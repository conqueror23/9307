<html>
    <head>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" value="form1">
            max price:<input type="number" name="max_price"><br>
            min price:<input type="number" min="min_price"><br>
            <input type="submit" name="submit1">         
        </form>
        <?php
        @$max_price = $_POST["max_price"];
        @$min_price = $_POST["min_price"];
        $xml = simplexml_load_file('book.xml');
        foreach($xml -> children() as $books) {
	    if($books->price >$min_price & $books->price <$max_price){
		echo $books->title.' : '.$books->price.'<br/>';
	       };
       };
        ?>
    </body>
</html>