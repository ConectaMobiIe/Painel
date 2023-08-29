<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");

$login = $_SESSION['painel']['login'];
$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while ($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)) {
  $db_user_id = $row_produto_login['id'];
  $user_id = $db_user_id;
}
if (mysqli_real_escape_string($conn, $_GET['func']) == "config") {
  $json = $_POST['imp'];
  $dados = json_decode($json, true);

  $status = $dados['status'];
  $nome = $dados['name'];
  $description = $dados['description'];
  $username = $dados['username'];
  $password = $dados['password'];
  $config_mode = $dados['config_mode'];
  if ($config_mode == "ssh_direct") {
    $config_mode = "SSH_DIRECT";
  } else if ($config_mode == "ssl_direct") {
    $config_mode = "SSL_DIRECT";
  } else if ($config_mode == "ssh_proxy") {
    $config_mode = "SSH_PROXY";
  } else if ($config_mode == "ssl_proxy") {
    $config_mode = "SSL_PROXY";
  } else if ($config_mode == "ovpn_proxy") {
    $config_mode = "OVPN_PROXY";
  } else if ($config_mode == "ovpn_ssl") {
    $config_mode = "OVPN_SSL";
  } else if ($config_mode == "ovpn_ssl_proxy") {
    $config_mode = "OVPN_SSL_PROXY";
  } else {
    $config_mode = $config_mode;
  }
  $config_v2ray = $dados['config_v2ray'];
  $payload = $dados['payload'];
  $server_hostname = $dados['server_hostname'];
  $server_port = $dados['server_port'];
  $udp_port = $dados['udp_port'];
  $proxy_port = $dados['proxy_port'];
  $sni = $dados['sni'];
  $icon_image = $dados['icon_image'];
  $v2ray_uuid = $dados['v2ray_uuid'];
  $primary_dns_server = $dados['primary_dns_server'];
  $secondary_dns_server = $dados['secondary_dns_server'];
  $url_check_user = $dados['url_check_user'];
  $config_openvpn = $dados['config_openvpn'];
  $proxy_hostname = $dados['proxy_hostname'];
  $sort_order = $dados['sort_order'];
  if ($sort_order == '') {
    $sort_order = '1';
  } else {
    $sort_order = $sort_order;
  }
  $category_id = $dados['category_id'];

  if ($dados) {
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
proxy_port='$proxy_port'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_affected_rows($conn)) {
      //echo "<script>alert('Config importada com sucesso!'); window.location='/config.php';</script>";
      $_SESSION['message'] = 'Importado com sucesso!';
      header('location: /config');
    } else {
      //echo "<script>alert('Erro!'); window.location='/config.php';</script>";
      $_SESSION['erro'] = 'Erro!';
      header('location: /config');
    }
  } else {
    //echo "<script>alert('Erro de syntax!');</script>";
    //echo "<script>alert('⚠️ Lembre-se de importar uma config por vez e verificar se há algo digitado incorretamente ⚠️'); window.location='/config.php';</script>";
    $_SESSION['erro'] = 'Erro de syntax!';
    header('location: /config');
  }
}

?>