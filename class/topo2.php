<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");
if (mysqli_real_escape_string($conn, $_GET["acao"]) == "sair"){
unset($_SESSION['painel']['login']);
echo "<br><br><center><h1>REDIRECIONANDO...</h1></center>";
echo "<script>
window.location='./login';
</script>";
//$_SESSION['message'] = 'Deslogou com sucesso!';
//header('location: ./login');
exit;
}
?>
<?php
if($_SESSION['painel']['login'] != ""){
}else{
echo "<br><br><center><h1>REDIRECIONANDO...</h1></center>";
echo "<script>
window.location='./login';
</script>";
exit;
}

$login = $_SESSION['painel']['login'];

// -------------- ----------------
$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)){
$db_usuario = $row_produto_login['login'];
$nome = $row_produto_login['user'];
$db_user_id = $row_produto_login['id'];
$db_usuario_expirar = $row_produto_login['expirar'];
$db_adm_permiss = $row_produto_login['permiss'];
$db_usuario_acess = $row_produto_login['permiss'];
$perm = $row_produto_login['permiss'];
$user_id = $db_user_id;

if($db_adm_permiss == "9"){
$db_usuario_acess_name = "Dono";
}else if($db_adm_permiss == "8"){
$db_usuario_acess_name = "Sub-Dono";
}else if($db_adm_permiss == "7"){
$db_usuario_acess_name = "Revendedor";
}else if($db_adm_permiss == "6"){
$db_usuario_acess_name = "VIP";
}else if($db_adm_permiss == "5"){
$db_usuario_acess_name = "Usuario";
}else if($db_adm_permiss == "4"){
$db_usuario_acess_name = "Membro";
}else if($db_adm_permiss == "3"){
$db_usuario_acess_name = "Vencido";
}else if($db_adm_permiss == "2"){
$db_usuario_acess_name = "Pendente";
}else if($db_adm_permiss == "1"){
$db_usuario_acess_name = "Bloq";
}else if($db_adm_permiss == "0"){
$db_usuario_acess_name = "Banido";
}else{
$db_usuario_acess_name = "";
}

}
date_default_timezone_set('America/Sao_Paulo');
$data_atual = date('Y-m-d');
$data_consultar = date($db_usuario_expirar);
$dt_calc = strtotime($data_consultar) - strtotime($data_atual);
$dias = floor($dt_calc/(60 * 60 * 24));
$dt_br = strtotime($db_usuario_expirar);
$dias_br = date('d/m/Y', $dt_br);

$dono = "9";
$vencido = "3";
$usuario = "5";
$revendedor = "7";
if ($db_adm_permiss == 5) {
  if ($dias > 0) {
    //valido para uso
  } else if ($dias == 0 || $dias < 0) {
    //expirou
    $sql = $conn->prepare("UPDATE usuario SET permiss='$vencido' WHERE id='$db_user_id'");
    $sql->execute();
    echo "<script>alert('Seu acesso expirou!'); window.location='?acao=sair';</script>";
    /*$_SESSION['erro'] = 'Seu acesso expirou!';
    header('location: ?acao=sair');*/
    exit;
  } else {
    echo "<script>alert('Ocorreu um erro!'); window.location='?acao=sair';</script>";
    /*$_SESSION['erro'] = 'Ocorreu um erro!';
    header('location: ?acao=sair');*/
  }
} else if ($db_adm_permiss == 9 || $db_adm_permiss == 7) {
  if ($dias > 0) {
    //valido para uso
  } else if ($dias == 0 || $dias < 0) {
    //valido para uso pq é adm ou moderador
  } else {
    echo "<script>alert('Ocorreu um erro!'); window.location='?acao=sair';</script>";
    /*$_SESSION['erro'] = 'Ocorreu um erro!';
    header('location: ?acao=sair');*/
    exit;
  }
}else if ($db_adm_permiss == 3) {
  echo "<script>alert('Seu acesso expirou!'); window.location='?acao=sair';</script>";
  /*$_SESSION['erro'] = 'Seu acesso expirou!';
    header('location: ?acao=sair');*/
} else {
  echo "<script>alert('Ocorreu um erro!'); window.location='?acao=sair';</script>";
  /*$_SESSION['erro'] = 'Ocorreu um erro!';
    header('location: ?acao=sair');*/
}



$db_logo = "static/assets/img/avatars/4.png";

 
 $a1_link = $_SERVER[REQUEST_URI];
 
 $URIindex = '';
 $URIadmin = '';
 $URIcategories = '';
 $URIconfig = '';
 $URIapp_config = '';
 $URIprofile = '';
 
 if ($_SERVER[REQUEST_URI] == '/index' || $_SERVER[REQUEST_URI] == 'index.php' || $_SERVER[REQUEST_URI] == '/') {
   $URIindex = 'active';
 } elseif ($_SERVER[REQUEST_URI] == '/admin' || $_SERVER[REQUEST_URI] == 'admin.php') {
   $URIadmin = 'active';
 } elseif ($_SERVER[REQUEST_URI] == '/categories' || $_SERVER[REQUEST_URI] == 'categories.php') {
   $URIcategories = 'active';
 } elseif ($_SERVER[REQUEST_URI] == '/config' || $_SERVER[REQUEST_URI] == 'config.php') {
   $URIconfig = 'active';
 } elseif ($_SERVER[REQUEST_URI] == '/app_config' || $_SERVER[REQUEST_URI] == 'app_config.php') {
   $URIapp_config = 'active';
 } elseif ($_SERVER[REQUEST_URI] == '/profile' || $_SERVER[REQUEST_URI] == 'profile.php') {
   $URIprofile = 'active';
 }

if ($perm == "3"){
  echo "<br><br><center><h1>ACESSO NEGADO</h1></center>";
  echo "<script>window.location='./expirado';</script>";
  exit;
}


?>
<style>
  .nav-item {
    background-color: #dedede;
    border-radius: 100px;
    margin-top: 3px;
    height: 50px;
  }
  .nav-wrapper {
    background-color: white;
  }
</style>
<div class="container-fluid">
<div class="row">
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
<div class="main-navbar">
<nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
<a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">

<div class="d-table m-auto">
<img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 40px;"
src="static/assets/img/avatars/4.png" alt="Shards Dashboard">
</div>
</a>

<a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
<i class="material-icons">&#xE5C4;</i>
</a>

</nav>
</div>
<div class="nav-wrapper">
<ul class="nav flex-column">

<li class="nav-item <?php echo $URIindex; ?>">
<a class="nav-link" href="index">
<i class="material-icons">edit</i>
<span>Painel de Controle</span>
</a>
</li>

<?php
if($db_usuario_acess >= "9"){ // ADMIN ?>
<li class="nav-item <?php echo $URIadmin; ?>">
<a class="nav-link" href="admin">
<i class="material-icons">person</i>
<span>Gerenciar Usuários</span>
</a>
</li>
<?php } ?>

<li class="nav-item <?php echo $URIcategories; ?>">
<a class="nav-link" href="categories">
<i class="material-icons">storage</i>
<span>Categorias</span>
</a>
</li>

<li class="nav-item <?php echo $URIconfig; ?>">
<a class="nav-link" href="config">
<i class="material-icons">settings</i>
<span>Configurações</span>
</a>
</li>

<li class="nav-item <?php echo $URIapp_config; ?>">
<a class="nav-link" href="app_config">
<i class="material-icons">phone_iphone</i>
<span>Aplicativo</span>
</a>
</li>

<li class="nav-item <?php echo $URIprofile; ?>">
<a class="nav-link" href="profile">
<i class="material-icons">person</i>
<span>Meu Perfil</span>
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="?acao=sair">
<i class="material-icons">exit_to_app</i>
<span>Sair</span>
</a>
</li>

</ul>
</div>
</aside>
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
<div class="main-navbar sticky-top bg-white">
<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
<form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
<div class="input-group input-group-seamless ml-3">
</div>
</form>
</span>
</a>
<nav class="nav">
<a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-right"
data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
<i class="material-icons">&#xE5D2;</i>
</a>
</nav>
</nav>
</div>

