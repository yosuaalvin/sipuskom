<html>
<head>
  <title>Sistem Informasi Pelatihan UPT PUSKOM UNDIP</title>
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/undip.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <script type="application/x-javascript">
  addEventListener("load", function()
  { setTimeout(hideURLbar, 0);
  }, false);
  function hideURLbar(){ window.scrollTo(0,1); }
  </script>

  <!--bootstrap-->
  <link href="<?php echo base_url();?>assets/css/jquery.dataTables.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <!--coustom css-->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
  <!--script-->
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
  <!-- js -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
  <!-- /js -->
  <!--fonts-->
  <link href='//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <!--/fonts-->
  <!--hover-girds-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/default.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/component.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" />
  <script src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
  <!--/hover-grids-->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
  <!--script-->
  <style>

.modal-content{
	width: 520px;
	/*background:url(../images/laptop.jpg); transaparan*/
}
.modal-header{
    background-color: #00BFFF;
    color:white !important;
    text-align: center;
    font-size: 30px;
}
.modal-body{
    width: 450px;
    padding: 20px;
    border-radius: 5px;
    margin: 0 auto;
}
.modal-footer {
    background-color: #424242;
}
.login-block button{
	background: #778899;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
          <font color=#ffffff><h4>Silahkan Login</font></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;" width>
        <div class="login-block">
           <form method="post" action="<?php echo base_url();?>user/login/login_form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label><br>
              <input type="text" name="username" placeholder="Username" id="username" size="20" class="form-control"/><?php echo form_error('username');?>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" name="npm" placeholder="Password" id="npm" size="15" class="form-control"/><?php echo form_error('npm');?>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <font color=#fff><button type="submit" class="btn btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button></font>
          </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>

<!--/script-->
</head>
	<body>
<!--header-->

<div class="topnav" id="myTopnav">
  <a href="<?php echo base_url(); ?>"><img width="300" src="<?php echo base_url(); ?>assets/images/logo-undip.png"></img></a>
  <a style="margin-top:15px" href="<?php echo base_url(); ?>welcome/pendaftaran"><span data-hover="Pendaftaran">Pendaftaran</span></a>
  <a style="margin-top:15px" href="<?php echo base_url(); ?>welcome/konfirmasi"><span data-hover="Konfirmasi">Konfirmasi</span></a>
  <a style="margin-top:15px" href="<?php echo base_url(); ?>welcome/kursus"><span data-hover="Pelatihan">Pelatihan</span></a>
  <a style="margin-top:15px" href="<?php echo base_url(); ?>welcome/lupa_password"><span data-hover="Pelatihan">Lupa Password</span></a>

  <a class="navbar-right" style="margin-top:15px;margin-right:15px" href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a>
  <a style="margin-top:15px" href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<!--/script-->
		   <div class="clearfix"> </div>
</div>
<script>
    window.intergramId = "293078439"
    window.intergramServer = "https://puskomundipintergram.herokuapp.com"
</script>
<script id="intergram" type="text/javascript" src="https://puskomundipintergram.herokuapp.com/js/widget.js"></script>
