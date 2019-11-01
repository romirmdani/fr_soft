<html>
  <head>
        <title>FR SOFT</title>
     <link rel="icon" href="img/fr.png">
<style>
body{
    background: white;
}

#login{
    max-width: 350px;
    margin:5px;
    background: #eee;
    box-shadow: 0 0 10px #aaa;

}
#login h3{
    text-align: center;
    padding: 25px 10px;
    background-color: #2b2f3e;
    color: #b0b0bc;

}
fieldset{
    margin: 0;
    border: none;
}
form{
    padding: 0;
    margin: 0;
    padding: 15px;
}
input[type='text'],
input[type="password"]
{
    width: 90%;
    padding: 1em;
    margin-top: 1.2em;
    color: #888;
      
}
select{
 width: 90%;
    padding: 1em;
    margin-top: 1.2em;
    color: #888;
  }

input[type="submit"]{
    width: 100px;
    padding: 1.4em;
    margin: 1.5em 0;
    color: #888;
    background-color:#00cdb1 ;
    border:none;
    color:#eee;
    border-bottom: 4px solid transparent;
}
input[type="submit"]:hover{
    opacity: 0.8;
    border-color: #00adb1;

}



input[type="button"]{
    width: 100px;
    padding: 1.4em;
    margin: 1.5em 0;
    color: #888;
    background-color:#00cdb1 ;
    border:none;
    color:#eee;
    border-bottom: 4px solid transparent;
}
input[type="button"]:hover{
    opacity: 0.8;
    border-color: #00adb1;
    text-decoration: none;
}



form p{
    text-align: center;
    color: #888;
    width: 30px;
    margin: 10px auto 0;
    background: #f9f9f9;
    position: relative;
    bottom: 20px;
}
.border-p{
    border-top: 1px solid #888;
    margin: 10px 10px;
}
button{
    background-color: #3b5998;
    width: 100%;
    padding: 1.4em;
    margin-bottom: 1em;
    color: #888; ;
    border:none;
    color:#eee;
    border-bottom: 4px solid transparent;
}
button:hover{
    opacity: 0.9;
    border-color: #3b3998;

}

a{
  text-decoration: none;
  color: #221;
}
a:hover{
   text-decoration: none;
}

</style>
</head>
<body>
<br>
<br>
<br>

<center>
<!-- <img src="images/awani.jpg" width="350" height="140"> -->
<form method="post" name="login" action="cek_login.php">
    <div id="login">
        <h3>Login</h3>
        <fieldset>
            <form action="">
                <input type="text" name="username" placeholder="username" required oninvalid="this.setCustomValidity('Username Harus di isi')" oninput="setCustomValidity('')">
                <input type="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password Harus di isi')" oninput="setCustomValidity('')">
                <input type="submit" name="submit" value="Login">&nbsp;&nbsp;
                <a href="index.php"><input type="button" name="submit" value="Cancel"></a>
                
            </form>
        </fieldset>
    </div>
    </form>
    </center>
  </body>
  </html>