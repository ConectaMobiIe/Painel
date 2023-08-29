<?php
session_start();
$dadosJson = file_get_contents('msg.json');
$dadosJsonDecodificados = json_decode($dadosJson);
foreach ($dadosJsonDecodificados->valores as $dados) {
  $mensagem = $dados->msg;
  $data = $dados->data;
}
$msgEdit = $_POST['msg'];
$dateEdit = date('d-m-Y');
$result = '{
  "valores": [
    {
      "msg": "'.$msgEdit.'",
      "data": "'.$dateEdit.'"
    }
  ]
}';
file_put_contents('msg.json', $result);
if (file_put_contents('msg.json', $result)) {
  //echo("<script>alert('Alerta editado com sucesso!'); window.location='/index';</script>");
  $_SESSION['message'] = 'Editado com sucesso!';
  header('location: /index');
}else {
  //echo("<script>alert('Alerta não foi editado com sucesso!'); window.location='/index';</script>");
  $_SESSION['message'] = 'Erro ao editar!';
  header('location: /index');
}
?>