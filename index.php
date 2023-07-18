<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>formulário salário em php</title>
</head>
<body>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <br><br>
        <label for="salario">Salário:</label>
        <input type="number" name="salario" id="salario" step="0.01" required>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $nome = $_POST["nome"];
        $salario = $_POST["salario"];
        $inss = 0;
        $ir = 0;
       
        if ($salario <= 1320) { 
            $inss = $salario * 0.075; 
        } else if ($salario > 1320 && $salario <= 2571.29) {
            $inss = $salario * 0.09; 
        } else if ($salario > 2571.29 && $salario <= 3856.94) {
            $inss = $salario * 0.12; 
        } else if ($salario > 3856.94 && $salario <=7507.49) {
            $inss = $salario * 0.14; 
         } else if ($salario > 7507.49) {
            $inss = 1501.50; 
        }
        
        $salarioBase = $salario - $inss;
        
        if ($salarioBase <= 1903.98) {
            $ir = 0;
        } else if ($salarioBase > 1903.98 && $salarioBase <= 2826.65) {
            $ir = ($salarioBase * 0.075);
        } else if ($salarioBase > 2826.65 && $salarioBase <= 3751.05) {
            $ir = ($salarioBase * 0.15);
        } else if ($salarioBase > 3751.05 && $salarioBase <= 4664.68) {
            $ir = ($salarioBase * 0.225);
        } else if ($salarioBase > 4664.68) {
            $ir = ($salarioBase * 0.275);
        }
        $salarioLiquido = $salarioBase - $ir;
        echo "<h2>Dados do usuário:</h2>";
        echo "Nome: " . $nome . "<br>";
        echo "Salário Bruto: R$ " . number_format($salario, 2, ',', '.') . "<br>";
        echo "Desconto do INSS: R$ " . number_format($inss, 2, ',', '.') . "<br>";
        echo "Desconto do IR: R$ " . number_format($ir, 2, ',', '.') . "<br>";
        echo "Salário Líquido: R$ " . number_format($salarioLiquido, 2, ',', '.');
    }
    ?>
</body>
</html>