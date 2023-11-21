<?php
session_start();

include("navbar.php");

?>

<!-- caroucell -->
<div class="slider">
  <div class="list">
    <div class="item">
      <img src="images/1.jpg" alt>
    </div>
    <div class="item">
      <img src="images/2.jpg" alt>
    </div>
    <div class="item">
      <img src="images/3.jpg" alt>
    </div>
    <div class="item">
      <img src="images/4.jpg" alt>
    </div>
    <div class="item">
      <img src="images/5.jpg" alt>
    </div>
  </div>
  <div class="buttons">
    <button id="prev"><</button>
    <button id="next">></button>
  </div>
  <ul class="dots">
    <li class="active"></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>

<script src="app.js"></script>

<br><br>
<div class="container active-cyan-4 mb-4 inline">
  <form method="POST" action="search-property.php">
    <input class="form-control" type="text"
      placeholder="Enter location to search house." name="search_property"
      aria-label="Search">
  </form>
</div>
<br><br>

<style>
  body, html {
    /* height: 100%; */
    margin: 0;
  }
  
  .bg {
    /* The image used */
    background-image: url("images/carousel.png");
  
    /* Full height */
    height: 60%; 
  
    /* Center and scale the image nicely */
    background-position: bottom;
    background-repeat: no-repeat;
    background-size: cover;
  }
  
  .fa {
    padding: 20px;
    font-size: 30px;
    text-align: left;
    text-decoration: none;
    margin: 5px 2px;
  }
  .fa:hover {
      opacity: 0.7;
  }
  .fa-facebook {
    background: #3B5998;
    color: white;
  }
  .fa-linkedin {
    background: #007bb5;
    color: white;
  }
  .active-cyan-3 input[type=text] {
    border: 1px solid #4dd0e1;
    box-shadow: 0 0 0 1px #4dd0e1;
  }
  
  /*  */
  .slider{
      width: 100%%;
      max-width: 97%;
      height: 500px;
      margin: auto;
      padding-top: 0;
      position: relative;
      overflow: hidden;
      border-radius: 50px;
  }
  .slider .list{
      position: absolute;
      width: max-content;
      height: 100%;
      left: 0;
      top: 0;
      display: flex;
      transition: 1s;
  }
  .slider .list img{
      width: 1300px;
      max-width: 100vw;
      height: 100%;
      object-fit: cover;
  }
  .slider .buttons{
      position: absolute;
      top: 45%;
      left: 5%;
      width: 90%;
      display: flex;
      justify-content: space-between;
  }
  .slider .buttons button{
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #fff5;
      color: #fff;
      border: none;
      font-family: monospace;
      font-weight: bold;
  }
  .slider .dots{
      position: absolute;
      bottom: 10px;
      left: 0;
      color: #fff;
      width: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
  }
  .slider .dots li{
      list-style: none;
      width: 10px;
      height: 10px;
      background-color: #fff;
      margin: 10px;
      border-radius: 20px;
      transition: 0.5s;
  }
  .slider .dots li.active{
      width: 30px;
  }
  @media screen and (max-width: 768px){
      .slider{
          height: 400px;
      }
  }
  </style>

<?php

include("property-list.php");

?>
