<?php
session_start();
if(!isset($_SESSION['submit'])){
    header("Location:login.php");
    exit;
}
require 'functions.php';

$id = $_GET['id'];

if(hapus($id)>0){
    print"<script>
        alert('data berhasil dihapus');
        document.location.href = 'index.php';
        </script>";
}else{
    print"<script>
    alert('data gagal dihapus');
    document.location.href = 'index.php';
    </script>";
}
?>