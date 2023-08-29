<?php
include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

header('Content-Type: application/json');

$request = file_get_contents('php://input');
$body = json_decode($request);
$update = $body->update;
$update = mysqli_real_escape_string($conn, $update);
$result_produtos_login = "SELECT * FROM usuario WHERE token LIKE '$update'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while ($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)) {
  $db_user_id_up = $row_produto_login['id'];
  $db_user_token_up = $row_produto_login['token'];
}

if ($update == $db_user_token_up) {
  $response = array(
    'status' => 200,
    'data' => array(
        'id' => 865072,
        'user_id' => $db_user_id_up,
        'updated_at' => '2023-04-19 00:44:33',
        'device_data' => $body->device_data,
        'session_token' => $body->update,
        'created_at' => '2023-04-19 00:44:33',
        'device_id' => '12067dbfaca20bed',
        'status' => 'ACTIVE'
    ),
    'version' => '2.0.1'
  );
  exit(json_encode($response));
} else {
  $response = array(
    'status' => 400,
    'data' => array(
        'id' => 865072,
        'user_id' => $db_user_id_up,
        'updated_at' => '2023-04-19 00:44:33',
        'device_data' => $body->device_data,
        'session_token' => $body->update,
        'created_at' => '2023-04-19 00:44:33',
        'device_id' => '12067dbfaca20bed',
        'status' => 'INACTIVE'
    ),
    'version' => '2.0.1'
  );
  exit(json_encode($response));
}
?>