
<!doctype html>
<html class="no-js h-100" lang="pt-BR" translate="no">
<link rel="shortcut icon" href="static/assets/img/favicon.png" />
<title>
GLMod - Perfil de usuário
</title>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/class/topo.php"); ?>
<body class="h-100">
<?php include_once($_SERVER['DOCUMENT_ROOT']."/class/topo2.php"); ?>

<div class="main-content-container container-fluid px-4">
<div class="page-header row no-gutters py-4">
<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
<center>
<span class="text-uppercase page-subtitle">Visão geral</span>
<h3 class="page-title">PERFIL</h3>
</center>
</div>
</div>
<!--<div class="row">
<div class="col-lg-4">
<div class="card card-small mb-4 pt-3">
<div class="card-header border-bottom text-center">
<div class="mb-3 mx-auto">
<img class="rounded-circle" src="static/assets/img/avatars/4.png" alt="User Avatar"
width="110">
</div>-->
<?php
$result_produtos_cat = "SELECT * FROM usuario WHERE id LIKE '$db_user_id'";
$resultado_produtos_cat = mysqli_query($conn, $result_produtos_cat);
while($row_produto_cat = mysqli_fetch_assoc($resultado_produtos_cat)){
    
$profile_id = $row_produto_cat['id'];
$profile_usuario = $row_produto_cat['user'];
$profile_token = $row_produto_cat['token'];


}

?>

<!--<h4 class="mb-0">
<?php //echo $profile_id; ?>
</h4>
<span class="text-muted d-block mb-2 mt-2">
<?php // echo $profile_usuario; ?>
</span>
</div>
</div>
</div>-->
<div class="col-lg-8">
<div class="card card-small mb-4">
<div class="card-header border-bottom">
<h6 class="m-0">ID do usuário <?php echo $profile_id; ?></h6>
</div>
<ul class="list-group list-group-flush">
<li class="list-group-item p-3">
<div class="row">
<div class="col">
<form action="profile#ERRO" method="POST">
<!--<div class="mb-3">
<div class="form-group col-md-100">
<label for="username" class="form-label">Nome de usuário</label>
<input class="form-control" id="username" placeholder="Username" value="<?php echo $profile_usuario; ?>" name="username" type="text" disabled>
</div>
</div>
<div class="mb-3">
<div class="form-group col-md-6">
<label for="firstName" class="form-label">Primeiro nome</label>
<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $profile_usuario; ?>">
</div>
<div class="form-group col-md-6">
<label for="lastName" class="form-label">Ultimo nome</label>
<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $profile_usuario; ?>">
</div>
</div>
<div class="mb-3">
<div class="form-group col-md-6">
<label for="password" class="form-label">Senha</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Password">
</div>
<div class="form-group col-md-6">
<label for="passwordConfirm" class="form-label">Confirmar senha</label>
<input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm Password">
</div>-->
</div>
<!--
<div class="row">

<div class="mb-3 col-md-100">
<label for="Link_up" class="form-label">Link de UP-Config</label>
<div class="input-group">
<input type="text" class="form-control" id="Link_up" placeholder="Link_up" value="<?php echo $link."glmod/update.php?update=".$profile_token; ?>" readonly>
<div class="input-group-append">
<button class="btn btn-outline-secondary" type="button"
onclick="copyToClipboard('#Link_up')">
<i class="material-icons">content_copy</i>
</button>
</div>
</div>
</div>


</div>

<div class="row">

<div class="mb-3 col-md-100">
<label for="Link_up2" class="form-label">Link de UP-Tema</label>
<div class="input-group">
<input type="text" class="form-control" id="Link_up2" placeholder="Link_up2" value="<?php echo $link."glmod/tema.php?update=".$profile_token; ?>" readonly>
<div class="input-group-append">
<button class="btn btn-outline-secondary" type="button"
onclick="copyToClipboard('#Link_up2')">
<i class="material-icons">content_copy</i>
</button>
</div>
</div>
</div>

</div>
-->



<div class="mb-3 col-md-100">
<label for="token_up" class="form-label">Token de autenticação</label>
<div class="input-group">
<input type="text" class="form-control" id="token_up" placeholder="token_up" value="<?php echo $profile_token; ?>" readonly>
<div class="input-group-append">
<button class="btn btn-outline-secondary" type="button"
onclick="copyToClipboard('#token_up')">
<i class="material-icons">content_copy</i>
</button>
</div>
</div>
</div>
<hr class="mb-0">
<span>Para sincronizar o app com o painel basta somente por o token dentro do arquivo "<b>update</b>" que fica localizado na pasta <b>assets</b> dentro do app.</span>
<hr>
<div class="col-md-6 mb-3">
<img src="https://i.ibb.co/j5YL6hM/20230516-193339.png" width="70" height="70" />
<label for="base_app" class="form-label">Base_app - V4.1</label><span> ssh/openvpn</span>
<br>
<a class="btn btn-dark" href="https://painel.paxxhost.cloud/base_app/base2.apk" style="width: 100%;">BAIXAR</a>
</div>
<hr>
<div class="col-md-6 mb-3">
<img src="https://i.ibb.co/j5YL6hM/20230516-193339.png" width="70" height="70" />
<label for="base_app" class="form-label">Base_app - V4.1</label><span> ssh/openvpn/v2ray</span>
<br>
<a class="btn btn-dark" href="https://painel.paxxhost.cloud/base_app/base1.apk" style="width: 100%;">BAIXAR</a>
</div>
<hr>




<!--
<div class="mb-3 col-md-6">
<label for="token" class="form-label">Token</label>
<div class="input-group">
<input type="text" class="form-control" id="token" placeholder="Token" value="<?php echo $profile_token; ?>" readonly>
<div class="input-group-append">
<button class="btn btn-outline-secondary" type="button"
onclick="copyToClipboard('#token')">
<i class="material-icons">content_copy</i>
</button>
</div>
</div>
</div>
<button type="submit" class="btn btn-accent">Atualizar</button>-->
</form>
</div>
</div>
</li>
</ul>
</div>
</div>
</div>
<!-- End Default Light Table -->
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
function copyToClipboard(element) {
var $temp = $("<input>");
$("body").append($temp);
$temp.val($(element).val()).select();
document.execCommand("copy");
Toastify({
  text: "Token copiado con sucesso!",
  gravity: "top",
  position: "right",
  className: "info",
  duration: 3000,
  close: true,
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  }
}).showToast();
$temp.remove();
}
</script>
</body>
</html>