<?php
 include "includes\db.php";
  
// **REGISTER**
if(isset($_POST["register"])){
    if( registerasi($_POST) > 0 ) {
        echo "<script>
        alert('User Baru Berhasil Ditambahkan!');
    </script>";
    } else {
        echo mysqli_error($con);
    }
}
//function register
function registerasi($data){
        global $con;
        //stripslashes menghapus karakter backslashes dari string
        // mengubah semua huruf dalam sebuah string menjadi huruf kecil (lowercase)
        $nama = strtolower(stripslashes($data["nama"]));
        $email = strtolower(stripslashes($data["email"]));
        $contact = strtolower(stripslashes($data["contact"]));
        //mysqli_real_escape_string=memungkinkan user input ada tanda kutip ke database secara aman
        $password = mysqli_real_escape_string($con, $data["password"]);
        $password2 = mysqli_real_escape_string($con, $data["password2"]);
    //cek username ada atau belum
    $result=mysqli_query($con,"SELECT nama FROM member WHERE nama = '$nama'");
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
        mysqli_query($con, "INSERT INTO member VALUES ('','$nama','$email','$password','$contact')");
        return mysqli_affected_rows($con);
}

?>