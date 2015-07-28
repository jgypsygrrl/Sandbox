<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>weatherApp</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <style>

    html, body{
      height:100%;
    }

    .container {
      background-image:url("./images/background.jpg");
      width:100%;
      height:100%;
      background-size:cover;
      background-position:center;

    }

    #details {
      margin-top:125px;
      text-align:center;
    }

    #details h1 {
      font-size:300%;
    }

    #city {
      margin:0 auto;
      width:75%;
    }

    p {
      padding-top: 5px;
      padding-bottom: 5px;
    }

  </style>
</head>
<body>

  <div class="container contentContainer">

    <div class="row">

      <div class="col-md-6 col-md-offset-3" id="details">

        <h1 class="title">weatherApp</h1>

          <p class="lead">Curious about the weather today?</p>

          <form>

            <div class="form-group">

              <input type="text" class="form-control" placeholder="Type your city here.  ex: New York, Paris, London" name="city" id="city" />

            </div>

              <button class="btn btn-warning btn-lg">Shorts or Scarf?</button>


          </form>

      </div>


    </div>

  </div>
  

<!-- ========== SCRIPTS ========== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>