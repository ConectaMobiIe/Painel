<?php

session_start();

if ($_SESSION['painel']['login'] != "") {} else {

  echo "<br><br><center><h1>REDIRECIONANDO...</h1></center>";
  echo "<script>
window.location='/login';
</script>";
  exit;
}

include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");

$login = $_SESSION['painel']['login'];

$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while ($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)) {
  $db_user_id = $row_produto_login['id'];
  $user_id = $db_user_id;
}

if (mysqli_real_escape_string($conn, $_GET['func']) == "del_cat") {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $result_usuario = "DELETE FROM config WHERE id='$id' && user_id='$db_user_id' ";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  //echo "<script>alert('Config deletada com sucesso!'); window.location='/config.php';</script>";
  $_SESSION['message'] = 'Deletado com sucesso!';
  header('location: /config');

} else if (mysqli_real_escape_string($conn, $_GET['func']) == "desab_cat") {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $result_usuario = "UPDATE config SET status='INACTIVE' WHERE id='$id' && user_id='$db_user_id'";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  //echo "<script>alert('Config desativada com sucesso!'); window.location='/config.php';</script>";
  $_SESSION['message'] = 'Desativado com sucesso!';
  header('location: /config');

} else if (mysqli_real_escape_string($conn, $_GET['func']) == "habilit_cat") {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $result_usuario = "UPDATE config SET status='ACTIVE' WHERE id='$id' && user_id='$db_user_id'";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  //echo "<script>alert('Config ativada com sucesso!'); window.location='/config.php';</script>";
  $_SESSION['message'] = 'Ativada com sucesso!';
  header('location: /config');
}

if (mysqli_real_escape_string($conn, $_GET['ed']) != "") {

  if (mysqli_real_escape_string($conn, $_GET['ed']) == "EDIT") {
    $id = mysqli_real_escape_string($conn, $_GET['ida']);
    $name = addslashes($_POST['name']);
    $nome = "TEST";
    $ordem = addslashes($_POST['sort_order']);
    $name = addslashes($_POST['name']);
    $config_v2ray = addslashes($_POST['config_v2ray']);
    $server_hostname = addslashes($_POST['server_hostname']);
    $description = addslashes($_POST['description']);
    $username = addslashes($_POST['username']);
    $server_port = addslashes($_POST['server_port']);
    $icon_image = addslashes($_POST['icon_image']);
    $password = addslashes($_POST['password']);
    $udp_port = addslashes($_POST['udp_port']);
    $category_id = addslashes($_POST['category']);
    $v2ray_uuid = addslashes($_POST['v2ray_uuid']);
    $primary_dns_server = addslashes($_POST['primary_dns_server']);
    $payload = addslashes($_POST['payload']);
    $payload = str_replace('\r', '99r99', $payload);
    $payload = str_replace('\n', '99n99', $payload);
    $payload = json_encode($payload, JSON_PRETTY_PRINT);
    $payload = str_replace('"', '', $payload);
    $payload = str_replace('\r', '', $payload);
    $payload = str_replace('\n', '', $payload);
    $payload = str_replace('
      ', '99n99', $payload);
    $status = addslashes($_POST['status']);
    $secondary_dns_server = addslashes($_POST['secondary_dns_server']);
    $sni = addslashes($_POST['sni']);
    $config_mode = addslashes($_POST['config_mode']);
    $url_check_user = addslashes($_POST['url_check_user']);
    $config_openvpn = addslashes($_POST['config_openvpn']);
    $proxy_hostname = addslashes($_POST['proxy_hostname']);
    $sort_order = addslashes($_POST['sort_order']);
    $proxy_port = addslashes($_POST['proxy_port']);
    $ovpn_config = addslashes($_POST['ovpn_config']);
    $status = addslashes($_POST['status']);
    $result_usuario = "UPDATE config SET
status='$status',
name='$name',
config_v2ray='$config_v2ray',
server_hostname='$server_hostname',
description='$description',
username='$username',
server_port='$server_port',
icon_image='$icon_image',
user_id='$user_id',
ovpn_config='$ovpn_config',
password='$password',
udp_port='$udp_port',
category_id='$category_id',
v2ray_uuid='$v2ray_uuid',
primary_dns_server='$primary_dns_server',
payload='$payload',
secondary_dns_server='$secondary_dns_server',
sni='$sni',
config_mode='$config_mode',
url_check_user='$url_check_user',
config_openvpn='$config_openvpn',
proxy_hostname='$proxy_hostname',
sort_order='$sort_order',
proxy_port='$proxy_port'

WHERE id='$id' && user_id='$db_user_id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);


    if (mysqli_affected_rows($conn)) {
      //echo "<script>alert('Config editada com sucesso!'); window.location='/config.php';</script>";
      $_SESSION['message'] = 'Editado com sucesso!';
      header('location: /config');
    } else {
      //echo "<script>alert('Config não editada!'); window.location='/config.php';</script>";
      $_SESSION['erro'] = 'Não houve mudanças!';
      header('location: /config');
    }
  } else if (mysqli_real_escape_string($conn, $_GET['ed']) == "ADD") {

    $nome = addslashes($_POST['name']);
    $ordem = addslashes($_POST['sort_order']);
    $cor = addslashes($_POST['category_color']);

    $name = addslashes($_POST['name']);
    $config_v2ray = addslashes($_POST['config_v2ray']);
    $server_hostname = addslashes($_POST['server_hostname']);
    $description = addslashes($_POST['description']);
    $username = addslashes($_POST['username']);
    $server_port = addslashes($_POST['server_port']);
    $icon_image = addslashes($_POST['icon_image']);
    $password = addslashes($_POST['password']);
    $udp_port = addslashes($_POST['udp_port']);
    $category_id = addslashes($_POST['category']);
    $v2ray_uuid = addslashes($_POST['v2ray_uuid']);
    $primary_dns_server = addslashes($_POST['primary_dns_server']);
    $payload = addslashes($_POST['payload']);

    $payload = str_replace('\r', '99r99', $payload);
    $payload = str_replace('\n', '99n99', $payload);

    $status = addslashes($_POST['status']);
    $secondary_dns_server = addslashes($_POST['secondary_dns_server']);
    $sni = addslashes($_POST['sni']);
    $config_mode = addslashes($_POST['config_mode']);
    $url_check_user = addslashes($_POST['url_check_user']);
    $config_openvpn = addslashes($_POST['config_openvpn']);
    $proxy_hostname = addslashes($_POST['proxy_hostname']);
    $sort_order = addslashes($_POST['sort_order']);
    $proxy_port = addslashes($_POST['proxy_port']);
    $ovpn_config = addslashes($_POST['ovpn_config']);

    if ($status == "") {
      $status = "ACTIVE";
    }

    $result_usuario = "INSERT INTO config SET
status='$status',
name='$nome',
config_v2ray='$config_v2ray',
server_hostname='$server_hostname',
description='$description',
username='$username',
server_port='$server_port',
icon_image='$icon_image',
user_id='$user_id',
ovpn_config='$ovpn_config',
password='$password',
udp_port='$udp_port',
category_id='$category_id',
v2ray_uuid='$v2ray_uuid',
primary_dns_server='$primary_dns_server',
payload='$payload',
secondary_dns_server='$secondary_dns_server',
sni='$sni',
config_mode='$config_mode',
url_check_user='$url_check_user',
config_openvpn='$config_openvpn',
proxy_hostname='$proxy_hostname',
sort_order='$sort_order',
proxy_port='$proxy_port'
    ";

    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_affected_rows($conn)) {
      //echo "<script>alert('Config adcionada com sucesso!'); window.location='/config.php';</script>";
      $_SESSION['message'] = 'Adcionado com sucesso!';
      header('location: /config');
    } else {
      //echo "<script>alert('Config não adcionada!'); window.location='/config.php';</script>";
      $_SESSION['erro'] = 'Erro ao criar!';
      header('location: /config');
    }


  } else {

    $id = addslashes($_POST['edit_qual_id']);
    $nome = addslashes($_POST['name']);
    $ordem = addslashes($_POST['sort_order']);
    $cor = addslashes($_POST['category_color']);
    $status = addslashes($_POST['status']);
    $result_usuario = "INSERT INTO config SET name='$nome'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_affected_rows($conn)) {
      //echo "<script>alert('Config adcionada com sucesso!'); window.location='/config.php';</script>";
      $_SESSION['message'] = 'Adcionado com sucesso!';
      header('location: /config');
    } else {
      //echo "<script>alert('Config não adcionada!'); window.location='/config.php';</script>";
      $_SESSION['erro'] = 'Erro ao criar!';
      header('location: /config');
    }

  }

}