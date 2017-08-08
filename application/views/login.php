<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">
<title>ADMIN UPT PUSKOM UNDIP</title>
<style>
body {
    background: url('<?php echo base_url(); ?>assets/images/login.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
}

.logo {
    width: 213px;
    height: 36px;
    margin: 30px auto;
}

.login-block {
    width: 320px;
    padding: 20px;
    background: #fff; /*ganti warna bg*/
    border-radius: 5px;
    border-top: 5px solid #ff656c;  /*ganti warna bg-top*/
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block input#username {
    background: #fff url('<?php echo base_url(); ?>assets/images/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff  url('<?php echo base_url(); ?>assets/images/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff  url('<?php echo base_url(); ?>assets/images/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff  url('<?php echo base_url(); ?>assets/images/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.login-block button {
    position: initial;
    width: 100%;
    height: 40px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
    margin-left: 0%;
}
.login-back button {
    margin-left: 0%;
    width: 100%;
    height: 40px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}
.login-block button:hover {
    background: #ff7b81;
}
.login-back button:hover {
    background: #ff7b81;
}
</style>
</head>
<body color=#424242>
<div class="logo"></div>
<div class="login-block">
        <form method="post" action="<?php echo base_url();?>admin/login/login_form">
                <h1>Login</h1>
                <p align="center"><font color=#424242> Halaman Admin</p></font>
                <input type="text" name="username" placeholder="Username" id="username" size="20" class="inputan"/><?php echo form_error('username');?>
                <input type="password" name="password" placeholder="Password" id="password" size="15" class="inputan"/><?php echo form_error('password');?>
                <button>Login</button>
        </form><br>
        <div class="login-back">
        <a href="<?php echo base_url(); ?>"><button>Back</button>  </a>
        </div>
    </div>

</div>
</body>

</html>
