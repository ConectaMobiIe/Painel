<?php

 session_start();

if($_SESSION['painel']['login'] != ""){
}else{
    
echo "<br><br><center><h4>REDIRECIONANDO...</h4></center>";
echo "<script>
window.location='/login';
</script>";
exit;
}

include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");


$login = $_SESSION['painel']['login'];

$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)){
$db_user_id = $row_produto_login['id'];
$user_id = $db_user_id;
}

if (mysqli_real_escape_string($conn, $_GET['func']) == "del_cat"){
$id = mysqli_real_escape_string($conn, $_GET['id']);
$result_usuario = "DELETE FROM categoria WHERE id='$id' && user_id='$db_user_id' ";
$resultado_usuario = mysqli_query($conn, $result_usuario);
//echo "<script>alert('Categoria deletada com sucesso!'); window.location='/categories.php';</script>";
$_SESSION['message'] = 'Deletado com sucesso!';
header('location: /categories');
}else if (mysqli_real_escape_string($conn, $_GET['func']) == "desab_cat"){
$id = mysqli_real_escape_string($conn, $_GET['id']);
$result_usuario = "UPDATE categoria SET status='INACTIVE' WHERE id='$id' && user_id='$db_user_id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
//echo "<script>alert('Categoria desativada com sucesso!'); window.location='/categories.php';</script>";
$_SESSION['message'] = 'Desativada com sucesso!';
header('location: /categories');
}else if (mysqli_real_escape_string($conn, $_GET['func']) == "habilit_cat"){
$id = mysqli_real_escape_string($conn, $_GET['id']);
$result_usuario = "UPDATE categoria SET status='ACTIVE' WHERE id='$id' && user_id='$db_user_id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
//echo "<script>alert('Categoria ativada com sucesso!'); window.location='/categories.php';</script>";
$_SESSION['message'] = 'Ativada com sucesso!';
header('location: /categories');
}

if (addslashes($_POST['tipox']) == "categoria"){
    
  if (addslashes($_POST['edit_qual']) == "EDIT"){
$id = addslashes($_POST['edit_qual_id']);
$nome = addslashes($_POST['name']);
$ordem = addslashes($_POST['sort_order']);
$cor = addslashes($_POST['category_color']);
$status = addslashes($_POST['status']);
$result_usuario = "UPDATE categoria SET name='$nome', sort_order='$ordem', category_color='$cor', status='$status' WHERE id='$id' && user_id='$db_user_id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
if(mysqli_affected_rows($conn)){
//echo "<script>alert('Categoria editada com sucesso!'); window.location='/categories.php';</script>";
$_SESSION['message'] = 'Editado com sucesso!';
header('location: /categories');
}else{
//echo "<script>alert('Erro ao editar a categoria!'); window.location='/categories.php';</script>";
$_SESSION['erro'] = 'Erro ao editar!';
header('location: /categories');
}
  }else{
      
$id = addslashes($_POST['edit_qual_id']);
$nome = addslashes($_POST['name']);
$ordem = addslashes($_POST['sort_order']);
$cor = addslashes($_POST['category_color']);
$status = addslashes($_POST['status']);
$result_usuario = "INSERT INTO categoria SET name='$nome', sort_order='$ordem', category_color='$cor', status='$status', user_id='$db_user_id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
if(mysqli_affected_rows($conn)){
//echo "<script>alert('Categoria criada com sucesso!'); window.location='/categories.php';</script>";
$_SESSION['message'] = 'Adcionado com sucesso!';
header('location: /categories');
}else{
//echo "<script>alert('Erro ao criar uma nova categoria!'); window.location='/categories.php';</script>";
$_SESSION['erro'] = 'Erro ao adicionar!';
header('location: /categories');
}   
      
  }

/*
echo "<script>
window.location='/categories.php?erro1';
</script>";*/
}