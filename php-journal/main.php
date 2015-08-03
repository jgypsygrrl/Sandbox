<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>phpJournal </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css" >
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
  
<!-- ========== start NAVBAR ========== -->

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">

        <div class="navbar-header pull-left"  > 
          <a class="navbar-brand">myJournal</a>
        </div>
 
        <!--- LOGOUT -->       
        <div class="pull-right">
          <ul class="navbar-nav nav">
            <li><a href="">Log Out</a></li>
          </ul>
        </div>

      </div>
    </div>

<!-- ========== end NAV ========== -->

    <div class="container contentContainer topContainer" id="home">

      <div class="col-md-6 col-md-offset-3" id="topMain">
     
        <!-- ===== Journal ===== -->

        <textarea class="form-control"></textarea>

        
        
      </div>

    </div>

<!-- ========== start SCRIPTS ========== -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <!-- ========== adjust image height for top container ========== -->
  <script>
    //changed to min-height adjust to smaller devices
    $(".contentContainer").css("min-height",$(window).height());
    $("textarea").css("height",$(window).height()-100);
  </script>

</body>
</html>



