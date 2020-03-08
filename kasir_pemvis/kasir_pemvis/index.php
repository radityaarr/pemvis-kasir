<?php include_once 'Core/init.php'; include_once 'templates/header.php'; 
    if (Session::Cek('username')) {
        Redirect::To('Kasir/index');
    }
    if (Session::Cek('Login')) {
        echo "<li>".Session::Flash('Login')."</li>";
    }
?>
<h3>Selamat Datang di Aplikasi Kasir</h3>
    <form action="index.php" method="post">
        <input type="email" name="email"><br>
        <input type="submit" value="Cek Email" name="submit">
    </form>
<?php 
include_once 'templates/footer.php';
if (Input::Get('submit')) {
        if(!($USER->Cek_Email(Input::Get('email')))){
            Session::Flash('Daftar', "Email anda belum terdaftar, Silahkan Daftar");
            Redirect::To('Daftar');
        }else {
            Session::Flash('Masuk', "Email anda sudah terdaftar, Silahkan Login");
            Redirect::To('Masuk');
        }
    }
    
?>