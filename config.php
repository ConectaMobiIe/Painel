<!doctype html>
<html class="no-js h-100" lang="pt-BR" translate="no">
<link rel="shortcut icon" href="static/assets/img/favicon.png" />
<title>
PXH - Dashboard
</title>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/class/topo.php"); ?>
<body class="h-100">
<?php include_once($_SERVER['DOCUMENT_ROOT']."/class/topo2.php"); ?>

<div class="main-content-container container-fluid px-4">
<div class="page-header row no-gutters py-4">
<div class="col-12 col-sm-4 text-sm-left mb-0">
<center>
<span class="text-uppercase page-subtitle">Configurações</span>
<h3 class="page-title">Visão Geral</h3>
</center>
</div>
</div>
<div class="row">
<div class="col-lg-12 mb-4 p-0">
<div class="card card-small mb-4">
<div class="card-header border-bottom">
<div class="d-flex justify-content-between align-items-center flex-wrap">
<button type="button" class="btn btn-dark mb-1" data-bs-toggle="modal"
data-bs-target="#modal-config">
<i class="medium material-icons" style="font-size: 1rem;">add
</i> <span>Adicionar</span>

<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></button>
<ul class="dropdown-menu dropdown-menu-dark"
aria-labelledby="dropdownMenuButton2">
<li>
 <button type="button" class="dropdown-item" data-bs-toggle="modal"
data-bs-target="#import">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
  <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
</svg> <span>Importar</span>
</button> 
</li>
<li>
  <button type="button" class="dropdown-item" data-bs-toggle="modal"
data-bs-target="#" onclick="location.href='class/export.php';">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
  <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
</svg> <span>Exportar</span>
</button>
</li>
<li>
<button type="button" class="dropdown-item" data-bs-toggle="modal"
data-bs-target="#delet_all">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg> <span>Deletar tudo</span>
</button>
</li>
</ul>


</div>
</div>
<div class="card-body p-2 pb-3 text-center">
<div class="table-responsive">
<table class="table table-striped mb-5">
<thead class="bg-light">
<tr>

<th scope="col" class="border-0">Logo</th>
<th scope="col" class="border-0">Nome</th>
<th scope="col" class="border-0">Categoria</th>
<th scope="col" class="border-0">Ordem</th>
<th scope="col" class="border-0">Modo</th>
<th scope="col" class="border-0">Status</th>
<th scope="col" class="border-0">Ações</th>
</tr>
</thead>
<tbody>
<?php
$result_produtos = "SELECT * FROM config WHERE user_id LIKE '$db_user_id' ORDER BY category_id,LENGTH(sort_order), sort_order";
$resultado_produtos = mysqli_query($conn, $result_produtos);
while($row_produto = mysqli_fetch_assoc($resultado_produtos)){
$db_usuario = $row_produto['info1'];
$db_cat_id = $row_produto['id'];
$db_cat_name = $row_produto['name'];
$db_cat_config_v2ray = $row_produto['config_v2ray'];
$db_cat_server_hostname = $row_produto['server_hostname'];
$db_cat_description = $row_produto['description'];
$db_cat_username = $row_produto['username'];
$db_cat_server_port = $row_produto['server_port'];
$db_cat_icon_image = $row_produto['icon_image'];
$db_cat_user_id = $row_produto['user_id'];
$db_cat_password = $row_produto['password'];
$db_cat_udp_port = $row_produto['udp_port'];
$db_cat_category_id = $row_produto['category_id'];
$db_cat_v2ray_uuid = $row_produto['v2ray_uuid'];
$db_cat_primary_dns_server = $row_produto['primary_dns_server'];
$db_cat_payload = $row_produto['payload'];
$db_cat_status = $row_produto['status'];
$db_cat_secondary_dns_server = $row_produto['secondary_dns_server'];
$db_cat_sni = $row_produto['sni'];
$db_cat_config_mode = $row_produto['config_mode'];
$db_cat_url_check_user = $row_produto['url_check_user'];
$db_cat_config_openvpn = $row_produto['ovpn_config'];
$db_cat_proxy_hostname = $row_produto['proxy_hostname'];
$db_cat_sort_order = $row_produto['sort_order'];
$db_cat_proxy_port = $row_produto['proxy_port'];
$db_cat_ovpn_config = $row_produto['ovpn_config'];


if($ord_or3 <= $db_cat_sort_order ){
    $ord_or3 = $db_cat_sort_order+1;
}

if($db_cat_status == "ACTIVE"){

    $cor_active = ' badge-success"';

    $txt_active = 'Ativo';
    
}else{
    $cor_active = '" style="background-color: red;"';
    $txt_active = 'Desativado';
}

$db_cat_test = "TEST T394#(";


$db_cat_cat_name = "Sem categoria ";
$db_cat_cat_id = "Sem categoria ";
$db_cat_cat_status = "Sem categoria ";
$db_cat_cat_sort_order = "Sem categoria ";
$db_cat_cat_user_id = "Sem categoria ";
$db_cat_cat_slug = "Sem categoria ";
$db_cat_cat_description = "Sem categoria ";
$db_cat_cat_category_color = "Sem categoria ";


$result_produtos2 = "SELECT * FROM categoria WHERE id='$db_cat_category_id' && user_id LIKE '$db_user_id' LIMIT 1";
$resultado_produtos2 = mysqli_query($conn, $result_produtos2);
while($row_produto2 = mysqli_fetch_assoc($resultado_produtos2)){
$db_cat_cat_name = $row_produto2['name'];
$db_cat_cat_id = $row_produto2['id'];
$db_cat_cat_status = $row_produto2['status'];
$db_cat_cat_sort_order = $row_produto2['sort_order'];
$db_cat_cat_user_id = $row_produt2o['user_id'];
$db_cat_cat_slug = $row_produto2['slug'];
$db_cat_cat_description = $row_produto2['description'];
$db_cat_cat_category_color = $row_produto2['category_color'];

}


$db_cat_value = '"{

\"edit_qual\": \"EDIT\", 
\"edit_qual_id\": \"'.$db_cat_category_id.'\",
\"name\": \"'.$db_cat_name.'\", 
\"config_v2ray\": \"'.$db_cat_config_v2ray.'\", 
\"server_hostname\": \"'.$db_cat_server_hostname.'\", 
\"description\": \"'.$db_cat_description.'\", 
\"username\": \"'.$db_cat_username.'\",
\"server_port\": \"'.$db_cat_server_port.'\", 
\"icon_image\": \"'.$db_cat_icon_image.'\", 
\"user_id\": \"'.$db_cat_user_id.'\", 
\"password\": \"'.$db_cat_password.'\", 
\"udp_port\": \"'.$db_cat_udp_port.'\", 
\"category_id\": \"'.$db_cat_category_id.'\", 
\"v2ray_uuid\": \"'.$db_cat_v2ray_uuid.'\",
\"primary_dns_server\": \"'.$db_cat_primary_dns_server.'\", 
\"payload\": \"'.$db_cat_payload.'\", 
\"status\": \"'.$db_cat_status.'\", 
\"secondary_dns_server\": \"'.$db_cat_secondary_dns_server.'\",
\"sni\": \"'.$db_cat_sni.'\", 
\"config_mode\": \"'.$db_cat_config_mode.'\", 
\"url_check_user\": \"'.$db_cat_url_check_user.'\", 
\"config_openvpn\": \"'.$db_cat_config_openvpn.'\", 
\"proxy_hostname\": \"'.$db_cat_proxy_hostname.'\",
\"sort_order\": '.$db_cat_sort_order.', 
\"id\": '.$db_cat_id.', 
\"proxy_port\": \"'.$db_cat_proxy_port.'\",
\"ovpn_config\": \"'.$db_cat_ovpn_config.'\",
\"config_openvpn\": \"'.$db_cat_ovpn_config.'\",

\"category\": {

\"name\": \"'.$db_cat_cat_name.'\",
\"id\": \"'.$db_cat_cat_id.'\", 
\"status\": \"'.$db_cat_cat_status.'\", 
\"sort_order\": \"'.$db_cat_cat_sort_order.'\", 
\"user_id\": \"'.$db_cat_cat_user_id.'\", 
\"slug\": \"'.$db_cat_cat_slug.'\",
\"description\": \"'.$db_cat_cat_description.'\", 
\"category_color\": \"'.$db_cat_cat_category_color.'\"
    
    
}}"';
?>
<tr>
<input type="value" id="config_json_<?php echo $db_cat_id; ?>" value='<?php echo $db_cat_value; ?>' hidden>
<?php
echo '
<td><img class="d-inline-block align-top mr-1" style="max-width: 40px;" src='.$db_cat_icon_image.'></td>
<td><i><p class="card-text d-inline-block mb-3">
          <span class="badge badge-pill badge-dark">'.$db_cat_name.'</span>
        </p>
        </td>
<td><i><p class="card-text d-inline-block mb-3">
          <span class="badge badge-pill badge-dark">'.$db_cat_cat_name.'</span>
        </p></td>
<td><i><p class="card-text d-inline-block mb-3">
          <span class="badge badge-pill badge-dark">'.$db_cat_sort_order.'</span>
        </p></td>
<td><i><p class="card-text d-inline-block mb-3">
          <span class="badge badge-pill badge-dark">'.$db_cat_config_mode.'</span>
        </p></td>

<td><i>
<span class="badge badge-pill '.$cor_active.'>'.$txt_active.'</span>
<td>

<button class="btn btn-dark btn-sm dropdown-toggle" type="button"
id="dropdownMenuButton2" data-bs-toggle="dropdown"
aria-expanded="true">
<i class="material-icons">more_vert</i>
</button>
<ul class="dropdown-menu dropdown-menu-dark"
aria-labelledby="dropdownMenuButton2">
<li>
<button class="dropdown-item" data-bs-toggle="modal"
data-bs-target="#modal-config"
data-bs-config-id="'.$db_cat_id.'">
<i class="material-icons">edit</i> Editar
</button>
</li>
<li>
<a class="dropdown-item" href="/class/salvar-config.php?func=del_cat&id='.$db_cat_id.'">
<i class="material-icons">delete</i> Excluir
</a>
</li>
<li>
<a class="dropdown-item" href="/class/salvar-config.php?func=habilit_cat&id='.$db_cat_id.'">
<i class="material-icons">check_circle</i> Ativar
</a>
</li>
<li>
<a class="dropdown-item" href="/class/salvar-config.php?func=desab_cat&id='.$db_cat_id.'">
<i class="material-icons">block</i> Desativar
</a>
</li>
<li>
<a class="dropdown-item" href="class/func_clone.php?func=clone_conf&id='.$db_cat_id.'">
<i class="material-icons">content_copy</i> DUPLICAR
</a>
</li>
</ul>

</td>
</tr>
';
}
?>
</tbody>
</table>
</div>
</div>
<div class="modal fade" id="modal-config" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">CONFIGURAÇÃO</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body text-start">
<form action="/class/salvar-config.php" method="POST" enctype="multipart/form-data" name="form-config">
<input id="csrf_token" name="csrf_token" type="hidden" value="">
<input class="form-control" id="edit_qual" type="hidden" name="edit_qual" value="edit_qual">
<input class="form-control" id="edit_qual_id" type="hidden" name="edit_qual_id" value="edit_qual_id">


<div class="col-md-12 mb-3">
<label class="form-label" for="status">Status</label>
<select class="form-select" id="status" name="status" onchange="onChangeConfigMode()">
<option value="ACTIVE" <?php if( $row_produto['status'] != "INACTIVE" ){ echo "selected"; } ?>>Ativo</option>
<option value="INACTIVE" <?php if( $row_produto['status'] == "INACTIVE" ){ echo "selected"; } ?>>Inativo</option>
</select>
</div>


<div class="col-md-12 mb-3">
<label class="form-label" for="config_mode">Modo de Conexão</label>
<select class="form-select" id="config_mode" name="config_mode" onchange="onChangeConfigMode()">
<option selected value="SSH_DIRECT">SSH Direct</option>
<option value="SSL_DIRECT">SSL Direct</option>
<option value="SSH_PROXY">SSH Proxy</option>
<option value="SSL_PROXY">SSL Proxy</option>
<option value="OVPN_PROXY">OpenVPN Proxy</option>
<option value="OVPN_SSL">OpenVPN SSL</option>
<option value="OVPN_SSL_PROXY">OpenVPN SSL Proxy</option>
<option value="V2RAY">V2Ray</option>
<option value="V2RAY_PROXY">V2Ray Proxy</option>
<option value="V2RAY_SSL_PROXY">V2Ray SSL Proxy</option>
</select>
</div>


<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label" for="name">Nome da Configuração</label>
<input class="form-control" id="name" maxlength="256" minlength="1" name="name" required type="text" value="">
</div>
<div class="col-md-6 mb-3">
<label class="form-label" for="description">Descrição (opcional)</label>
<input class="form-control" id="description" maxlength="256" minlength="0" name="description" type="text" value="">
</div>
</div>
<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label" for="category">Selecione a Categoria</label>
<select class="form-select" id="category" name="category">

<?php
$result_produtos3 = "SELECT * FROM categoria WHERE user_id LIKE '$db_user_id' ORDER BY id";
$resultado_produtos3 = mysqli_query($conn, $result_produtos3);
while($row_produto3 = mysqli_fetch_assoc($resultado_produtos3)){
$db_cat_cat_name_input = $row_produto3['name'];
$db_cat_cat_id_input = $row_produto3['id'];

echo '<option value="'.$db_cat_cat_id_input.'">'.$db_cat_cat_name_input.'</option>';
}

?>
</select>
</div>
<div class="col-md-6 mb-3">
<label class="form-label" for="sort_order">Ordem de Exibição</label>
<input class="form-control" id="sort_order" name="sort_order" required type="number" value="<?php echo $ord_or3; ?>">
</div>
</div>
<div class="row">
<div class="col-md-12 mb-3">
<label class="form-label" for="config_v2ray">Configuração V2RAY</label>
<textarea class="form-control" id="config_v2ray" minlength="0" name="config_v2ray" rows="3"></textarea>
</div>
</div>
<div class="row">
<div class="col-md-12 mb-3">
<label class="form-label" for="ovpn_config">Configuração OVPN</label>
<textarea class="form-control" id="ovpn_config" minlength="0" name="ovpn_config" rows="3"></textarea>
</div>
</div>
<div class="row">
<div class="col-md-12 mb-3">
<label class="form-label" for="payload">PAYLOAD (opcional)</label>
<textarea class="form-control" id="payload" minlength="0" name="payload" rows="3"></textarea>
</div>
</div>
<div class="row">
<div class="col-md-12 mb-3">
<label class="form-label" for="sni">SNI (opcional)</label>
<input class="form-control" id="sni_config" maxlength="256" minlength="0" name="sni" type="text" value="">
</div>
</div>
<div class="row">
<div class="col-md-6-proxy col-md-6 mb-3">
<label class="form-label" for="proxy_hostname">IP/Host do Proxy</label>
<input class="form-control" id="proxy_hostname" name="proxy_hostname" type="text" value="">
</div>
<div class="col-md-6-port col-md-6 mb-3">
<label class="form-label" for="proxy_port">Porta Proxy</label>
<input class="form-control" id="proxy_port" max="65535" min="1" name="proxy_port" type="number" value="80">
</div>
</div>
<div class="row">
<div class="col-md-6-proxy col-md-6 mb-3">
<label class="form-label" for="server_hostname">IP/Host do Servidor</label>
<input class="form-control" id="server_hostname" name="server_hostname" type="text" value="">
</div>
<div class="col-md-6-port col-md-6 mb-3">
<label class="form-label" for="server_port">Porta</label>
<input class="form-control" id="server_port" max="65535" min="1" name="server_port" type="number" value="443">
</div>
</div>
<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label" for="primary_dns_server">Servidor DNS Primário</label>
<input class="form-control" id="primary_dns_server" maxlength="256" minlength="1" name="primary_dns_server" required type="text" value="8.8.8.8">
</div>
<div class="col-md-6 mb-3">
<label class="form-label" for="secondary_dns_server">Servidor DNS Secundário</label>
<input class="form-control" id="secondary_dns_server" maxlength="256" minlength="0" name="secondary_dns_server" type="text" value="8.8.4.4">
</div>
</div>
<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label" for="username">Nome de usuario (opcional)</label>
<input class="form-control" id="username" maxlength="256" minlength="0" name="username" type="text" value="">
</div>
<div class="col-md-6 mb-3">
<label class="form-label" for="password">Senha (opcional)</label>
<input class="form-control" id="password" maxlength="256" minlength="0" name="password" type="text" value="">
</div>
</div>
<div class="row">
<div class="col-md-12 mb-3">
<label class="form-label" for="v2ray_uuid">UUID (opcional)</label>
<input class="form-control" id="v2ray_uuid" maxlength="256" minlength="0" name="v2ray_uuid" type="text" value="">
</div>
</div>
<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label" for="udp_port">Porta UDP (7100,7200,7300 ...)</label>
<input class="form-control" id="udp_port" name="udp_port" required type="text" value="7300">
</div>
<div class="col-md-6 mb-3">
<label class="form-label" for="url_check_user">URL Check User</label>
<input class="form-control" id="url_check_user" maxlength="256" minlength="0" name="url_check_user" type="url" value="">
</div>
</div>

<div class="col-md-100 mb-3">
<label class="form-label" for="icon_image">URL Flag</label>
<input class="form-control" id="icon_image" maxlength="256" minlength="0" name="icon_image" type="url" value="">
</div>
</div>
<div class="modal-footer p-0 pt-2">
<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button> <input class="btn btn-dark" id="submit" name="submit" type="submit" value="SALVAR">
</div>
</form>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal-view-icon-image" aria-hidden="true" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalToggleLabel2">ICONE DE CONFIGURAÇÃO</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<img src="#" class="img-fluid" alt="" id="icon-image">
</div>
</div>
</div>
<div class="modal-footer">
<button class="btn btn-primary" data-bs-target="#modal-config" data-bs-toggle="modal"
data-bs-config-id="" data-bs-modal-id="" id="back-modal-view-icon-image">Voltar</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal-check-config" aria-hidden="true" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalToggleLabel2">TOTAL DE CONEXÕES</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12" id="check-config-result">
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
</div>
<div class="modal fade" id="delet_all" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <center>
          <img id="main-logo" class="d-inline-block align-top mr-1" src="https://i.imgur.com/IoBKANK.png" width="150" height="150" alt="Shards Dashboard"></img>
            <h5>Deseja realmente deletar todas as configurações?</h5>
        </center>
      </div>
      <div class="modal-footer">
        <a href="/class/del_config_user.php?func=del_conf2&id=" type="button" class="btn btn-outline-danger" id="delete">Apagar</a>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<style>
  textarea {
    width: 100%;
  }
  h6 {
    color: red;
  }
</style>

<div class="modal fade" id="import" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <form method="POST" action="/class/import.php?func=config">
      <div class="modal-body">
        <center>
        <h5>Somente uma config por vez!!!</h5>
        <h6>Em fase de testes!!!</h6>
          <hr>
          <textarea id="imp" name="imp" rows="15"></textarea>
        </center>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success" id="importar" data-bs-dismiss="modal">Importar</button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
<script src="static/assets/js/extras.1.1.0.min.js"></script>
<script src="static/assets/js/shards-dashboards.1.1.0.min.js"></script>
<script>
function doSearch(e) {
let search = document.getElementById('search').value;
let attr = e.getAttribute('href');
if (attr.indexOf('search') > -1) {
let split = attr.split('&');
for (let i = 0; i < split.length; i++) {
if (split[i].indexOf('search') > -1) {
split[i] = 'search=' + search;
}
}
attr = split.join('&');
} else {
attr += '&search=' + search;
}
e.setAttribute('href', attr);
}
</script>
<script>
$('#modal-check-config').on('show.bs.modal', function (event) {
var button = event.relatedTarget
var url_check_user = button.getAttribute('data-bs-check-url')
if (url_check_user)
url_check_user += '/all_connections'
var url_check_user = window.location.origin + '/config/check?url_check=' + url_check_user
var modal = $(this)
html = '<div class="d-flex justify-content-center">';
html += '<div class="spinner-border" role="status">'
html += '<span class="sr-only">Loading...</span>'
html += '</div>'
html += '</div>'
modal.find('#check-config-result').html(html)
$.ajax({
url: url_check_user,
type: 'GET',
success: function (data) {
let is_success = data.success
let error_message = data.error
let count = data.count
if (is_success) {
var html = '<div class="alert alert-success">' +
'<strong>Sucesso!</strong> ' +
'<p>' +
'<strong>' + count + '</strong> Total de conexoes' +
'</p>' +
'</div>'
} else {
var html = '<div class="alert alert-danger">' +
'<strong>Erro!</strong> ' +
'<p>' +
'<strong>' + error_message + '</strong>' +
'</p>' +
'</div>'
}
modal.find('#check-config-result').html(html)
}
})
})
</script>
<script>
let default_form_config = $('form[name="form-config"').serializeArray().reduce(function (a, x) { a[x.name] = x.value; return a; }, {});
function onChangeConfigMode() {
let form = $('form[name="form-config"').serializeArray();
form.forEach(function (item) {
if (item.name == 'sni')
item.name = 'sni_config';
$('#' + item.name).parent().show();
});
ssh_hide_fields = ['config_v2ray', 'v2ray_uuid', 'ovpn_config', 'sni_config']
ssh_hide_fields_direct = ssh_hide_fields.concat(['proxy_hostname', 'proxy_port'])
ssl_hide_fields = ['config_v2ray', 'v2ray_uuid', 'ovpn_config', 'payload', 'proxy_hostname', 'proxy_port']
ssl_hide_fields_proxy = ['config_v2ray', 'v2ray_uuid', 'ovpn_config']
ovpn_hide_fields = ['config_v2ray', 'v2ray_uuid', 'sni_config', 'server_hostname', 'server_port', 'udp_port']
ovpn_hide_fields_ssl = ['config_v2ray', 'v2ray_uuid', 'payload', 'server_hostname', 'server_port', 'udp_port']
ovpn_hide_fields_ssl_proxy = ['config_v2ray', 'v2ray_uuid', 'server_hostname', 'server_port', 'udp_port']
v2ray_hide_fields = [
'payload',
'proxy_hostname',
'proxy_port',
'sni_config',
'ovpn_config',
'server_hostname',
'server_port',
'udp_port',
'username',
'password',
'primary_dns_server',
'secondary_dns_server'
]
v2ray_hide_fields_proxy = v2ray_hide_fields.slice(3, v2ray_hide_fields.length)
v2ray_hide_fields_proxy_ssl = v2ray_hide_fields.slice(4, v2ray_hide_fields.length)
let data_hide_field = {
'SSH_DIRECT': ssh_hide_fields_direct,
'SSH_PROXY': ssh_hide_fields,
'SSL_DIRECT': ssl_hide_fields,
'SSL_PROXY': ssl_hide_fields_proxy,
'OVPN_PROXY': ovpn_hide_fields,
'OVPN_SSL': ovpn_hide_fields_ssl,
'OVPN_SSL_PROXY': ovpn_hide_fields_ssl_proxy,
'V2RAY': v2ray_hide_fields,
'V2RAY_PROXY': v2ray_hide_fields_proxy,
'V2RAY_SSL_PROXY': v2ray_hide_fields_proxy_ssl,
}
let configMode = form.find(function (element) {
return element.name == 'config_mode';
});
let fields = data_hide_field[configMode.value];
fields.forEach(function (field) {
$('#' + field).parent().hide();
});
}
$('#modal-config').on('show.bs.modal', function (event) {
onChangeConfigMode();
let all_fields = $(this).find('input, select, textarea');
let config_id = event.relatedTarget.getAttribute('data-bs-config-id')
let config = default_form_config;
$('form[name="form-config"').attr('action', '/class/salvar-config.php?ed=ADD&ida=');
if (config_id != null) {
let data = $('#config_json_' + event.relatedTarget.getAttribute('data-bs-config-id'));
config = JSON.parse(JSON.parse(data.val()));
config.payload = config.payload.replace(/99r99/g, '\\r');
config.payload = config.payload.replace(/99n99/g, '\\n');
$('form[name="form-config"').attr('action', '/class/salvar-config.php?ed=EDIT&ida=' + config_id + '');
}
for (let i = 0; i < all_fields.length; i++) {
let field = all_fields[i];
let fieldName = field.getAttribute('name');
let fieldValue = config[fieldName];
if (fieldName == 'config_mode')
fieldValue = fieldValue.toUpperCase();
if (fieldName == 'category')
fieldValue = config.category_id;
if (fieldName == 'config_v2ray')
fieldValue = config.config_v2ray;
if (fieldName == 'ovpn_config')
fieldValue = config.config_openvpn;
if (fieldName == 'icon_image') {
let btn = $('#btn_view_icon_image');
btn.attr('data-bs-whatever', fieldValue)
btn.attr('data-bs-config-id', config_id)
field.setAttribute('value', fieldValue);
continue;
}
if (fieldValue != null) {
field.value = fieldValue;
}
}
onChangeConfigMode();
})
function toggleConfigStatus(e) {
e.value = 'on' == e.value ? 'off' : 'on';
const url_active = window.location.origin + '' + e.attributes.id.value.split(':')[1] + '/activate';
const url_inactive = window.location.origin + '' + e.attributes.id.value.split(':')[1] + '/deactivate';
const url = e.value == 'on' ? url_active : url_inactive;
$.ajax({
url: url,
type: 'GET',
success: function (data) {
}
});
}
var modal = document.getElementById('modal-view-icon-image');
modal.addEventListener('show.bs.modal', function (event) {
var button = event.relatedTarget;
let image = button.getAttribute('data-bs-whatever');
let config_id = button.getAttribute('data-bs-config-id');
let icon_image = document.getElementById('icon-image');
var modal = document.getElementById('back-modal-view-icon-image');
modal.setAttribute('data-bs-config-id', config_id);
var user_id = image.split('_')[0];
var url = 'picture/' + user_id + '/' + image;
icon_image.setAttribute('src', url);
});
modal.addEventListener('hide.bs.modal', function (event) {
let btn = $('#back-modal-view-icon-image');
btn.click();
});


var modal = document.getElementById('modal-view-icon-image');
    modal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        let url = button.getAttribute('data-bs-whatever');
        let config_id = button.getAttribute('data-bs-config-id');

        let load = $('#loadding_icon_image');
        let error = $('#error_icon_image');
        let icon_img = $('#icon_image');

        load.show();
        icon_img.hide();

        icon_img.attr('src', url);
        icon_img.attr('data-bs-config-id', config_id);

        icon_img.on('load', function () {
            load.remove();
            icon_img.show();
        });

        icon_img.on('error', function () {
            load.remove();
            error.show();
        });

        var modal = document.getElementById('back-modal-view-icon-image');
        modal.setAttribute('data-bs-config-id', config_id);
    });

    modal.addEventListener('hide.bs.modal', function (event) {
        let btn = $('#back-modal-view-icon-image');
        btn.click();
    });



</script>
<?php

  if (isset($_SESSION['message'])) {

    ?>
    <script>
      Toastify({
        text: "<?php echo $_SESSION['message']; ?>",
        gravity: "top",
        position: "right",
        className: "info",
        duration: 3000,
        close: true,
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        }
      }).showToast();
    </script>
    <?php
    unset($_SESSION['message']);
    unset($_SESSION['erro']);
  }
  ?>
<?php
  if (isset($_SESSION['erro'])) {
    ?>
    <script>
      Toastify({
        text: "<?php echo $_SESSION['message']; ?>",
        gravity: "top",
        position: "right",
        className: "info",
        duration: 3000,
        close: true,
        style: {
          background: "linear-gradient(to right, #b00000, #c93d3d)",
        }
      }).showToast();
    </script>
    <?php
    unset($_SESSION['erro']);
    unset($_SESSION['message']);
  }
  ?>
</body>
</html>