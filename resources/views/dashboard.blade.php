<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set black background color, white text and some padding */
    footer {
      background-color: grey;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home">iIDEA</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home">Home</a></li>
        <li><a href="page">Personal Page</a></li>
        <li><a href="idea">Ideas</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search other users">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="user"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
    <div class="col-sm-9">
      <div class="well">
        <h4>Total Ideas</h4>
        <p>... Ideas</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Most Liked Idea</h4>
            <p> 120 <span class="glyphicon glyphicon-thumbs-up"></span> </p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Most Viewed Idea</h4>
            <p> <span class="glyphicon glyphicon-eye-open"></span> 600 </p>
          </div>
        </div>
        </div>
      </div>
</body>


</html>
