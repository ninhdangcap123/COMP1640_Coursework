
{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--  <title>Bootstrap Example</title>--}}
{{--  <meta charset="utf-8">--}}
{{--  <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
{{--  <style>--}}
{{--    /* Set black background color, white text and some padding */--}}
{{--    footer {--}}
{{--      background-color: black;--}}
{{--      color: white;--}}
{{--      padding: 15px;--}}
{{--    }--}}

{{--    .dropbtn {--}}
{{--  background-color: black;--}}
{{--  color: white;--}}
{{--  padding: 16px;--}}
{{--  font-size: 16px;--}}
{{--  border: none;--}}
{{--  cursor: pointer;--}}
{{--}--}}

{{--  #myInput {--}}
{{--  box-sizing: border-box;--}}
{{--  background-image: url('searchicon.png');--}}
{{--  background-position: 14px 12px;--}}
{{--  background-repeat: no-repeat;--}}
{{--  font-size: 16px;--}}
{{--  padding: 14px 20px 12px 45px;--}}
{{--  border: none;--}}
{{--  border-bottom: 1px solid #ddd;--}}
{{--}--}}

{{--#myInput:focus {outline: 3px solid #ddd;}--}}

{{--.dropdown {--}}
{{--  position: relative;--}}
{{--  display: inline-block;--}}
{{--}--}}

{{--.dropdown-content {--}}
{{--  display: none;--}}
{{--  position: absolute;--}}
{{--  background-color: #f6f6f6;--}}
{{--  min-width: 230px;--}}
{{--  overflow: auto;--}}
{{--  border: 1px solid #ddd;--}}
{{--  z-index: 1;--}}
{{--}--}}

{{--.dropdown-content a {--}}
{{--  color: black;--}}
{{--  padding: 12px 16px;--}}
{{--  text-decoration: none;--}}
{{--  display: block;--}}
{{--}--}}

{{--.dropdown a:hover {background-color: #ddd;}--}}

{{--.show {display: block;}--}}

{{--  </style>--}}
{{--</head>--}}
{{--<body>--}}

{{--<nav class="navbar navbar-inverse">--}}
{{--  <div class="container-fluid">--}}
{{--    <div class="navbar-header">--}}
{{--      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">--}}
{{--        <span class="icon-bar"></span>--}}
{{--        <span class="icon-bar"></span>--}}
{{--        <span class="icon-bar"></span>--}}
{{--      </button>--}}
{{--      <a class="navbar-brand" href="home">iIDEA</a>--}}
{{--    </div>--}}
{{--    <div class="collapse navbar-collapse" id="myNavbar">--}}
{{--      <ul class="nav navbar-nav">--}}
{{--        <li class=""><a href="home">HOME</a></li>--}}
{{--        <li><a href="page">Personal Page</a></li>--}}

{{--      </ul>--}}
{{--     <div class="dropdown">--}}
{{--  <button onclick="myFunction()" class="dropbtn">Category</button>--}}
{{--  <div id="myDropdown" class="dropdown-content">--}}
{{--    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">--}}
{{--    <a href="business">Business</a>--}}
{{--    <a href="economy">Economy</a>--}}
{{--    <a href="economy">Football</a>--}}
{{--    <a href="economy">Gaming</a>--}}
{{--  </div>--}}
{{--</div>--}}

{{--<script>--}}
{{--/* When the user clicks on the button,--}}
{{--toggle between hiding and showing the dropdown content */--}}
{{--function myFunction() {--}}
{{--  document.getElementById("myDropdown").classList.toggle("show");--}}
{{--}--}}

{{--function filterFunction() {--}}
{{--  var input, filter, ul, li, a, i;--}}
{{--  input = document.getElementById("myInput");--}}
{{--  filter = input.value.toUpperCase();--}}
{{--  div = document.getElementById("myDropdown");--}}
{{--  a = div.getElementsByTagName("a");--}}
{{--  for (i = 0; i < a.length; i++) {--}}
{{--    txtValue = a[i].textContent || a[i].innerText;--}}
{{--    if (txtValue.toUpperCase().indexOf(filter) > -1) {--}}
{{--      a[i].style.display = "";--}}
{{--    } else {--}}
{{--      a[i].style.display = "none";--}}
{{--    }--}}
{{--  }--}}
{{--}--}}
{{--</script>--}}
{{--<form class="navbar-form navbar-right" role="search">--}}
{{--        <div class="form-group input-group">--}}
{{--          <input type="text" class="form-control" placeholder="Search other users">--}}
{{--          <span class="input-group-btn">--}}
{{--            <button class="btn btn-default" type="button">--}}
{{--              <span class="glyphicon glyphicon-search"></span>--}}
{{--            </button>--}}
{{--          </span>--}}
{{--        </div>--}}
{{--      </form>--}}
{{--      <ul class="nav navbar-nav navbar-right">--}}
{{--        <li><a href="user"><span class="glyphicon glyphicon-user"></span> My Account</a></li>--}}

{{--        // nut logout--}}
{{--        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>--}}
{{--      </ul>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</nav>--}}

{{--<div class="container text-center">--}}
{{--  <div class="row">--}}
{{--    <div class="col-sm-3 well">--}}
{{--      <div class="well">--}}
{{--        <p><a href="user">My Profile</a></p>--}}
{{--        <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">--}}
{{--      </div>--}}
{{--      <div class="well">--}}
{{--        <p><a href="#">Interests</a></p>--}}
{{--        <p>--}}
{{--          <span class="label label-primary">School</span>--}}
{{--          <span class="label label-success">Business</span>--}}
{{--          <span class="label label-info">Football</span>--}}
{{--          <span class="label label-warning">Gaming</span>--}}
{{--          <span class="label label-danger">Friends</span>--}}
{{--        </p>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <div class="col-sm-7">--}}
{{--      <div class="row">--}}
{{--        <div class="col-sm-12">--}}
{{--          <div class="panel panel-default text-left">--}}
{{--            <div class="panel-body">--}}
{{--            <span class="glyphicon glyphicon-eye-open"></span> 200--}}
{{--            <h4><b> Author: Alex </b></h4>--}}
{{--              <p> Why do we need to study online? While we can just go to school instead during pandemic--}}
{{--              <br>--}}
{{--              <br>--}}
{{--              <span class="glyphicon glyphicon-tags"></span> #OnlineTeaching #SayNotoStudyOnline--}}
{{--              <br>--}}
{{--              <br>--}}
{{--              <button type="button" class="btn btn-default btn-sm">--}}
{{--                <span class="glyphicon glyphicon-thumbs-up"></span> Like--}}
{{--              </button>--}}
{{--              <button type="button" class="btn btn-default btn-sm">--}}
{{--                <span class="glyphicon glyphicon-thumbs-down"></span> Dislike--}}
{{--              </button>--}}
{{--              <button type="button" class="btn btn-default btn-sm">--}}
{{--                <span class="glyphicon glyphicon-download"></span> Download--}}
{{--              </button>--}}
{{--              <div class="row comment-box-main p-3 rounded-bottom">--}}
{{--<div class="col-md-9 col-sm-9 col-9 pr-0 comment-box">--}}
{{--<input type="text" class="form-control" placeholder="Comment ...." />--}}
{{--</div>--}}
{{--<div class="col-md-3 col-sm-2 col-2 pl-0 text-center send-btn">--}}
{{--<button class="btn btn-info">Send</button>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
