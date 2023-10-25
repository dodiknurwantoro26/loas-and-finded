<?php
//KONEKSI KE DATABASE
$koneksi = mysqli_connect("localhost","root","","db_test");
//TEST KONEKSI
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
  }
  echo "Connected successfully <br><br>";
//var_dump($koneksi);

// **REGISTER**
if(isset($_POST["register"])){
    if( registerasi($_POST) > 0 ) {
        echo "<h1>user ditambahkan</h1>";
    } else {
        echo mysqli_error($koneksi);
    }
}
//function register
function registerasi($data){
        global $koneksi;
        //stripslashes menghapus karakter backslashes dari string
        // mengubah semua huruf dalam sebuah string menjadi huruf kecil (lowercase)
        $username = strtolower(stripslashes($data["username"]));
        //mysqli_real_escape_string=memungkinkan user input ada tanda kutip ke database secara aman
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    //cek username ada atau belum
    $result=mysqli_query($koneksi,"SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result)){
        echo "<h4>User sudah ada</h4>";
        return false;
        }
        //cek konfirmasi password
        if( $password !== $password2){
            echo "<h4>user ditambahkan</h4>";
            return false;
        }
        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        //tambahkan ke database
        mysqli_query($koneksi, "INSERT INTO user VALUES ('$username','$password')");
        return mysqli_affected_rows($koneksi);
}

// **LOGIN**
//kondisi setelah login
if( isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result= mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' ");
    
    //cek username
    if(mysqli_num_rows($result)===1){
        //cek password
        $row = mysqli_fetch_assoc($result);
        // merubah password hash ke string
        //password_verity($password(unhash), $password(hasd));
        //$password === $row["password"] code tanpa verify     
        if(password_verify($password, $row["password"])){
                header("Location:page1.html");
                exit;
            }
    }
    
}



?>
