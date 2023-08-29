
<!doctype html>
<html class="no-js h-100" lang="pt-BR" translate="no">
<link rel="shortcut icon" href="static/assets/img/favicon.png" />
<title>
PXH - Aplicativo
</title>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/class/topo.php"); ?>
<body class="h-100">

<?php include_once($_SERVER['DOCUMENT_ROOT']."/class/topo2.php"); ?>

<?php
include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");

$login = $_SESSION['painel']['login'];

$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login' LIMIT 1";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)){
$db_user_id = $row_produto_login['id'];
$user_id = $db_user_id;
}

$result_produtos_app_visu = "SELECT * FROM app_config WHERE user_id LIKE '$db_user_id'";
$resultado_produtos_app_visu = mysqli_query($conn, $result_produtos_app_visu);
while($row_produto_app_visu = mysqli_fetch_assoc($resultado_produtos_app_visu)){
    


$slc_c_fundo = $row_produto_app_visu['slc_c_fundo'];
$slc_modo_con = $row_produto_app_visu['slc_modo_con'];
$slc_limite_con = $row_produto_app_visu['slc_limite_con'];

$app_name = $row_produto_app_visu['app_name'];
$app_logo = $row_produto_app_visu['app_logo'];
$logo_height = $row_produto_app_visu['logo_height'];
$logo_width = $row_produto_app_visu['logo_width'];
$app_qsTileIcon = $row_produto_app_visu['app_qsTileIcon'];
$background_color = $row_produto_app_visu['background_color'];
$card_color = $row_produto_app_visu['card_color'];
$text_color = $row_produto_app_visu['text_color'];
$button_color = $row_produto_app_visu['button_color'];
$icon_color = $row_produto_app_visu['icon_color'];
$border_color = $row_produto_app_visu['border_color'];
$app_background_image = $row_produto_app_visu['app_background_image'];
$app_background_no_color = $row_produto_app_visu['app_background_no_color'];
$app_contact_icon = $row_produto_app_visu['app_contact_icon'];
$default_config_icon = $row_produto_app_visu['default_config_icon'];
$show_config_mode = $row_produto_app_visu['show_config_mode'];
$app_limiter_is_active = $row_produto_app_visu['app_limiter_is_active'];
$server_state_fast = $row_produto_app_visu['server_state_fast'];
$server_state_slow = $row_produto_app_visu['server_state_slow'];
$app_dialog_success_text_colo = $row_produto_app_visu['app_dialog_success_text_colo'];
$app_contact_link = $row_produto_app_visu['app_contact_link'];


$app_dialog_image_success = $row_produto_app_visu['app_dialog_image_success'];
$app_dialog_success_background_color = $row_produto_app_visu['app_dialog_success_background_color'];
$app_config_item_background_color = $row_produto_app_visu['app_config_item_background_color'];
$app_dialog_config_background_color = $row_produto_app_visu['app_dialog_config_background_color'];
$app_dialog_success_text_color = $row_produto_app_visu['app_dialog_success_text_color'];
$app_dialog_image_fail = $row_produto_app_visu['app_dialog_image_fail'];
$app_dialog_error_background_color = $row_produto_app_visu['app_dialog_error_background_color'];
$app_dialog_error_text_color = $row_produto_app_visu['app_dialog_error_text_color'];
$app_dialog_image_validate = $row_produto_app_visu['app_dialog_image_validate'];
$app_dialog_image_message = $row_produto_app_visu['app_dialog_image_message'];
$app_dialog_image_limit_exceeded = $row_produto_app_visu['app_dialog_image_limit_exceeded'];
$app_dialog_image_invalid_data = $row_produto_app_visu['app_dialog_image_invalid_data'];
$app_text_check_user = $row_produto_app_visu['app_text_check_user'];
$app_message_text = $row_produto_app_visu['app_message_text'];
$app_message_type = $row_produto_app_visu['app_message_type'];


}
/*if ($app_text_check_user == "") {
  $app_text_check_user = "👤 Nome de usuario: {username}<br>📆 Expira em: {validate}<br>📅 Dias restantes: {days}<br>🚫 Conexoes: {connections}|{limit_connections}<br>";
  
}else if ($app_text_check_user > "") {
  $app_text_check_user = $app_text_check_user;
  
}*/
?>

<div class="main-content-container container-fluid px-4">
<div class="page-header row no-gutters py-4">
<div class="col-12 col-sm-4 text-sm-left mb-0">
<center>
<span class="text-uppercase page-subtitle">Aplicativo</span>
<h3 class="page-title">Visão Geral</h3>
</center>
</div>
</div>
<form action="/class/salvar-app.php" method="post" enctype="multipart/form-data">
<input class="form-control" type="hidden" name="tipox" value="edit1">
<div class="row">
  <div class="col-md-100 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
          <h6 class="m-0">Nome do aplicativo</h6>
      </div>
      <div class="card-body p-0">
        <ul class="list-group list-group-small list-group-flush">
          <li class="list-group-item d-flex px-3">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($app_name); ?>" name="app_name">
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-100 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Logo do aplicativo</h6>
      </div>
      <div class="card-body p-0">
        <ul class="list-group list-group-small list-group-flush">
          <li class="list-group-item d-flex px-3">
            <div class="input-group">
              <input type="text" class="form-control mb-0" id="app_logo" name="app_logo" value="<?php echo $app_logo; ?>">
              <input type="file" style="display: none" id="upload-input-logo">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary btn__upload" type="button" id="upload-button-logo"><i class="material-icons">cloud_upload</i></button>
              </div>
            </div>
          </li>
          <div class="input-group mb-1">
            <img style="height: 6rem;" class="img-fluid mx-auto d-block" src="<?php echo $app_logo; ?>" id="preview-image-logo">
          </div>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-100 mb-2">
    <div class="card card-small">
      <ul class="list-group list-group-small list-group-flush">
        <li class="list-group-item d-flex px-3">
          <div class="row">
            <h6 class="col-12">Altura e largura da logo</h6>
            <div class="col-lg-6 mb-1">
              <input type="number" class="form-control form-control-sm ml-auto" placeholder="Altura" id="app_logo_height" name="logo_height" value="<?php echo $logo_height; ?>">
            </div>
            <div class="col-lg-6 mb-1">
              <input type="number" class="form-control form-control-sm ml-auto" placeholder="Largura" id="app_logo_width" name="logo_width" value="<?php echo $logo_width; ?>">
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-md-100 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">QsTile Icone</h6>
      </div>
      <div class="card-body p-0">
        <ul class="list-group list-group-small list-group-flush">
          <li class="list-group-item d-flex px-3">
            <div class="input-group">
              <input type="text" class="form-control" id="app_qsTileIcon" name="app_qsTileIcon" value="<?php echo $app_qsTileIcon; ?>">
              <input type="file" style="display: none" id="upload-input-qstile">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary btn__upload" type="button" id="upload-button-qstile"><i class="material-icons">cloud_upload</i></button>
              </div>
            </div>
          </li>
          <div class="input-group mb-1">
            <img style="height: 6rem;" class="img-fluid mx-auto d-block" src="<?php echo $app_qsTileIcon; ?>" id="preview-image-qstile">
          </div>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-100 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Imagem de fundo</h6>
      </div>
      <div class="card-body p-0">
        <ul class="list-group list-group-small list-group-flush">
          <li class="list-group-item d-flex px-3">
            <div class="input-group">
              <input type="text" class="form-control" id="app_background_image" name="app_background_image" value="<?php echo $app_background_image; ?>">
              <input type="file" style="display: none" id="upload-input-fundo">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary btn__upload" type="button" id="upload-button-fundo"><i class="material-icons">cloud_upload</i></button>
              </div>
            </div>
          </li>
          <div class="input-group mb-2">
            <img style="height: 6rem;" class="img-fluid mx-auto d-block" src="<?php echo $app_background_image; ?>" id="preview-image-fundo">
          </div>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Cor do fundo</h6>
      </div>
      <div class="card-body p-1">
        <div class="row align-items-center">
          <div class="col-md-100">
            <input type="text" class="form-control form-control-sm mb-1" placeholder="Hexadecimal" id="app_background_color" name="background_color" value="<?php echo $background_color; ?>" onkeyup="changeInputColor('background_color', this.value)">
          </div>
          <div class="col-md-100 ">
            <input type="color" class="form-control form-control-sm" value="<?php echo $background_color; ?>" id="background_color" onchange="changeColor('app_background_color', this.value)">
          </div>
        </div>
        <label class="form-label">Opacidade</label>
        <input type="range" class="form-range" min="0" max="100" step="1" value="" oninput="changeInputRange('app_background_color_transparency', 'app_background_color', this.value)">
        <div id="app_background_color_transparency" class="p-1 rounded-pill" style="background-color: <?php echo $background_color; ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Cor do cartão</h6>
      </div>
      <div class="card-body p-1">
        <div class="row align-items-center">
          <div class="col-md-100">
            <input type="text" class="form-control form-control-sm mb-1" placeholder="Hexadecimal" id="app_card_color" name="card_color" value="<?php echo $card_color; ?>" onkeyup="changeInputColor('card_color', this.value)">
          </div>
          <div class="col-md-100 ">
            <input type="color" class="form-control form-control-sm" value="<?php echo $card_color; ?>" id="card_color" onchange="changeColor('app_card_color', this.value)">
          </div>
        </div>
        <label class="form-label">Opacidade</label>
        <input type="range" class="form-range" min="0" max="100" step="1" value="" oninput="changeInputRange('app_card_color_transparency', 'app_card_color', this.value)">
        <div id="app_card_color_transparency" class="p-1 rounded-pill" style="background-color: <?php echo $card_color; ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Cor do texto</h6>
      </div>
      <div class="card-body p-1">
        <div class="row align-items-center">
          <div class="col-md-100">
            <input type="text" class="form-control form-control-sm mb-1" placeholder="Hexadecimal" id="app_text_color" name="text_color" value="<?php echo $text_color; ?>" onkeyup="changeInputColor('text_color', this.value)">
          </div>
          <div class="col-md-100">
            <input type="color" class="form-control form-control-sm" value="<?php echo $text_color; ?>" id="text_color" onchange="changeColor('app_text_color', this.value)">
          </div>
        </div>
        <label class="form-label">Opacidade</label>
        <input type="range" class="form-range" min="0" max="100" step="1" value="" oninput="changeInputRange('app_text_color_transparency', 'app_text_color', this.value)">
        <div id="app_text_color_transparency" class="p-1 rounded-pill" style="background-color: <?php echo $text_color; ?>">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Cor do botão</h6>
      </div>
      <div class="card-body p-1">
        <div class="row align-items-center">
          <div class="col-md-100">
            <input type="text" class="form-control form-control-sm mb-1" placeholder="Hexadecimal" id="app_button_color" name="button_color" value="<?php echo $button_color; ?>" onkeyup="changeInputColor('button_color', this.value)">
          </div>
          <div class="col-md-100">
            <input type="color" class="form-control form-control-sm" value="<?php echo $button_color; ?>" id="button_color" onchange="changeColor('app_button_color', this.value)">
          </div>
        </div>
        <label class="form-label">Opacidade</label>
        <input type="range" class="form-range" min="0" max="100" step="1" value="" oninput="changeInputRange('app_button_color_transparency', 'app_button_color', this.value)">
        <div id="app_button_color_transparency" class="p-1 rounded-pill" style="background-color: <?php echo $button_color; ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Cor do ícone</h6>
      </div>
      <div class="card-body p-1">
        <div class="row align-items-center">
          <div class="col-md-100">
            <input type="text" class="form-control form-control-sm mb-1" placeholder="Hexadecimal" id="app_icon_color" name="icon_color" value="<?php echo $icon_color; ?>" onkeyup="changeInputColor('icon_color', this.value)">
          </div>
          <div class="col-md-100">
            <input type="color" class="form-control form-control-sm" value="<?php echo $icon_color; ?>" id="icon_color" onchange="changeColor('app_icon_color', this.value)">
          </div>
        </div>
        <label class="form-label">Opacidade</label>
        <input type="range" class="form-range" min="0" max="100" step="1" value="" oninput="changeInputRange('app_icon_color_transparency', 'app_icon_color', this.value)">
        <div id="app_icon_color_transparency" class="p-1 rounded-pill" style="background-color: <?php echo $icon_color; ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Cor da borda</h6>
      </div>
      <div class="card-body p-1">
        <div class="row align-items-center">
          <div class="col-md-100">
            <input type="text" class="form-control form-control-sm mb-1" placeholder="Hexadecimal" id="app_border_color" name="border_color" value="<?php echo $border_color; ?>" onkeyup="changeInputColor('border_color', this.value)">
          </div>
          <div class="col-md-100">
            <input type="color" class="form-control form-control-sm" value="<?php echo $border_color; ?>" id="border_color" onchange="changeColor('app_border_color', this.value)">
          </div>
        </div>
        <label class="form-label">Opacidade</label>
        <input type="range" class="form-range" min="0" max="100" step="1" value="" oninput="changeInputRange('app_border_color_transparency', 'app_border_color', this.value)">
        <div id="app_border_color_transparency" class="p-1 rounded-pill" style="background-color: <?php echo $border_color; ?>">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 mb-2">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Botão de contato</h6>
      </div>
      <div class="card-body p-0">
        <ul class="list-group list-group-small list-group-flush">
          <li class="list-group-item d-flex px-3">
            <div class="input-group">
              <input type="text" class="form-control" id="app_contact_icon" name="app_contact_icon" value="<?php echo $app_contact_icon; ?>">
              <input type="file" style="display: none" id="upload-input-contact">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary btn__upload" type="button" id="upload-button-contact"><i class="material-icons">cloud_upload</i></button>
              </div>
            </div>
          </li>
          <div class="input-group mb-2">
            <img style="height: 6rem;" class="img-fluid mx-auto d-block" src="<?php echo $app_contact_icon; ?>" id="preview-image-contact">
            </div>
            <div class="card-body p-0">
              <ul class="list-group list-group-small list-group-flush">
                <li class="list-group-item d-flex px-3">
                  <div class="row">
                    <h6 class="ml-auto">URL Link de contato</h6>
                    <div class="input-group">
                      <input type="text" class="form-control form-control-sm ml-auto" value="<?php echo $app_contact_link; ?>" name="app_contact_link" placeholder="Link para contato">
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    <div class="col-md-6 mb-2">
      <div class="card card-small">
        <div class="card-header border-bottom">
          <h6 class="m-0">Utilitários de configuração</h6>
        </div>
      <div class="card-body p-0">
        <ul class="list-group list-group-small list-group-flush">
          <li class="list-group-item d-flex px-3">
            <div class="row">
              <h6 class="ml-auto">Exibir modo de conexão</h6>
              <div class="form-check form-check-inline ms-3">
                <input class="form-check-input" type="radio" name="show_config_mode" value="1" <?php if($show_config_mode == "1" || $show_config_mode == ""){ echo "checked"; }else{ echo "False"; } ?> >
                <label class="form-check-label" for="inlineRadio1">Sim</label>
              </div>
              <div class="form-check form-check-inline ms-3">
                <input class="form-check-input" type="radio" name="show_config_mode" value="0" <?php if($show_config_mode == "0"){ echo "checked"; }else{ echo "False"; } ?> >
                <label class="form-check-label" for="inlineRadio2">Nao</label>
              </div>
            </div>
          </li>
          <li class="list-group-item d-flex px-3">
            <div class="row">
              <h6 class="ml-auto">Limiter de conexão</h6>
              <div class="form-check form-check-inline ms-3">
                <input class="form-check-input" type="radio" name="app_limiter_is_active" value="1" <?php if($app_limiter_is_active == "1" || $app_limiter_is_active == ""){ echo "checked"; }else{ echo "False"; } ?>>
                <label class="form-check-label" for="inlineRadio1">Ativo</label>
              </div>
              <div class="form-check form-check-inline ms-3">
                <input class="form-check-input" type="radio" name="app_limiter_is_active" value="0" <?php if($app_limiter_is_active == "0"){ echo "checked"; }else{ echo "False"; } ?>>
                <label class="form-check-label" for="inlineRadio2">Inativo</label>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-md-100 mb-4">
<div class="card card-small">
<div class="card-header border-bottom">
<h6 class="m-0">Salvar</h6>
</div>
<div class="card-body p-0">
<ul class="list-group list-group-small list-group-flush">
<li class="list-group-item d-flex px-3">
<button type="submit" class="btn btn-2 btn-dark ml-auto" name="save"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16"><path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
</svg> <span>Salvar</span>
</button>
<button type="button" class="btn btn-2 btn-dark ml-2 ms-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg> <span>Opções</span>
</button>


<button data-bs-toggle="modal" data-bs-target="#delet_all" type="button" class="btn btn-2 btn-dark ml-2 ms-1" id="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg> <span>Resetar</span>
</button>
</li>
</ul>
</div>
</div>
</div>
</div>
</form>
</div>
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Mais opções de cores</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="/class/salvar-app.php" method="post" enctype="multipart/form-data">
<input class="form-control" type="hidden" name="tipox" value="edit2">
<div class="row">
<div class="col-md-6 mb-4">
<div class="card card-small">
<div class="card-header border-bottom">
<h6 class="m-0">Fundo do dialog de configuração</h6>
</div>
<div class="card-body p-1">
<div class="row align-items-center">
<div class="col-md-6">
<input type="text" class="form-control form-control-sm mb-1"
placeholder="Hexadecimal" id="app_dialog_config_background_color"
name="app_dialog_config_background_color"
value="<?php echo $app_dialog_config_background_color; ?>"
onkeyup="changeInputColor('app_dialog_config_background_color', this.value)">
</div>
<div class="col-md-6 ">
<input type="color" class="form-control form-control-sm"
value="<?php echo $app_dialog_config_background_color; ?>"
id="app_dialog_config_background_color"
onchange="changeColor('app_dialog_config_background_color', this.value)">
</div>
</div>
<label class="form-label">Opacidade</label>
<input type="range" class="form-range" min="0" max="100" step="1" value="100"
oninput="changeInputRange('app_dialog_config_background_color_transparency', 'app_dialog_config_background_color', this.value)">
<div id="app_dialog_config_background_color_transparency" class="p-1 rounded-pill"
style="background-color: #383838">
</div>
</div>
</div>
</div>
<div class="col-md-6 mb-4">
<div class="card card-small">
<div class="card-header border-bottom">
<h6 class="m-0">Fundo dos Itens de configuração</h6>
</div>
<div class="card-body p-1">
<div class="row align-items-center">
<div class="col-md-6">
<input type="text" class="form-control form-control-sm mb-1"
placeholder="Hexadecimal" id="app_config_item_background_color"
name="app_config_item_background_color"
value="<?php echo $app_config_item_background_color; ?>"
onkeyup="changeInputColor('app_config_item_background_color', this.value)">
</div>
<div class="col-md-6 ">
<input type="color" class="form-control form-control-sm"
value="<?php echo $app_config_item_background_color; ?>"
id="app_config_item_background_color"
onchange="changeColor('app_config_item_background_color', this.value)">
</div>
</div>
<label class="form-label">Opacidade</label>
<input type="range" class="form-range" min="0" max="100" step="1" value="100"
oninput="changeInputRange('app_config_item_background_color_transparency', 'app_config_item_background_color', this.value)">
<div id="app_config_item_background_color_transparency" class="p-1 rounded-pill"
style="background-color: #404040">
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 mb-4">
<div class="card card-small">
<div class="card-header border-bottom">
<h6 class="m-0">Dialog de sucesso</h6>
</div>
<div class="card-body p-1">
<div class="row align-items-center mb-1">
<label class="form-label">Cor do fundo</label>
<div class="col-md-6">
<input type="text" class="form-control form-control-sm mb-1"
placeholder="Hexadecimal" id="app_dialog_success_background_color" name="app_dialog_success_background_color" value="<?php echo $app_dialog_success_background_color; ?>" onkeyup="changeInputColor('app_dialog_success_background_color', this.value)">
</div>
<div class="col-md-6 ">
<input type="color" class="form-control form-control-sm"
value="<?php echo $app_dialog_success_background_color; ?>"
id="app_dialog_success_background_color"
onchange="changeColor('app_dialog_success_background_color', this.value)">
</div>
</div>
<div class="row align-items-center m-0 mb-3">
<label class="form-label p-0">Opacidade do fundo</label>
<input type="range" class="form-range" min="0" max="100" step="1" value="86"
oninput="changeInputRange('app_dialog_success_background_color_transparency', 'app_dialog_success_background_color', this.value)">
<div id="app_dialog_success_background_color_transparency"
class="p-1 rounded-pill"
style="background-color: #dd404040">
</div>
</div>
<div class="row align-items-center">
<label class="form-label">Cor do Texto</label>
<div class="col-md-6">
<input type="text" class="form-control form-control-sm mb-1" placeholder="Hexadecimal" id="app_dialog_success_text_color" name="app_dialog_success_text_color" value="<?php echo $app_dialog_success_text_color; ?>" onkeyup="changeInputColor('app_dialog_success_text_color', this.value)">
</div>
<div class="col-md-6 ">
<input type="color" class="form-control form-control-sm" value="<?php echo $app_dialog_success_text_color; ?>" id="app_dialog_success_text_color" onchange="changeColor('app_dialog_success_text_color', this.value)">
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 mb-4">
<div class="card card-small">
<div class="card-header border-bottom">
<h6 class="m-0">Dialog de erro</h6>
</div>
<div class="card-body p-1">
<div class="row align-items-center mb-1">
<label class="form-label">Cor do fundo</label>
<div class="col-md-6">
<input type="text" class="form-control form-control-sm mb-1"
placeholder="Hexadecimal" id="app_dialog_error_background_color"
name="app_dialog_error_background_color"
value="<?php echo $app_dialog_error_background_color; ?>"
onkeyup="changeInputColor('app_dialog_error_background_color', this.value)">
</div>
<div class="col-md-6 ">
<input type="color" class="form-control form-control-sm"
value="<?php echo $app_dialog_error_background_color; ?>"
id="app_dialog_error_background_color"
onchange="changeColor('app_dialog_error_background_color', this.value)">
</div>
</div>
<div class="row align-items-center m-0 mb-3">
<label class="form-label p-0">Opacidade do fundo</label>
<input type="range" class="form-range" min="0" max="100" step="1" value="100"
oninput="changeInputRange('app_dialog_error_background_color_transparency', 'app_dialog_error_background_color', this.value)">
<div id="app_dialog_error_background_color_transparency"
class="p-1 rounded-pill"
style="background-color: #404040">
</div>
</div>
<div class="row align-items-center">
<label class="form-label">Cor do Texto</label>
<div class="col-md-6">
<input type="text" class="form-control form-control-sm mb-1"
placeholder="Hexadecimal" id="app_dialog_error_text_color"
name="app_dialog_error_text_color"
value="<?php echo $app_dialog_error_text_color; ?>"
onkeyup="changeInputColor('app_dialog_error_text_color', this.value)">
</div>
<div class="col-md-6 ">
<input type="color" class="form-control form-control-sm"
value="<?php echo $app_dialog_error_text_color; ?>"
id="app_dialog_error_text_color"
onchange="changeColor('app_dialog_error_text_color', this.value)">
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
  <div class="col-md-12 mb-4">
    <div class="card card-small">
      <div class="card-header border-bottom">
        <h6 class="m-0">Mensagem CheckUser</h6>
      </div>
      <div class="card-body p-1">
        <div class="row align-items-center">
          <div class="col-md-12">
            <textarea class="form-control form-control-sm" rows="4" placeholder="Texto" id="app_text_check_user" name="app_text_check_user"><?php echo $app_text_check_user; ?></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-md-12 mb-4">
<div class="card card-small">
<div class="card-header border-bottom">
<h6 class="m-0">Mensagem (Aviso, Boas Vindas, Alerta ...)</h6>
</div>
<div class="card-body p-1">
<div class="row align-items-center">
<div class="col-md-12">
<textarea class="form-control form-control-sm" rows="3"
placeholder="Texto" id="app_message_text"
name="app_message_text"><?php echo $app_message_text; ?></textarea>
<label class="form-label mt-1">Tipo de mensagem</label>
<select class="form-select form-control-sm mt-1" id="app_message_type"
name="app_message_type">
<option value="1" False>
Boas Vindas (Será exibido uma unica vez)
</option>
<option value="2" False>
Alerta (Sempre será exibido)
</option>
<option value="3" selected>
Ao conectar vpn (Ao conectar vpn será exibido)
</option>
<option value="4" False>
Não exibir (Não será exibido)
</option>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer p-0 pt-2">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
<button type="submit" name="save" class="btn btn-dark">Salvar</button>
</div>
</div>
</div>
</form>
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
            <h5>Deseja realmente deletar seu tema atual?</h5>
        </center>
      </div>
      <div class="modal-footer">
         <a type="button" name="reset"
class="btn btn-outline-danger ml-2 ms-1" href="class/func_del.php?func=del_theme">Restaurar</a>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<style>
  textarea {
    width: 100%;
  }
  .text {
    color: red;
  }
</style>

<div class="modal fade" id="import" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <form method="POST" action="/class/import.php?func=tema">
      <div class="modal-body">
        <center>
        <h5>Somente uma config por vez!!!</h5>
        <h6 class="text">Em fase de testes!!!</h6>
          <hr>
          <textarea id="imp" name="imp" rows="15"></textarea>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline-success" id="importar" data-bs-dismiss="modal">Importar</button>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script>
    $(document).ready(function() {
      // Função para realizar o upload da imagem ao ImgBB
      function uploadImage(file) {
        var form_data = new FormData();
        var timestamp = new Date().getTime();
        var filename = file.name;
        var extension = filename.split('.').pop().toLowerCase();
        var new_filename = md5(file) + '_' + timestamp + '.' + extension;
        form_data.append('image', file, new_filename);

        $.ajax({
          url: 'https://api.imgbb.com/1/upload?key=2d064f28588136d4bed6fe5c05ca6d90',
          type: 'POST',
          data: form_data,
          contentType: false,
          processData: false,
          success: function(data) {
            var link = data.data.url;
            $('#app_logo').val(link);
            $('#preview-image-logo').attr('src', link);
          },
          error: function(xhr, status, error) {
            $('#error-message-logo').text('Ocorreu um erro ao enviar a imagem.');
            $('#error-message-logo').show();
          }
        });
      }

      // Evento de seleção de arquivo
      $('#upload-input-logo').change(function() {
        var file = $(this).prop('files')[0];
        if (file) {
          $('#error-message-logo').hide();
          uploadImage(file);
          var reader = new FileReader();
          reader.onload = function() {
            $('#preview-image-logo').attr('src', reader.result);
          };
          reader.readAsDataURL(file);
        } else {
          $('#error-message-logo').text('Nenhum arquivo selecionado.');
          $('#error-message-logo').show();
        }
      });
    });

    function md5(input) {
      var hash = CryptoJS.MD5(input);
      return hash.toString(CryptoJS.enc.Hex);
    }

  </script>
  <script>
    $(document).ready(function() {
      // Função para realizar o upload da imagem ao ImgBB
      function uploadImage(file) {
        var form_data = new FormData();
        var timestamp = new Date().getTime();
        var filename = file.name;
        var extension = filename.split('.').pop().toLowerCase();
        var new_filename = md5(file) + '_' + timestamp + '.' + extension;
        form_data.append('image', file, new_filename);

        $.ajax({
          url: 'https://api.imgbb.com/1/upload?key=2d064f28588136d4bed6fe5c05ca6d90',
          type: 'POST',
          data: form_data,
          contentType: false,
          processData: false,
          success: function(data) {
            var link = data.data.url;
            $('#app_qsTileIcon').val(link);
            $('#preview-image-qstile').attr('src', link);
          },
          error: function(xhr, status, error) {
            $('#error-message-qstile').text('Ocorreu um erro ao enviar a imagem.');
            $('#error-message-qstile').show();
          }
        });
      }

      // Evento de seleção de arquivo
      $('#upload-input-qstile').change(function() {
        var file = $(this).prop('files')[0];
        if (file) {
          $('#error-message-qstile').hide();
          uploadImage(file);
          var reader = new FileReader();
          reader.onload = function() {
            $('#preview-image-qstile').attr('src', reader.result);
          };
          reader.readAsDataURL(file);
        } else {
          $('#error-message-qstile').text('Nenhum arquivo selecionado.');
          $('#error-message-qstile').show();
        }
      });
    });

    function md5(input) {
      var hash = CryptoJS.MD5(input);
      return hash.toString(CryptoJS.enc.Hex);
    }

  </script>
  <script>
    $(document).ready(function() {
      // Função para realizar o upload da imagem ao ImgBB
      function uploadImage(file) {
        var form_data = new FormData();
        var timestamp = new Date().getTime();
        var filename = file.name;
        var extension = filename.split('.').pop().toLowerCase();
        var new_filename = md5(file) + '_' + timestamp + '.' + extension;
        form_data.append('image', file, new_filename);

        $.ajax({
          url: 'https://api.imgbb.com/1/upload?key=2d064f28588136d4bed6fe5c05ca6d90',
          type: 'POST',
          data: form_data,
          contentType: false,
          processData: false,
          success: function(data) {
            var link = data.data.url;
            $('#app_background_image').val(link);
            $('#preview-image-fundo').attr('src', link);
          },
          error: function(xhr, status, error) {
            $('#error-message-fundo').text('Ocorreu um erro ao enviar a imagem.');
            $('#error-message-fundo').show();
          }
        });
      }

      // Evento de seleção de arquivo
      $('#upload-input-fundo').change(function() {
        var file = $(this).prop('files')[0];
        if (file) {
          $('#error-message-fundo').hide();
          uploadImage(file);
          var reader = new FileReader();
          reader.onload = function() {
            $('#preview-image-fundo').attr('src', reader.result);
          };
          reader.readAsDataURL(file);
        } else {
          $('#error-message-fundo').text('Nenhum arquivo selecionado.');
          $('#error-message-fundo').show();
        }
      });
    });

    function md5(input) {
      var hash = CryptoJS.MD5(input);
      return hash.toString(CryptoJS.enc.Hex);
    }

  </script>
  <script>
    $(document).ready(function() {
      // Função para realizar o upload da imagem ao ImgBB
      function uploadImage(file) {
        var form_data = new FormData();
        var timestamp = new Date().getTime();
        var filename = file.name;
        var extension = filename.split('.').pop().toLowerCase();
        var new_filename = md5(file) + '_' + timestamp + '.' + extension;
        form_data.append('image', file, new_filename);

        $.ajax({
          url: 'https://api.imgbb.com/1/upload?key=2d064f28588136d4bed6fe5c05ca6d90',
          type: 'POST',
          data: form_data,
          contentType: false,
          processData: false,
          success: function(data) {
            var link = data.data.url;
            $('#app_contact_icon').val(link);
            $('#preview-image-contact').attr('src', link);
          },
          error: function(xhr, status, error) {
            $('#error-message-contact').text('Ocorreu um erro ao enviar a imagem.');
            $('#error-message-contact').show();
          }
        });
      }

      // Evento de seleção de arquivo
      $('#upload-input-contact').change(function() {
        var file = $(this).prop('files')[0];
        if (file) {
          $('#error-message-contact').hide();
          uploadImage(file);
          var reader = new FileReader();
          reader.onload = function() {
            $('#preview-image-contact').attr('src', reader.result);
          };
          reader.readAsDataURL(file);
        } else {
          $('#error-message-contact').text('Nenhum arquivo selecionado.');
          $('#error-message-contact').show();
        }
      });
    });

    function md5(input) {
      var hash = CryptoJS.MD5(input);
      return hash.toString(CryptoJS.enc.Hex);
    }

  </script>
<script>
  const uploadButtonLogo = document.getElementById('upload-button-logo');
  const uploadInputLogo = document.getElementById('upload-input-logo');
  uploadButtonLogo.addEventListener('click', () => {
    uploadInputLogo.click();
  });
  uploadInputLogo.addEventListener('change', () => {
    const file = uploadInputLogo.files[0];
  });
</script>
<script>
  const uploadButtonQstile = document.getElementById('upload-button-qstile');
  const uploadInputQstile = document.getElementById('upload-input-qstile');
  uploadButtonQstile.addEventListener('click', () => {
    uploadInputQstile.click();
  });
  uploadInputQstile.addEventListener('change', () => {
    const file = uploadInputQstile.files[0];
  });
</script>
<script>
  const uploadButtonFundo = document.getElementById('upload-button-fundo');
  const uploadInputFundo = document.getElementById('upload-input-fundo');
  uploadButtonFundo.addEventListener('click', () => {
      uploadInputFundo.click();
  });
  uploadInputFundo.addEventListener('change', () => {
    const file = uploadInputFundo.files[0];
  });
</script>
<script>
  const uploadButtonContact = document.getElementById('upload-button-contact');
  const uploadInputContact = document.getElementById('upload-input-contact');
  uploadButtonContact.addEventListener('click', () => {
      uploadInputContact.click();
  });
  uploadInputContact.addEventListener('change', () => {
    const file = uploadInputContact.files[0];
  });
</script>
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
$(document).ready(function () {
$('#preview-image').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this);
var image = button.attr('data-bs-data');
var user_id = image.split('_')[0];
var url = 'picture/' + user_id + '/' + image;
modal.find('#preview-image-modal').attr('src', url);
});
});
function changeInputColor(elementId, value) {
let color = value;
if (value.length == 9) {
color = '#' + value.substring(3, value.length);
} else if (value.length == 6) {
color = '#' + value;
} else {
color = '#FFFFFF';
}
document.getElementById(elementId).value = color;
}
function changeColor(elementId, value) {
let color = $('#' + elementId).val();
let alpha = color.length == 9 ? color.substring(1, 3) : 'FF';
let colorHex = alpha + value.substring(1, value.length);
color = hexToRgba(colorHex);
alpha = parseAlpha(color);
let rgb = 'rgba(' + color.r + ',' + color.g + ',' + color.b + ',' + alpha + ')';
$('#' + elementId).val('#' + colorHex);
$('#' + elementId + '_transparency').css('background-color', rgb);
}
function changeInputRange(elementId, elementId2, value) {
var element = document.getElementById(elementId);
var element2 = document.getElementById(elementId2);
color = element2.value
color = color.replace('#', '');
value = value.replace('.', '');
if (color.length == 8) {
color = color.substring(2, 8);
} else if (color.length == 7) {
color = color.substring(1, 7);
}
value = parseFloat(value) / 100;
$('#' + elementId2).val('#' + alphaHexColor(value) + color);
var rgb = 'rgba(' + hexToRgb(color).r + ',' + hexToRgb(color).g + ',' + hexToRgb(color).b + ',' + value + ')';
$('#' + elementId).css('background-color', rgb);
}
function alphaHexColor(number) {
let alphaFixed = number.toFixed(2) * 255;
let alphaHex = alphaFixed.toString(16);
let split = alphaHex.split('.');
return split[0].length == 1 ? '0' + split[0] : split[0];
}
function hexToRgb(hex) {
var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
return result ? {
r: parseInt(result[1], 16),
g: parseInt(result[2], 16),
b: parseInt(result[3], 16)
} : null;
}
function hexToRgba(hex) {
if (hex.length == 6) {
hex = 'ff' + hex;
}
var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
return result ? {
a: parseInt(result[1], 16),
r: parseInt(result[2], 16),
g: parseInt(result[3], 16),
b: parseInt(result[4], 16),
} : null;
}
function parseAlpha(color) {
let alpha = color.a / 255;
return alpha;
}
const obj = {
app_background_color: 'app_background_color_transparency',
app_card_color: 'app_card_color_transparency',
app_text_color: 'app_text_color_transparency',
app_button_color: 'app_button_color_transparency',
app_icon_color: 'app_icon_color_transparency',
app_border_color: 'app_border_color_transparency',
app_dialog_config_background_color: 'app_dialog_config_background_color_transparency',
app_config_item_background_color: 'app_config_item_background_color_transparency',
app_dialog_success_background_color: 'app_dialog_success_background_color_transparency',
app_dialog_error_background_color: 'app_dialog_error_background_color_transparency',
}
for (var key in obj) {
let element = $('#' + key);
color = element.val();
color = color.replace('#', '');
color = hexToRgba(color);
let alpha = parseAlpha(color);
let rgb = 'rgba(' + color.r + ',' + color.g + ',' + color.b + ',' + alpha + ')';
$('#' + obj[key]).css('background-color', rgb);
}
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