<!doctype html>
<html lang="en">
<head>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script>
  <script type="text/template" id="Utemplate">
      <span>Backbone model working with : </span> <span> Underscore to load this template</span>
      <div><?php echo "ID"; ?></div>
  </script>
  <?php $K = "IT";
    echo $K;
  ?>
  <script type="text/javascript">
  sup = Backbone.Model.extend({
    defaults : {
         EN: "Tony",
         IT:"Wayne"
    }
  });
  schoolCollection = Backbone.Model.extend({
      model:sup
  });
  function disp(string,collection ){
    console.log(string + " "  +JSON.stringify(collection.toJSON));
  }
  $(document).ready(function(){
      var sman = new sup({name :"snow",id : 1});
      var kman = new sup ({name : "knam ",id :2});
      var school_sup = new schoolCollection(sman,kman);
     // alert ("your suppervisor would be :"+ school_sup.get("<?php echo $K;?>"));
     
      disp("two elements:",school_sup);
      
     
  });
  </script>
  
  
</head>
<body>
  <div id="container">
  </div>
  

</body>
</html>