<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>weatherApp</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/stylesheet.css">
</head>
<body>

  <div class="container contentContainer">

    <div class="row">

      <div class="col-md-6 col-md-offset-3" id="details">

        <h1 class="title">weatherApp</h1>

          <p class="lead">Curious about the weather for the next few days?</p>

          <form>

            <div class="form-group">

              <input type="text" class="form-control" placeholder="Type your city here.  e.g. New York, Paris, London..." name="city" id="city" />

            </div>

              <button id="findWeather" class="btn btn-sample btn-lg">Shorts or Scarf?</button>

               <p id="viewCode"><a href="https://github.com/jgypsygrrl/Sandbox/tree/master/php-weather" target"_blank">View Code on Github</a> | <a href="http://jennifergapay.com/sandblog/">Back to Sandblog</a></p>

          </form>

        <div id="success" class="alert alert-success" >Success!</div>

        <div id="fail" class="alert alert-warning">Unfortunately there was an error.  Please retype your city.</div>

        <div id="noCity" class="alert alert-warning">Please enter your city.</div>

      </div>

    </div>

  </div>

<!-- ========== SCRIPTS ========== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script>
    $("#findWeather").click(function(event) {
      event.preventDefault();
      $(".alert").hide();

      if($("#city").val()!="") {
        $.get("scraper.php?city="+$("#city").val(), function( data ) {
          if (data=="") {
            $("#fail").fadeIn();
          } else {           
            $("#success").html(data).fadeIn();
          };
        });
      } else {
        $("#noCity").fadeIn();
      };
    });
  </script>
</body>
</html>