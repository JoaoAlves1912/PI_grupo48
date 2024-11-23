<?php
session_start();
if (empty($_SESSION['logado']) || $_SESSION['logado'] == false)
  header('location: ../index.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/styles2.css">
  <title>Perfil</title>
  

</head>

<body>
  <div class="container">
    <div class="header">
      <h1>Health Buddy</h1>
      <div class="menu-icon">
        <button onclick="location.href='configPg.php'">☰</button>
      </div>
    </div>
    <div class="content">
      <!-- Informações do Usuário -->
      <div class="user-info">
        <div class="user-icon">👤</div>
        <h2> <?php echo $_SESSION['name']; ?></h2>
        <p>Idade: <?php echo $_SESSION['idade']; ?></p>
        <p>Profissão: <?php echo $_SESSION['profissao']; ?></p>
        <p>Objetivo: <?php echo $_SESSION['objetivo']; ?></p>
        <p>Condição de Saúde: <?php echo $_SESSION['saude']; ?></p>
      </div>

      <div class="section">
        <h3>Lembretes de Medicação</h3>
        <p>Suas próximas medicações:</p>
        <ul>
          <?php
          if (!empty($_SESSION['medicamentos'])) {
            foreach ($_SESSION['medicamentos'] as $medicamento) {
              $formattedHora = date('H:i', strtotime($medicamento['hora']));
              echo "<li>{$medicamento['name']} - {$formattedHora}</li>";
            }
          } else {
            echo "<li>Nenhuma medicação cadastrada.</li>";
          }
          ?>
        </ul>
      </div>


      <!-- Seção Notícias -->
      <div class="section">
        <h3>Notícias e Dicas</h3>
        <p>Confira novidades sobre saúde e bem-estar.</p>
      </div>

      <!-- Botões de Navegação -->
      <button class="button" onclick="location.href='sintomaPg.php'">Monitorar Sintomas</button>
      <button class="button" onclick="location.href='medicamentoPg.php'">Gestão de Medicamentos</button>
      <button class="button" onclick="location.href='dicasPg.php'">Dicas</button>

    </div>
  </div>
</body>

</html>