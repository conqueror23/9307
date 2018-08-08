<html>
    <head>
    </head>
    <body>
        <?php
          $page = (isset($_GET['page']) && ($_GET['page'] > 0)) ? intval($_GET['page']) : 1;
          $view = (isset($_GET['view']) && ($_GET['view'] > 0)) ? intval($_GET['view']) : 10;
          $data = array();
           for ($i = 0; $i < 20; $i++) {
               $data[$i] = rand(1,100);
             };
          $pages = array_chunk($data, $view, true);
          echo "<p>The results are:</p><p>";
          foreach($pages[$page - 1] as $num => $datum) {
            echo $num + 1, ". $datum<br>"; }
          echo "</p>";
          echo '<p>Switch to page: |';
          $get = $_GET;
          foreach(range(1, count($pages)) as $p) {
              if ($page == $p) {
                 echo " {$p} |";
              } else {
                  $get['page'] = $p;      
                  $query = http_build_query($get);
                  echo " <a href=\"{$_SERVER['PHP_SELF']}?{$query}\">{$p}</a> |";
              }
          }
          echo "</p>";     
        $options = array(3, 6, 9, 21);
        $get = $_GET;
        unset($get['page']);
        echo '<p>Results per page: |';
        foreach($options as $o) {
            if ($o == $view) {
                echo " {$o} |";
            } else {
                $get['view'] = $o;
                $query = http_build_query($get);
                echo " <a href=\"{$_SERVER['PHP_SELF']}?{$query}\">{$o}</a> |";
            }
        }
        echo "</p>";
        ?>
        <div style = 'height:200px;width:400px;position:absolute;background-color:red'>
        <?php
        foreach($data as $a){
	    $forheight = 200-$a*2;
	    echo '<div style = "height:'. $forheight .'px;position:relative;float:left;width:20px;background-color:green">';
	     echo '</div>';
        };
        ?>
        </div>
    </body>
</html>
