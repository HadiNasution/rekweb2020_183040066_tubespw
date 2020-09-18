<?php 

	$conn = mysqli_connect("localhost", "root", "") or die("Koneksi Gagal!");
	mysqli_select_db($conn, "tubes_pw") or die("DB Salah!");

//=================================================================================
function query($sql){
	global $conn;
	$result = mysqli_query($conn, $sql);

	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}
//=================================================================================
function tambah($data){
	global $conn;

	$judul = htmlspecialchars($data['judul']);
	$Sinopsis = htmlspecialchars($data['Sinopsis']);

	//upload gambar
	$foto = upload();
	if(!$foto){
		return false;
	}

	$querytambah = mysqli_query($conn, "INSERT INTO buku
					VALUES ('','$foto','$judul','$Sinopsis')
					");
	
	$idbuku = mysqli_fetch_assoc(mysqli_query($conn,"SELECT MAX(id) AS 'bukubaru' FROM buku"));
	$bukubaru = $idbuku['bukubaru'];
	mysqli_query($conn,"INSERT INTO id_genre_penerbit
			VALUES ('',1,'$bukubaru')");
	
	
	return mysqli_affected_rows($conn);
}
//=================================================================================
function upload(){
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	//cek pilih gambar
	if($error === 4){
		print "<script>
				alert('upload gambar terlebih dahulu');
			</script>";
		return false;
	}

	//cek ekstensi gambar
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.',$namaFile);
	$ekstensiGambar =strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
		print "<script>
		alert('upload file yang benar');
		</script>";
		return false;
	}

	//cek ukuran gambar
	if($ukuranFile > 1000000){
		print "<script>
		alert('ukuran gambar melebihi batas maksimum');
		</script>";
		return false;
	}

	//lolos pengecekan
	//generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName,'../assets/img/'. $namaFileBaru);
	return $namaFileBaru;
}
//=================================================================================
function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM id_genre_penerbit WHERE id = $id");

	return mysqli_affected_rows($conn);
}
//=================================================================================
function ubah($data){
	global $conn;

	$id = $data['id'];
	
	$judul = htmlspecialchars($data['judul']);
	$Sinopsis = htmlspecialchars($data['Sinopsis']);
	$gambarLama = htmlspecialchars($data['gambarLama']);
	$foto;

	//cek apakah user pilih gambar baru atau tidak
	if($_FILES['foto']['error'] === 4){
		$foto = $gambarLama;	
	}else{
		$foto = upload();
	}

	$queryubah = "UPDATE buku
					SET
					foto = '$foto',
					judul = '$judul',
					Sinopsis = '$Sinopsis'
					WHERE id = $id
					";
	mysqli_query($conn,$queryubah);
	return mysqli_affected_rows($conn);
}
//=================================================================================
function cari($keyword){
	$query = "SELECT * FROM buku
			WHERE
			judul LIKE '%$keyword%' OR
			Sinopsis LIKE '%$keyword%'
			";
	return query($query);
}
//=================================================================================
function register($data){
	global $conn;

	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($conn,$data['password']);
	$password2 = mysqli_real_escape_string($conn,$data['password2']);


	//cek, apakah sudah ada user yang sama?
	$result = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)){
		print "<script>
		alert('akun ini sudah terdaftar.');
		</script>";
		return false;
	}
	//cek konfirmasi pass
	if($password !== $password2){
		print "<script>
		alert('Konfirmasi Password tidak sesuai');
		</script>";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke databases
	mysqli_query($conn,"INSERT INTO users VALUES(
		'',
		'$username',
		'$password'
	)");

	return mysqli_affected_rows($conn);
}
//=================================================================================
?>