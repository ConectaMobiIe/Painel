<!doctype html>
<html class="no-js h-100" lang="pt-BR" translate="no">
<title>
PXH - Dashboard
</title>
<link rel="shortcut icon" href="static/assets/img/favicon.png" />
<?php include_once($_SERVER['DOCUMENT_ROOT']."/class/topo.php"); ?>
<body class="h-100">
<?php include_once($_SERVER['DOCUMENT_ROOT']."/class/topo2.php"); ?>

<?php

if ($db_usuario_acess == "3"){
    $db_usuario_acess = "<p class='card-text d-inline-block mb-3'>
          <span class='badge badge-pill badge-danger'>Nivel: Expirado</span>
        </p>";
}else if ($db_usuario_acess == "9"){
    $db_usuario_acess = "<p class='card-text d-inline-block mb-3'>
          <span class='badge badge-pill badge-success'>Nivel: Dono</span>
        </p>";
}else if ($db_usuario_acess == "7"){
    $db_usuario_acess = "<p class='card-text d-inline-block mb-3'>
          <span class='badge badge-pill badge-success'>Nivel: Revendedor</span>
        </p>";
}else if ($db_usuario_acess == "5"){
  $db_usuario_acess = "<p class='card-text d-inline-block mb-3'>
          <span class='badge badge-pill badge-warning'>Nivel: Usuário</span>
        </p>";
}else{
    $db_usuario_acess = $db_usuario_acess;
}

?>
<style>
@media (max-width: 10000000px) {

    .col-md-6-test50 {
        width: 50%;
        padding-left: 12px;
        padding-right: 3px;
    }
    .col-md-6-test51 {
        width: 50%;
        padding-right: 12px;
        padding-left: 3px;
    }

    .col-md-6-test33 {
        width: 33%;
    }
    
    .col-md-6-test70 {
        width: 70%;
    }
    
    .col-md-6-test30 {
        width: 30%;
    }
}
</style>
<div class="main-content-container container-fluid px-4">
<div class="page-header row no-gutters py-4">
<div class="col-12 col-sm-4 text-sm-left mb-0">
<center>
<span class="text-uppercase page-subtitle">PAINEL DE CONTROLE</span>
<h3 class="page-title">Visão Geral</h3>
</center>
</div>
</div>

<div class="row">
    <div class="col-lg col-md-100 col-sm6 mb-2">
      <div class="card card-small card-post card-post--3">
        <div class="card-body">
          <div class="mb-3 col-md-100">
            <h5 class="card-title">
            <center>
              <h6 class="stats-small__value count my-3 mb-3">Alertas </h6>
              </center>
            </h5>
              <center>
              <h6><?php
$dadosJson = file_get_contents('class/msg.json');
$dadosJsonDecodificados = json_decode($dadosJson);
foreach ($dadosJsonDecodificados->valores as $dadosJson2){
  $mensagemJson = $dadosJson2->msg;
  $dataJson = $dadosJson2->data;
}
echo $mensagemJson;
?></h6>
<?php
if($db_usuario_acess == "<p class='card-text d-inline-block mb-3'>
          <span class='badge badge-pill badge-success'>Nivel: Dono</span>
        </p>"){
?>
<h3 type="button" class="" data-bs-toggle="modal"
data-bs-target="#modal-msg">
✍️
</h3>
<?php
}
?>
              </center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg col-md-6-test50 col-sm6 mb-2">
      <div class="card card-small card-post card-post--3">
        <div class="card-body">
          <h5 class="card-title">
            <a class="text-fiord-blue" href="#">Info</a>
          </h5>
          <p class="card-text d-inline-block mb-3">
            <span class="badge badge-pill badge-dark">Nome:
              <?php echo $nome; ?>
            </span>
          </p>
        </br>
            <?php echo $db_usuario_acess; ?>
      </div>
    </div>
  </div>
  <div class="col-lg col-md-6-test51 col-sm6 mb-2">
    <div class="card card-small card-post card-post--3">
      <div class="card-body">
        <h5 class="card-title">
          <a class="text-fiord-blue" href="#">Validade</a>
        </h5>
        <p class="card-text d-inline-block mb-3">
          <span class="badge badge-pill badge-dark">
            <?php
            if ($dias > 100000) {
              $dias = '♾️';
              $dias_br = 'Permanente';
            } else {
              $dias = $dias;
              $dias_br = $dias_br;
            }
            
            echo "Dias restante: $dias" 
            ?>
          </span>
        </p>
      </br>
      <p class="card-text d-inline-block mb-3">
        <span class="badge badge-pill badge-dark">
          <?php echo "Data: $dias_br"; ?>
        </span>
      </p>
    </div>
  </div>
</div>
</div>

<?php if($db_usuario_acess == "<p class='card-text d-inline-block mb-3'>
          <span class='badge badge-pill badge-success'>Nivel: Dono</span>
        </p>"){ // ADMIN ?>
<div class="row">
    <div class="col-lg col-md-100 col-sm6 mb-2">
      <div class="card card-small card-post card-post--3">
        <div class="card-body">
          <center>
          <span class="stats-small__label text-uppercase">Total de Usuários</span>
            <h6 class="stats-small__value count my-3">
            <a class="text-fiord-blue" href="#">
<?php
$sql_total_user = "SELECT * FROM usuario";
$result_total_user = mysqli_query($conn, $sql_total_user);
$total_total_user = mysqli_num_rows($result_total_user);
echo $total_total_user;
?>
          </a>
          </h6>
          <a href="/admin" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
          </center>
      </div>
    </div>
  </div>
  </div>
<?php } ?>
  
<div class="row">
    <div class="col-lg col-md-100 col-sm6 mb-2">
      <div class="card card-small card-post card-post--3">
        <div class="card-body">
          <center>
          <span class="stats-small__label text-uppercase">Total de Configurações</span>
            <h6 class="stats-small__value count my-3">
            <a class="text-fiord-blue" href="#">
<?php
$sql_total_conf = "SELECT * FROM config WHERE user_id='$user_id'";
$result_total_conf = mysqli_query($conn, $sql_total_conf);
$total_total_conf = mysqli_num_rows($result_total_conf);
echo $total_total_conf;
?>
          </a>
          </h6>
          <a href="/config" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
          </center>
      </div>
    </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-lg col-md-100 col-sm6 mb-2">
    <div class="card card-small card-post card-post--3">
      <div class="card-body">
        <center>
          <span class="stats-small__label text-uppercase">Total de Categorias</span>
          <h6 class="stats-small__value count my-3">
<?php
$sql_total_cat = "SELECT * FROM categoria WHERE user_id='$user_id'";
$result_total_cat = mysqli_query($conn, $sql_total_cat);
$total_total_cat = mysqli_num_rows($result_total_cat);
echo $total_total_cat;
?>
          </a>
        </h6>
        <a href="/categories" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
        </center>
    </div>
  </div>
</div>
</div>
</div>
</div>
</main>
</div>
</div>



<!--
<div class="row">
<div class="col-lg col-md-100 col-sm-6 mb-4">
<div class="card card-small card-post card-post--1">
<div class="card-body">
<h5 class="card-title">
<a class="text-fiord-blue" href="#">Criado em</a>
</h5>
<p class="card-text d-inline-block mb-3">
<span class="badge badge-pill badge-success">
<?php
echo $db_usuario_expirar;
?>
</span>
</p>
</div>
</div>
</div>
</div>
<div class="col-lg col-md-6-test50 col-sm-6 mb-4">
<div class="card card-small card-post card-post--1">
<div class="card-body">
<h5 class="card-title">
<a class="text-fiord-blue" href="#">Atualizado em</a>
</h5>
<p class="card-text d-inline-block mb-3">
<span class="badge badge-pill badge-success">
<?php
echo $db_usuario_expirar;
?>
</span>
</p>
</div>
</div>
</div>
<div class="col-lg col-md-6-test50 col-sm-6 mb-4">
<div class="card card-small card-post card-post--1">
<div class="card-body">
<h5 class="card-title">
<a class="text-fiord-blue" href="#">Expira em</a>
</h5>
<div class="row p-0 mb-0">
<div class="col-md-12">
<p class="card-text d-inline-block m-0">
<span class="badge badge-pill badge-success">
<?php
echo $db_usuario_expirar;
?>
</span>
</p>
</br>
<p class="card-text d-inline-block mb-3">
<span class="badge badge-pill badge-success">
<?php
echo $db_usuario_expirar_dias;
?>
</span>
</p>
</div>
</div>
</div>
</div>
</div>
<!--
<div class="row">
<div class="col-lg col-md-6 col-sm-6 mb-4">
<div class="stats-small stats-small--1 card card-small">
<div class="card-body p-0 d-flex">
<div class="d-flex flex-column m-auto">
<div class="stats-small__data text-center">
<span class="stats-small__label text-uppercase">Total de configurações</span>
<h6 class="stats-small__value count my-3">??</h6>
<a href="config" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg col-md-6 col-sm-6 mb-4">
<div class="stats-small stats-small--1 card card-small">
<div class="card-body p-0 d-flex">
<div class="d-flex flex-column m-auto">
<div class="stats-small__data text-center">
<span class="stats-small__label text-uppercase">Total de categorias</span>
<h6 class="stats-small__value count my-3">??</h6>
<a href="categories" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg col-md-6 col-sm-6 mb-4">
<div class="stats-small stats-small--1 card card-small">
<div class="card-body p-0 d-flex">
<div class="d-flex flex-column m-auto">
<div class="stats-small__data text-center">
<span class="stats-small__label text-uppercase">Total de instalações</span>
<h6 class="stats-small__value count my-3">??</h6>
<a href="devices" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
</div>
</div>


</div>
</div>
</main>
</div>
</div>-->

<div class="modal fade" id="modal-msg" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
          <form method="POST" action="class/msg.php">
      <div class="modal-body">
        <center>
          <style>
            textarea {
              width: 100%;
              border-color: #00000034;
              border-radius: 3px;
              align-items: center;
            }
          </style>
          <textarea rows="20" id="msg" name="msg"><?php echo $mensagemJson; ?></textarea>
        </center>
      </div>
      <div class="modal-footer p-0 pt-2">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-dark" id="editar">Editar</button>
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
<script src="static/assets/js/app/app-blog-overview.1.1.0.js"></script>
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