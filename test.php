<?php
    if(isset($_GET['cor']))
       $escolha = $_GET['cor'];
    else
       $escolha = 0;
    if(isset($_GET['concorda']))
        $termos = $_GET['concorda'];
    else
       $termos = "off";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Produtos</title>

<style> 
    #azul{color: blue;}
    #verde{color: green;}
    #vermelho{color: red;}
    label {
    padding: 20px;
    background-color: #cff;
}
input[type=submit] {
    visibility: hidden;
}
</style>
</head>
<body>

<form action="teste.php">
    <label for="enviar">Carregue aqui para enviar</label>
    <input type="submit" id="enviar" />
</form>

<form method="get" action="#">
        <table>  
        <tr>
             <td><h1>Escolha uma cor:</h1></td>
        </tr>
        <tr>
            <td>
                <p id="azul"><input type="radio" name="cor" value="0">Azul</p>
                <p id="verde"><input type="radio" name="cor" value="1">Verde</p>
                <p id="vermelho"><input type="radio" name="cor" value="2">Vermelho</p>
            </td>
            <?php 
            if($escolha == 0)
            {
                echo '<td bgcolor="blue"></td>';
            }
            else if($escolha == 1)
            {
                echo '<td bgcolor="green"></td>';
            }
            else
            {
                echo '<td bgcolor="red"></td>';
            }
            ?>
        </tr>
        <tr>
            <td><input type="checkbox" name="concorda"/> Concordo com tudo.</td>
        </tr>
        <tr>
            <td>
                <?php
                if($termos == 'on')
                {
                    echo "Concordo com os termos!";
                }
                else
                {
                    echo "Não concordou.";
                }
                ?>
            </td>
            <td><input type="submit" value="Pronto"/></td>
        </tr>
        </table>
</form>
</body>
</html>