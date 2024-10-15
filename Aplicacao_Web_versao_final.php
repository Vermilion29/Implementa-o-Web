<?php
    include_once('index.php'); // Certifique-se de que este arquivo estabelece a conexão com o banco de dados

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        print_r($_POST['nome']);
        print_r($_POST['email']);
        print_r($_POST['telefone']);

        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);

        // Inserir dados no banco
        $result = mysqli_query($conexao, "INSERT INTO Dados_do_Usuario(nome, email, telefone) VALUES ('$nome', '$email', '$telefone')");

        if ($result) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir os dados: " . mysqli_error($conexao);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicação Web</title>
    <link rel="stylesheet" type="text/css" href="Aplicacaoweb.css" media="screen">
    

</head>
<body>
    
    <div class="box">
        <form action="Aplicacao_Web_versao_final.php" method="POST">
            <fieldset>
                <legend><b>Calculadora de Gasto Calórico</b></legend>
                <br>
                <!--Dados do contato-->
                <div class="first-step">
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inserirUsuario" required>
                        <label for="nome" class="labelInput">Nome</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="email" id="email" class="inserirUsuario" required>
                        <label for="email" class="labelInput">Email</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inserirUsuario" required>
                        <label for="telefone" class="labelInput">Telefone</label>
                    </div>
                    <br>
                    <input type="button" name="first-button" id="submit" value="proximo" onclick="go(1,2)">
                </div>   
                <!--Informação calculadora Gasto Calorico-->
                
                 <!--Radio Sexo-->    
                <div class="second-step"> 
                    <p>Sexo:</p>
                    <input type="radio" name="genero" value="masculino" id="masculino" class="inserirDados" required>
                    <label for="masculino" >Masculino</label>
                    <br>
                    <input type="radio" name="genero" value="feminino" id="feminino" class="inserirDados" required>
                    <label for="feminino">Feminino</label>
                    <br><br>
                    <!--Radio Sexo Fim-->
                    <div class="inputBox">
                        <input type="number" name="idade" id="idade" class="inserirDados" required>
                        <label for="idade" >Idade(Em anos)</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="number" name="altura" id="altura" class="inserirDados" required>
                        <label for="altura">Altura(Em centimetros)</label>
                    </div> 
                    <br><br>  
                    <div class="inputBox">
                        <input type="number" name="peso" id="peso" class="inserirDados" required>
                        <label for="peso">Peso(Em quilos)</label>
                    </div>  
                    <!--Radio Atividade-->   
                    <br><br>
                    <p>Como você descreveria seu nível de atividade ?</p>
                    <input type="radio" name="atividade" value="sedentario" id="sedentario" class="inserirDados" required>
                    <label for="sedentario">Sedentário (passa a maior parte do dia sentado/trabalho em escritório)</label>
                    <br>
                    <input type="radio" name="atividade" value="moderadamente" id="moderadamente" class="inserirDados" required>
                    <label for="moderadamente">Moderadamente ativo (passa parte do dia caminhando ou fazendo alguma atividade)</label>
                    <br>
                    <input type="radio" name="atividade" value="ativo" id="ativo" class="inserirDados" required>
                    <label for="ativo">Bastante ativo (faz trabalho braçal/fazendo entregas pedalando)</label>
                    <!--Radio Atividade Fim--> 
                    <br><br>  
                    <input onclick="calcularGastoCalorico()" type="button" name="finalbutton" id="submit" value="Calcular">
                </div>
                <div class="final-step">
                    <div class="resultado">
                        <h3>Resultado</h3>
                        <p id="resultado">...</p>
                        <input onclick="go(3,2)" type="button" name="final-button" id="submit" value="Calcular novamente">
                        <br><br>
                        <input onclick="go(3,1)" type="submit" name="submit" id="submit" value="Voltar ao Inicio">
                    </div>    
                </div>              
            </fieldset>
        </form>
    </div>        
</body>
<script type="text/javascript" src="aplicacaowebjavascript.js"></script>