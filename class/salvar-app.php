<?php



 session_start();

if($_SESSION['painel']['login'] != ""){
}else{
    
echo "<br><br><center><h1>REDIRECIONANDO...</h1></center>";
echo "<script>
window.location='/login';
</script>";
exit;
}

include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");


$tipox = addslashes($_POST['tipox']);

if($tipox == ""){
//echo "<script>alert('Tema não foi editado!'); window.location='/app_config.php';</script>";
$_SESSION['message'] = 'Não houve mudanças!';
header('location: /app_config');
exit;
}

$login = $_SESSION['painel']['login'];

$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)){
$db_user_id = $row_produto_login['id'];
$user_id = $db_user_id;
}

$result_produtos_app_config = "SELECT * FROM app_config WHERE user_id LIKE '$user_id' LIMIT 1";
$resultado_produtos_app_config = mysqli_query($conn, $result_produtos_app_config);
while($row_produto_app_config = mysqli_fetch_assoc($resultado_produtos_app_config)){
$ja_tem_app_config = "OK";
}

if($ja_tem_app_config != "OK"){
    
$app_name = addslashes($_POST['app_name']);
$app_logo = addslashes($_POST['app_logo']);
$logo_height = addslashes($_POST['logo_height']);
$logo_width = addslashes($_POST['logo_width']);
$app_qsTileIcon = addslashes($_POST['app_qsTileIcon']);
$background_color = addslashes($_POST['background_color']);
$card_color = addslashes($_POST['card_color']);
if (strlen($card_color) == 7 || strlen($card_color) == 9) {
  // co
}
$text_color = addslashes($_POST['text_color']);
$button_color = addslashes($_POST['button_color']);
$icon_color = addslashes($_POST['icon_color']);
$border_color = addslashes($_POST['border_color']);
$app_background_image = addslashes($_POST['app_background_image']);
$app_background_no_color = addslashes($_POST['app_background_no_color']);
$app_contact_icon = addslashes($_POST['app_contact_icon']);
$default_config_icon = addslashes($_POST['default_config_icon']);
$show_config_mode = addslashes($_POST['show_config_mode']);
$app_limiter_is_active = addslashes($_POST['app_limiter_is_active']);
$server_state_fast = addslashes($_POST['server_state_fast']);
$server_state_slow = addslashes($_POST['server_state_slow']);
$app_dialog_success_text_colo = addslashes($_POST['app_dialog_success_text_colo']);
$app_contact_link = addslashes($_POST['app_contact_link']);
$app_dialog_success_text_color = addslashes($_POST['app_dialog_success_text_color']);

$app_dialog_success_text_colo = addslashes($_POST['app_dialog_success_text_colo']);
$app_dialog_image_success = addslashes($_POST['app_dialog_image_success']);
$app_dialog_success_background_color = addslashes($_POST['app_dialog_success_background_color']);
$app_config_item_background_color = addslashes($_POST['app_config_item_background_color']);
$app_dialog_config_background_color = addslashes($_POST['app_dialog_config_background_color']);
$app_dialog_success_text_color = addslashes($_POST['app_dialog_success_text_color']);
$app_dialog_image_fail = addslashes($_POST['app_dialog_image_fail']);
$app_dialog_error_background_color = addslashes($_POST['app_dialog_error_background_color']);
$app_dialog_error_text_color = addslashes($_POST['app_dialog_error_text_color']);
$app_dialog_image_validate = addslashes($_POST['app_dialog_image_validate']);
$app_dialog_image_message = addslashes($_POST['app_dialog_image_message']);
$app_dialog_image_limit_exceeded = addslashes($_POST['app_dialog_image_limit_exceeded']);
$app_dialog_image_invalid_data = addslashes($_POST['app_dialog_image_invalid_data']);
$app_text_check_user = addslashes($_POST['app_text_check_user']);
$app_message_text = addslashes($_POST['app_message_text']);
$app_message_type = addslashes($_POST['app_message_type']);
    
$config = $conn->prepare("INSERT INTO app_config SET
user_id = '$user_id',
app_name = '$app_name',
app_logo = '$app_logo',
logo_height = '$logo_height',
logo_width = '$logo_width',
app_qsTileIcon = '$app_qsTileIcon',
background_color = '$background_color',
card_color = '$card_color',
text_color = '$text_color',
button_color = '$button_color',
icon_color = '$icon_color',
border_color = '$border_color',
app_background_image = '$app_background_image',
app_background_no_color = '$app_background_no_color',
app_contact_icon = '$app_contact_icon',
default_config_icon = '$default_config_icon',
show_config_mode = '$show_config_mode',
app_limiter_is_active = '$app_limiter_is_active',
server_state_fast = '$server_state_fast',
server_state_slow = '$server_state_slow',
app_dialog_success_text_color = '$app_dialog_success_text_color',
app_contact_link = '$app_contact_link',
app_dialog_image_success = '$app_dialog_image_success',
app_dialog_success_background_color = '$app_dialog_success_background_color',
app_config_item_background_color = '$app_config_item_background_color',
app_dialog_config_background_color = '$app_dialog_config_background_color',
app_dialog_image_fail = '$app_dialog_image_fail',
app_dialog_error_background_color = '$app_dialog_error_background_color',
app_dialog_error_text_color = '$app_dialog_error_text_color',
app_dialog_image_validate = '$app_dialog_image_validate',
app_dialog_image_message = '$app_dialog_image_message',
app_dialog_image_limit_exceeded = '$app_dialog_image_limit_exceeded',
app_dialog_image_invalid_data = '$app_dialog_image_invalid_data',
app_text_check_user = '$app_text_check_user',
app_message_text = '$app_message_text',
app_message_type = '$app_message_type'

");
$config->execute();

//echo "Atualização Criada!";

}else if($tipox == "edit1"){
    
$app_name = addslashes($_POST['app_name']);
$app_logo = addslashes($_POST['app_logo']);
$logo_height = addslashes($_POST['logo_height']);
$logo_width = addslashes($_POST['logo_width']);
$app_qsTileIcon = addslashes($_POST['app_qsTileIcon']);
$background_color = addslashes($_POST['background_color']);
$card_color = addslashes($_POST['card_color']);
$text_color = addslashes($_POST['text_color']);
$button_color = addslashes($_POST['button_color']);
$icon_color = addslashes($_POST['icon_color']);
$border_color = addslashes($_POST['border_color']);
$app_background_image = addslashes($_POST['app_background_image']);
$app_background_no_color = addslashes($_POST['app_background_no_color']);
$app_contact_icon = addslashes($_POST['app_contact_icon']);
$default_config_icon = addslashes($_POST['default_config_icon']);
$show_config_mode = addslashes($_POST['show_config_mode']);
$app_limiter_is_active = addslashes($_POST['app_limiter_is_active']);
$server_state_fast = addslashes($_POST['server_state_fast']);
$server_state_slow = addslashes($_POST['server_state_slow']);
$app_dialog_success_text_colo = addslashes($_POST['app_dialog_success_text_colo']);
$app_contact_link = addslashes($_POST['app_contact_link']);
$app_dialog_success_text_color = addslashes($_POST['app_dialog_success_text_color']);
    
$config = $conn->prepare("UPDATE app_config SET 
app_name = '$app_name',
app_logo = '$app_logo',
logo_height = '$logo_height',
logo_width = '$logo_width',
app_qsTileIcon = '$app_qsTileIcon',
background_color = '$background_color',
card_color = '$card_color',
text_color = '$text_color',
button_color = '$button_color',
icon_color = '$icon_color',
border_color = '$border_color',
app_background_image = '$app_background_image',
app_background_no_color = '$app_background_no_color',
app_contact_icon = '$app_contact_icon',
default_config_icon = '$default_config_icon',
show_config_mode = '$show_config_mode',
app_limiter_is_active = '$app_limiter_is_active',
server_state_fast = '$server_state_fast',
server_state_slow = '$server_state_slow',
app_dialog_success_text_color = '$app_dialog_success_text_colo',
app_contact_link = '$app_contact_link'

WHERE user_id = '$user_id' ");
$config->execute();

//echo "<script>alert('Atualização Enviada!'); window.location='/app_config.php';</script>";
$_SESSION['message'] = 'Editado com sucesso!';
header('location: /app_config');

}else if($tipox == "edit2"){
    
$app_dialog_success_text_colo = addslashes($_POST['app_dialog_success_text_colo']);
$app_dialog_image_success = addslashes($_POST['app_dialog_image_success']);
$app_dialog_success_background_color = addslashes($_POST['app_dialog_success_background_color']);
$app_config_item_background_color = addslashes($_POST['app_config_item_background_color']);
$app_dialog_config_background_color = addslashes($_POST['app_dialog_config_background_color']);
$app_dialog_success_text_color = addslashes($_POST['app_dialog_success_text_color']);
$app_dialog_image_fail = addslashes($_POST['app_dialog_image_fail']);
$app_dialog_error_background_color = addslashes($_POST['app_dialog_error_background_color']);
$app_dialog_error_text_color = addslashes($_POST['app_dialog_error_text_color']);
$app_dialog_image_validate = addslashes($_POST['app_dialog_image_validate']);
$app_dialog_image_message = addslashes($_POST['app_dialog_image_message']);
$app_dialog_image_limit_exceeded = addslashes($_POST['app_dialog_image_limit_exceeded']);
$app_dialog_image_invalid_data = addslashes($_POST['app_dialog_image_invalid_data']);
$app_text_check_user = addslashes($_POST['app_text_check_user']);
$app_message_text = addslashes($_POST['app_message_text']);
$app_message_type = addslashes($_POST['app_message_type']);
    
$config = $conn->prepare("UPDATE app_config SET 
app_dialog_image_success = '$app_dialog_image_success',
app_dialog_success_background_color = '$app_dialog_success_background_color',
app_config_item_background_color = '$app_config_item_background_color',
app_dialog_config_background_color = '$app_dialog_config_background_color',
app_dialog_success_text_color = '$app_dialog_success_text_color',
app_dialog_image_fail = '$app_dialog_image_fail',
app_dialog_error_background_color = '$app_dialog_error_background_color',
app_dialog_error_text_color = '$app_dialog_error_text_color',
app_dialog_image_validate = '$app_dialog_image_validate',
app_dialog_image_message = '$app_dialog_image_message',
app_dialog_image_limit_exceeded = '$app_dialog_image_limit_exceeded',
app_dialog_image_invalid_data = '$app_dialog_image_invalid_data',
app_text_check_user = '$app_text_check_user',
app_message_text = '$app_message_text',
app_message_type = '$app_message_type'

WHERE user_id = '$user_id' ");
$config->execute();

//echo "<script>alert('Atualização Enviada!'); window.location='/app_config.php';</script>";
//echo "Atualização Enviada (2) !";
$_SESSION['message'] = 'Editado com sucesso!';
header('location: /app_config');

}else{
    
//echo "<script>alert('Erro ao enviar a atualização!'); window.location='/app_config.php';</script>";
$_SESSION['erro'] = 'Erro ao editar!';
header('location: /app_config');
   
}

if(mysqli_affected_rows($conn)){
//echo "<script>alert('Atualização Enviada!'); window.location='/app_config.php';</script>";
$_SESSION['message'] = 'Editado com sucesso!';
header('location: /app_config');
}else{
//echo "<script>alert('Erro ao enviar a atualização!'); window.location='/app_config.php';</script>";
$_SESSION['erro'] = 'Erro ao editar!';
header('location: /app_config');
}


?>