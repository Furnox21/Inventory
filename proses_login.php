<?php 
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
var_dump($password);

$query = mysqli_query($conn,"SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
$exec_query = mysqli_num_rows($query); 

if($exec_query > 0){

	$data = mysqli_fetch_assoc($query);

	if($data['level']=="pemilik"){   

		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pemilik";
		header("location:index.php");

	}else if($data['level']=="karyawan"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "karyawan";
		header("location:index.php");

	}else{
		echo "<script>alert('Login Gagal, Silahkan Cek Username Dan Password Anda'); window.location.href='login.php'</script>";
	}	
}else{
	echo "<script>alert('Login Gagal, Silahkan Cek Username Dan Password Anda'); window.location.href='login.php'</script>";
	
}

?>