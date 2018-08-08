<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone-localstorage.js/1.0/backbone.localStorage-min.js" type="text/javascript"></script>  
        <meta charset="UTF-8">
        <title></title>
    
    </script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
       <script type="text/template" id="myTable">
        <table cellspacing='0' cellpadding='0' border='1' >
            <thead>
            <tr>
            <th>Id</th>
            <th>Name</th>
              </tr>
             </thead>
         <%
         // repeat items 
         _.each(rc,function(item,key,list){
         %>
        <tr>
         <!-- use variables -->
            <td><%= key %></td>
            <td>
            <h3><%- item.name %></h3>
            <p><%- item.app %></p>
          </td>
        </tr>
        <%
          });
        %>
        </table>
    </script>
    <div id="content"></div>
    <script type="text/javascript">
     _.templateSettings.variable = "rc"; //very important
    var items1 = [
        {name:"PHP", app:"Web Programming"},
        {name:"C#", app:"Systems Developement"},
        ];
    var template = _.template($("#myTable").html());
    $("#content").html(template(items1));
    </script>
        </body>
    </html>
