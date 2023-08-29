<?php

include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");
session_start();

$id = mysqli_real_escape_string($conn, $_GET['id']);
$user_id = $_SESSION['user_id'];

if ($user_id != $_SESSION['user_id']) {
  header("Location: /config.php#ERRO1");
} else if (mysqli_real_escape_string($conn, $_GET['func']) == "clone_conf") {

  $sql = "SELECT * FROM config WHERE id='$id' LIMIT 1 ";
  $result = $conn -> query($sql);
  while ($user_data = mysqli_fetch_assoc($result)) {
    
    $id_conf = $user_data['user_id'];
    $name = $user_data['name'].' Copia';
    $config_v2ray = $user_data['config_v2ray'];
    $server_hostname = $user_data['server_hostname'];
    $description = $user_data['description'];
    $username = $user_data['username'];
    $server_port = $user_data['server_port'];
    $icon_image = $user_data['icon_image'];
    $password = $user_data['password'];
    $udp_port = $user_data['udp_port'];
    $category_id = $user_data['category_id'];
    $v2ray_uuid = $user_data['v2ray_uuid'];
    $primary_dns_server = $user_data['primary_dns_server'];
    $payload = $user_data['payload'];
    $status = $user_data['status'];
    $secondary_dns_server = $user_data['secondary_dns_server'];
    $sni = $user_data['sni'];
    $config_mode = $user_data['config_mode'];
    $url_check_user = $user_data['url_check_user'];
    $config_openvpn = $user_data['config_openvpn'];
    $proxy_hostname = $user_data['proxy_hostname'];
    $sort_order = $user_data['sort_order'];
    $proxy_port = $user_data['proxy_port'];
    $ovpn_config = $user_data['ovpn_config'];

    $sql = $conn->prepare("INSERT INTO config SET 
    user_id='$id_conf', 
    name='$name', 
    config_v2ray='$config_v2ray', 
    server_hostname='$server_hostname', 
    description='$description', 
    username='$username', 
    server_port='$server_port', 
    icon_image='$icon_image', 
    password='$password', 
    udp_port='$udp_port', 
    category_id='$category_id', 
    v2ray_uuid='$v2ray_uuid', 
    primary_dns_server='$primary_dns_server', 
    payload='$payload', 
    status='$status', 
    secondary_dns_server='$secondary_dns_server', 
    sni='$sni', 
    config_mode='$config_mode', 
    url_check_user='$url_check_user', 
    config_openvpn='$config_openvpn', 
    proxy_hostname='$proxy_hostname', 
    sort_order='$sort_order', 
    proxy_port='$proxy_port', 
    ovpn_config='$ovpn_config'");
    $sql->execute();

  }
  //echo "<script>alert('Config clonada com sucesso!'); window.location='/config.php';</script>";
  $_SESSION['message'] = 'Clonado com sucesso!';
  header("Location: /config");
} else {
  //echo "<script>alert('Erro ao clonar a config!'); window.location='/config.php';</script>";
  $_SESSION['erro'] = 'Erro ao clonar!';
  header('location: /config');
}
?>