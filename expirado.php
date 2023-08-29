<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Info</title>
  <style>
  body {
  background-color: #232323;
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
  margin-top: -110px;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #181920;
  border-radius: 50px;
  width: 355px;
  height: 325px;
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
  margin-bottom: 3px;
  margin-top: 1px;
}

h1 {
  color: #cbd0f7;
  text-align: center;
  font-size: 30px;
  margin-bottom: 3px;
  margin-top: 5px;
  text-decoration: none;
}

a {
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

form [type="button"] {
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <section class="area">
    <div class="card">
      <div>
        <input type="image" src="static/assets/img/logo.png" width="50" height="50">
        <img src="https://i.imgur.com/GXWWaUc.jpg">
        <input type="image" src="static/assets/img/logo.png" width="50" height="50">
      </div>
      <form>
        <h1>Seu usuário expirou!</h1>
        <p>Caso ja tenha renovado tente logar novamente para validar a renovação</p>
        <input type="button" onclick="location.href='http://t.me/aisaka_chan';" value="Renovar" />
        <input type="button" onclick="location.href='login';" value="Voltar" />
      </form>
    </section>
  </div>
</body>
</html>