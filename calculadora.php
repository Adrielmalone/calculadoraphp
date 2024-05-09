<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style>
       body {
            background: linear-gradient(135deg, #000000 42%, darkorange);
            color: orange;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
        }


        .calculadora {
            background-color: #111111;
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            width: 300px;
        }
        input, select, button {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: none;
            background-color: #333333;
            color: #ffffff;
            width: 80px;
        }
        button:hover {
            background-color: #444444;
            cursor: pointer;
        }
        input[type="text"] {
            width: 70px;
            text-align: center;
        }
        .history {
            text-align: left;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="calculadora">
        <h2>Calculadora PHP</h2>
        <div style="display: flex; justify-content: space-between;">
            <form method="post">
                <input type="text" name="num1" placeholder="Número 1">
                <select name="operation">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value=""></option>
                    <option value="/">/</option>
                    <option value="!">n!</option>
                    <option value="^">x^y</option>
                </select>
                <input type="text" name="num2" placeholder="Número 2">
                <button type="submit">Calcular</button>
            </form>
        </div>
        <div id="result">
            <?php
            if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation'])) {
                $num1 = (float)$_POST['num1'];
                $num2 = (float)$_POST['num2'];
                $operation = $_POST['operation'];
                $result = 0;

                switch ($operation) {
                    case '+':
                        $result = $num1 + $num2;
                        break;
                    case '-':
                        $result = $num1 - $num2;
                        break;
                    case '*':
                        $result = $num1 * $num2;
                        break;
                    case '/':
                        $result = $num1 / $num2;
                        break;
                    case '!':
                        $result = factorial($num1);
                        break;
                    case '^':
                        $result = pow($num1, $num2);
                        break;
                    default:
                        $result = 'Operação inválida';
                        break;
                }

                echo "$num1 $operation $num2 = $result";
            }
