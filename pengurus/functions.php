<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "posyandu");;

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function registrasi_pengurus($data){
	global $conn;

	$nik_pengurus = strtolower(stripcslashes($data["nik_pengurus"]));
	$username_pengurus = strtolower(stripcslashes($data["username_pengurus"]));
	$nama_posyandu = strtolower(stripcslashes($data["nama_posyandu"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek sudah ada atau blm
	$result = mysqli_query($conn, "SELECT nik_pengurus FROM pengurus
		WHERE nik_pengurus = '$nik_pengurus'");

	if (mysqli_fetch_assoc($result) ) {
		echo "<script> 
				alert ('NIK sudah terdaftar');
			</script>";
		return false;
	}

	//cek konfirm password
	if($password !== $password2){
		echo "<script>
				alert ('konfirmasi tidak sesuai');
			</script>";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO pengurus VALUES('', '$nik_pengurus','$username_pengurus', '$nama_posyandu', '$password')");

	return mysqli_affected_rows($conn);
}

function registrasidosen($data){
	global $conn;

	$nama = strtolower(stripcslashes($data["nama"]));
	$nip = strtolower(stripcslashes($data["nip"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek sudah ada atau blm
	$result = mysqli_query($conn, "SELECT nip FROM userdosen
		WHERE nip = '$nip'");

	if (mysqli_fetch_assoc($result) ) {
		echo "<script> 
				alert ('NIP sudah terdaftar');
			</script>";
		return false;
	}

	//cek konfirm password
	if($password !== $password2){
		echo "<script>
				alert ('konfirmasi tidak sesuai');
			</script>";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO userdosen VALUES('', '$nama','$nip', '$password')");

	return mysqli_affected_rows($conn);
}

function registrasipenjual($data){
	global $conn;

	$nik = strtolower(stripcslashes($data["nik"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek sudah ada atau blm
	$result = mysqli_query($conn, "SELECT nik FROM userpenjual
		WHERE nik = '$nik'");

	if (mysqli_fetch_assoc($result) ) {
		echo "<script> 
				alert ('NIK sudah terdaftar');
			</script>";
		return false;
	}

	//cek konfirm password
	if($password !== $password2){
		echo "<script>
				alert ('konfirmasi tidak sesuai');
			</script>";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO userpenjual VALUES('', '$nik', '$password')");

	return mysqli_affected_rows($conn);
}
