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
include_once($_SERVER['DOCUMENT_ROOT']."/class/enc.php");


$login = $_SESSION['painel']['login'];

$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)){
$db_user_id = $row_produto_login['id'];
$user_id = $db_user_id;
}

$id = $_POST['edit_qual_id'];
$user = $_POST['user'];
$login = $_POST['login'];
$expirar = $_POST['expirar'];
$permiss = $_POST['permiss'];
$senha1 = $_POST['pass'];
$token = $_POST['token'];
$senha = AESCrypt::encrypt($key, $senha1);

if ($permiss == "" || $user == "" || $token == "" ){
/*echo "<script>
window.location='/1-admin-usuarios.php?NoEditERRO1';
</script>";
exit;*/
}

if ($_POST['tipox'] == "categoria"){
    
  if ($_POST['edit_qual'] == "EDIT"){
      
$result_usuario = "UPDATE usuario SET user='$user', login='$login', pass='$senha', expirar='$expirar', token='$token', permiss='$permiss' WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
if(mysqli_affected_rows($conn)){
echo "<!DOCTYPE html>
<html lang=\"pt\">
<head>
  <meta charset='UTF-8'>
  <title>Eclipse Mod</title>
  <style>
    body {
      background-image: linear-gradient(225deg, #eb45f2 0, #d33ff7 16.67%, #b83afb 33.33%, #9738ff 50%, #6c38ff 66.67%, #0c3bff 83.33%, #003eff 100%);
      font-family: Arial, Helvetica, Sans-Serif;
      overflow: hidden;
    }

    .area {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      justify-content: center;
      align-items: center;
    }

    .card {
      margin-top: -100px;
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #18192090;
      border-radius: 50px;
      width: 355px;
      height: 350px;
      padding: 25px;
    }

    .card form {
      display: flex;
      width: 100%;
      flex-direction: column;
    }

    .card img {
      width: 130px;
      height: auto;
      margin-top: 4px;
      border-radius: 1000px;
    }

    p {
      color: #cbd0f7;
      text-decoration: none;
      text-align: center;
    }

    h1 {
      color: #d8daec;
      text-align: center;
      font-size: 20px;
      margin-bottom: 5px;
      margin-top: 5px;
      text-decoration: none;
    }
    
    h2 {
      color: #cbd0f7;
      text-align: center;
      font-size: 22px;
      margin-bottom: 10px;
      margin-top: 5px;
      text-decoration: none;
    }

    form [type=\"submit\"] {
      display: block;
      background-color: #5568fe;
      font-size: 20px;
      text-transform: uppercase;
      width: 100%;
      height: 45px;
      font-weight: bold;
      cursor: pointer;
      border: none;
      border-radius: 50px;
      color: #cbd0f7;
      margin-bottom: 5px;
    }

    form [type=\"button\"] {
      display: block;
      background-color: #5568fe;
      font-size: 20px;
      text-transform: uppercase;
      width: 100%;
      height: 45px;
      font-weight: bold;
      cursor: pointer;
      border: none;
      border-radius: 50px;
      color: #cbd0f7;
      margin-bottom: 5px;
    }
  </style>
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
</head>
<body>
  <section class=\"area\">
    <div class=\"card\">
      <div>
        <img src=\"https://i.imgur.com/9LIrYf2.png\">
      </div>
      <form>
        <h2>Usuário editado com sucesso</h2>
        <h1>https://".$link2."/login</h1>
        <h1>Usuário: 
          `$login`
        </h1>
        <h1>Senha: 
          `$senha1`
        </h1>
        <br>
        <input type=\"button\" onclick=\"location.href='/admin.php';\" value=\"Voltar\" />
      </form>
    </section>
  </div>
</body>
</html>";
}else{
echo "<script>alert('Não houve mudanças, edição cancelada!'); window.location='/admin.php';</script>";
}
  }else if($user != "" && $senha != "" && $token != ""){

$result_usuario = "INSERT INTO usuario SET user='$user', login='$login', pass='$senha', expirar='$expirar', token='$token', permiss='$permiss'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
if(mysqli_affected_rows($conn)){
echo "<!DOCTYPE html>
<html lang=\"pt\">
<head>
  <meta charset='UTF-8'>
  <title>Eclipse Mod</title>
  <style>
    body {
      background-image: linear-gradient(225deg, #eb45f2 0, #d33ff7 16.67%, #b83afb 33.33%, #9738ff 50%, #6c38ff 66.67%, #0c3bff 83.33%, #003eff 100%);
      font-family: Arial, Helvetica, Sans-Serif;
      overflow: hidden;
    }

    .area {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      justify-content: center;
      align-items: center;
    }

    .card {
      margin-top: -100px;
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #18192090;
      border-radius: 50px;
      width: 355px;
      height: 350px;
      padding: 25px;
    }

    .card form {
      display: flex;
      width: 100%;
      flex-direction: column;
    }

    .card img {
      width: 130px;
      height: auto;
      margin-top: 4px;
      border-radius: 1000px;
    }

    p {
      color: #cbd0f7;
      text-decoration: none;
      text-align: center;
    }

    h1 {
      color: #d8daec;
      text-align: center;
      font-size: 20px;
      margin-bottom: 5px;
      margin-top: 5px;
      text-decoration: none;
    }
    
    h2 {
      color: #cbd0f7;
      text-align: center;
      font-size: 22px;
      margin-bottom: 10px;
      margin-top: 5px;
      text-decoration: none;
    }

    form [type=\"submit\"] {
      display: block;
      background-color: #5568fe;
      font-size: 20px;
      text-transform: uppercase;
      width: 100%;
      height: 45px;
      font-weight: bold;
      cursor: pointer;
      border: none;
      border-radius: 50px;
      color: #cbd0f7;
      margin-bottom: 5px;
    }

    form [type=\"button\"] {
      display: block;
      background-color: #5568fe;
      font-size: 20px;
      text-transform: uppercase;
      width: 100%;
      height: 45px;
      font-weight: bold;
      cursor: pointer;
      border: none;
      border-radius: 50px;
      color: #cbd0f7;
      margin-bottom: 5px;
    }
  </style>
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
</head>
<body>
  <section class=\"area\">
    <div class=\"card\">
      <div>
        <img src=\"https://i.imgur.com/9LIrYf2.png\">
      </div>
      <form>
        <h2>Usuário adcionado com sucesso</h2>
        <h1>https://".$link2."/login</h1>
        <h1>Usuário: 
          `$login`
        </h1>
        <h1>Senha: 
          `$senha1`
        </h1>
        <br>
        <input type=\"button\" onclick=\"location.href='/admin.php';\" value=\"Voltar\" />
      </form>
    </section>
  </div>
</body>
</html>";
}else{
//echo "<script>alert('Erro ao cadastrar usuário!'); window.location='/admin.php';</script>";
$_SESSION['erro'] = 'Erro ao cadastrar usuário!';
header('Location: /admin');
}   
}
}