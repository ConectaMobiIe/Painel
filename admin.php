<!doctype html>
<html class="no-js h-100" lang="pt-BR" translate="no">
<link rel="shortcut icon" href="static/assets/img/favicon.png" />
<title>
PXH - Dashboard
</title>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/class/topo.php"); ?>
<body class="h-100">
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/class/topo2.php");
include_once($_SERVER['DOCUMENT_ROOT']."/class/enc.php");
?>
<style>
nav {
background-color: white;
}
body {
background-color: #f2f2f2;
}
</style>
<?php
if($db_usuario_acess == "9"){
}else{
echo "<center><br><h1>REDIRECIONANDO...</h1><br></center>";
exit;
}
?>
<div class="main-content-container container-fluid px-4">
<div class="page-header row no-gutters py-4">
<div class="col-12 col-sm-4 text-sm-left mb-0">
<center>
<span class="text-uppercase page-subtitle">Usuários</span>
<h3 class="page-title">Visão Geral</h3>
</center>
</div>
</div>
<div class="row">
<div class="col-lg-12 mb-4 p-0">
<div class="card card-small mb-4">
<div class="card-header border-bottom">
<div class="d-flex justify-content-between align-items-center">
<!--<h6 class="m-1">Categorias</h6>-->
<button type="button" class="btn btn-dark btn-custom" data-bs-toggle="modal"
data-bs-target="#modal-category"><i class="medium material-icons"
style="font-size: 1rem;">add</i> <span>Adicionar</span>
</button>
</div>
</div>
<div class="card-body p-2 pb-3 text-center">
<div class="table-responsive">
<table class="table table-striped mb-3">
<thead class="bg-light">
<tr>
<th scope="col" class="border-0">#</th>
<th scope="col" class="border-0">Nome</th>
<th scope="col" class="border-0">Login</th>
<th scope="col" class="border-0">Expirar</th>
<th scope="col" class="border-0">Permissão</th>
<!--<th scope="col" class="border-0">Token</th>-->
<!--
<th scope="col" class="border-0">Status</th>
-->
<th scope="col" class="border-0">Ações</th>
</tr>
</thead>
<tbody>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");
$result_produtos_cat = "SELECT * FROM usuario ";
$resultado_produtos_cat = mysqli_query($conn, $result_produtos_cat);
while($row_produto_cat = mysqli_fetch_assoc($resultado_produtos_cat)){
$db_adm_user_id = $row_produto_cat['id'];
$db_adm_user = $row_produto_cat['user'];
$db_adm_login = $row_produto_cat['login'];
$db_adm_pass1 = $row_produto_cat['pass'];
$db_adm_expirar = $row_produto_cat['expirar'];
$db_adm_permiss = $row_produto_cat['permiss'];
$db_adm_token = $row_produto_cat['token'];
if($db_adm_permiss == "9"){
$db_usuario_acess_name = "Dono";
}else if($db_adm_permiss == "7"){
$db_usuario_acess_name = "Revendedor";
}else if($db_adm_permiss == "5"){
$db_usuario_acess_name = "Usuario";
}else if($db_adm_permiss == "4"){
$db_usuario_acess_name = "Membro";
}else if($db_adm_permiss == "3"){
$db_usuario_acess_name = "Expirado";
}else{
$db_usuario_acess_name = "";
}

if($db_cat_status == "ACTIVE"){
$cor_active = ' badge-success"';
$txt_active = 'Ativo';
}else{
$cor_active = '" style="background-color: red;"';
$txt_active = 'Desativado';
}
$db_adm_pass = AESCrypt::decrypt($key, $db_adm_pass1);
$db_cat_value = '"{\"edit_qual\": \"EDIT\", \"edit_qual_id\": \"'.$db_adm_user_id.'\", \"user\": \"'.$db_adm_user.'\", \"pass\": \"'.$db_adm_pass.'\", \"token\": \"'.$db_adm_token.'\", \"status\": \"ACTIVE\", \"login\": \"'.$db_adm_login.'\", \"expirar\": \"'.$db_adm_expirar.'\", \"permiss\": \"'.$db_adm_permiss.'\"}"';
?>
<style>
  p {
    white-space: nowrap
  }
</style>
<input type="hidden" id="category_<?php echo $row_produto_cat['id'];?>"
value='<?php echo $db_cat_value; ?>'>
<?php
$data_1 = $row_produto_cat['expirar'];
$data_2 = strtotime($data_1);
$validade = date('d/m/Y', $data_2);
if ($row_produto_cat['permiss'] == 3) {
  $p_validade = '<span class="badge badge-pill badge-outline-danger"><b>'.$db_usuario_acess_name.' </b><b>('.$row_produto_cat['permiss'].')</b></span>';
} elseif ($row_produto_cat['permiss'] == 5) {
  $p_validade = '<span class="badge badge-pill badge-outline-primary"><b>'.$db_usuario_acess_name.' </b><b>('.$row_produto_cat['permiss'].')</b></span>';
}else{
  $p_validade = '<span class="badge badge-pill badge-outline-dark"><b>'.$db_usuario_acess_name.' </b><b>('.$row_produto_cat['permiss'].')</b></span>';
}
$data_consultar_user = date($row_produto_cat['expirar']);
$dt_calc_user = strtotime($data_consultar_user) - strtotime($data_atual);
$dias_user = floor($dt_calc_user/(60 * 60 * 24));
echo '
<tr>
<td><p class="card-text d-inline-block mb-3"><b>'.$row_produto_cat['id'].'</b>
</p></td>
<td><p class="card-text d-inline-block mb-3"><b>'.$row_produto_cat['user'].'</b>
</p></td>
<td><p class="card-text d-inline-block mb-3"><b>'.$db_adm_login.'
</b></p></td>
<td><p class="card-text d-inline-block mb-3"><b>'.$dias_user.' dias ('.$validade.')
</b></p></td>
<td><p class="card-text d-inline-block mb-3"><b>
'.$p_validade.'</b>
</p></td>
<!--
<td>
<span class="badge badge-pill" style="background-color: '.$row_produto_cat['category_color'].'">
'.$row_produto_cat['category_color'].'
</span>
</td>
<td>
<span class="badge badge-pill '.$cor_active.'>'.$txt_active.'</span>
</td>
-->
<td>
<div class="btn-group dropend">
<button class="btn btn-dark dropdown-toggle" type="button"
id="dropdownMenuButton2" data-bs-toggle="dropdown"
aria-expanded="false">
<i class="material-icons">more_vert</i>
</button>
<ul class="dropdown-menu dropdown-menu-dark"
aria-labelledby="dropdownMenuButton2">
<li>
<button class="dropdown-item" data-bs-toggle="modal"
data-bs-target="#modal-category"
data-bs-category-id="'.$row_produto_cat['id'].'">
<i class="material-icons">edit</i> Editar
</button>
</li>
<!--<li>
<a class="dropdown-item"
href="class/salvar-admin.php?func=desab_cat&id='.$row_produto_cat['id'].'">
<i class="material-icons">block</i> Desativar
</a>
</li>-->
<li>
<a class="dropdown-item"
href="class/func_del.php?func=del_user&id='.$row_produto_cat['id'].'">
<i class="material-icons">delete</i> Excluir
</a>
</li>
</ul>
</div>
</td>
</tr>
';
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal-category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">CATEGORIA</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body text-start">
<form action="/class/salvar-admin.php" method="POST">
<input id="csrf_token" name="csrf_token" type="hidden" value="">
<input class="form-control" type="hidden" name="tipox" value="categoria">
<input class="form-control" id="edit_qual" type="hidden" name="edit_qual" value="edit_qual">
<input class="form-control" id="edit_qual_id" type="hidden" name="edit_qual_id" value="edit_qual_id">
<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label" for="user">User</label>
<input class="form-control" id="user" maxlength="30" minlength="2" name="user" required type="text" value="">
</div>
<div class="col-md-6 mb-3">
<label class="form-label" for="login">Login</label>
<input class="form-control" data="6" id="login" name="login" required type="text" value="">
</div>
</div>
<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label" for="expirar">Expirar</label>
<input class="form-control" id="expirar" maxlength="30" minlength="2" name="expirar" required type="date" value="">
</div>
<div class="col-md-6 mb-3">
<label class="form-label" for="pass">Senha</label>
<input class="form-control" data="6" id="pass" name="pass" required type="text" value="">
</div>
</div>
<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label" for="permiss">Permissão</label>
<select class="form-select" id="permiss" name="permiss" required>
<option value="9">Dono</option>
<option></option>
<option value="7">Revendedor</option>
<option></option>
<option value="5">Usuario</option>
<option value="3">Vencido</option>
</select>
</div>
<div class="col-md-6 mb-3">
<label class="form-label" for="token">Token</label>
<input class="form-control" data="6" id="token" name="token" required type="text" value="">
</div>
</div>
<!--
<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label" for="category_color">Cor da categoria</label>
<input class="form-control" id="category_color" name="category_color" type="text" value="#434343">
<input type="color" class="form-control mt-1"
onchange="javascript:$('#category_color').val(this.value);"
value="#434343" id="category_color_picker">
<input type="range" class="form-range" min="0" max="100" step="1" id="category_color_alpha">
</div>
<div class="col-md-6 mb-3">
<label class="form-label" for="status">Status</label>
<select class="form-select" id="status" name="status" required><option value="ACTIVE">Ativo</option><option value="INACTIVE">Inativo</option></select>
</div>
</div>
-->
<div class="modal-footer p-0 pt-2">
<button type="button" class="btn btn-outline-accent" data-bs-dismiss="modal">Fechar</button>
<input class="btn btn-accent" id="submit" name="submit" type="submit" value="SALVAR">
</div>
</form>
</div>
</div>
</div>
</div>
</main>
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
$('#modal-category').on('shown.bs.modal', function (event) {
let category_id = event.relatedTarget.getAttribute('data-bs-category-id')
if (!category_id) {
$('#user').val('User <?php $gerador = rand(4,4); $valor = substr(str_shuffle("0123456789abcdefghijlkmnopqrstuvxyzw0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $gerador); echo $valor; ?>')
$('#login').val('<?php $gerador = rand(8,8); $valor = substr(str_shuffle("0123456789abcdefghijlkmnopqrstuvxyzw0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $gerador); echo $valor; ?>')
$('#expirar').val('')
$('#permiss').val('5')
$('#pass').val('<?php $gerador = rand(8,8); $valor = substr(str_shuffle("0123456789abcdefghijlkmnopqrstuvxyzw0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $gerador); echo $valor; ?>')
$('#token').val('<?php $gerador = rand(20,20); $valor = substr(str_shuffle("0123456789abcdefghijlkmnopqrstuvxyzw0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $gerador); echo $valor; ?>')
$('#edit_qual').val('')
$('#edit_qual_id').val('')
$('#sort_order').val('')
$('#status').val($('#status option:first').val())
$('#category_color').val('#434343')
return
}
$('form[action="category/create"').attr('action', '/category/' + category_id + '/update');
let category_data = $('#category_' + category_id).val()
let category_data_obj = JSON.parse(JSON.parse(category_data))
$('#user').val(category_data_obj.user)
$('#login').val(category_data_obj.login)
$('#pass').val(category_data_obj.pass)
$('#expirar').val(category_data_obj.expirar)
$('#permiss').val(category_data_obj.permiss)
$('#token').val(category_data_obj.token)
$('#edit_qual').val(category_data_obj.edit_qual)
$('#edit_qual_id').val(category_data_obj.edit_qual_id)
$('#sort_order').val(category_data_obj.sort_order)
$('#status').val(category_data_obj.status)
let color = category_data_obj.category_color.split('#')[1]
if (color.length == 8) {
let alpha = parseInt(color.substring(0, 2), 16)
$('#category_color_alpha').val(parseFloat(alpha / 255 * 100))
}
$('#category_color_picker').val('#' + (color.length == 8 ? color.substring(2, color.length) : color))
$('#category_color').val(category_data_obj.category_color)
});
function alphaHexColor(number) {
let alphaFixed = number.toFixed(2) * 255;
let alphaHex = alphaFixed.toString(16);
let split = alphaHex.split('.');
return split[0].length == 1 ? '0' + split[0] : split[0];
}
$('#category_color_alpha').on('input', function () {
let alpha = parseFloat(this.value) / 100;
let color = $('#category_color').val();
color = color.replace('#', '');
if (color.length == 8) {
color = color.substring(2, 8);
}
let hex = alphaHexColor(alpha);
let hexColor = hex + color;
$('#category_color').val('#' + hexColor);
});
</script>
<script>
    var option= {
      animation: true,
      delay: 3000
    }
    var myAlert = document.getElementById("toast");
    var bsAlert=new bootstrap.Toast(myAlert, option);
    bsAlert.show();
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