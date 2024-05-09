<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style>
       body {
            background: linear-gradient(135deg, #000000 45%, darkorange);
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
                    default:
                        $result = 'Operação inválida';
                        break;
                }

                echo "$num1 $operation $num2 = $result";
            }

            function factorial($num) {
                if ($num === 0 || $num === 1) {
                    return 1;
                } else {
                    return $num * factorial($num - 1);
                }
            }
            ?>
        </div>

        <form method="post">
            <?php
            if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation'])) {
                echo '<input type="hidden" name="num1" value="' . $_POST['num1'] . '">';
                echo '<input type="hidden" name="num2" value="' . $_POST['num2'] . '">';
                echo '<input type="hidden" name="operation" value="' . $_POST['operation'] . '">';
            }
            ?>
            <button type="submit" name="memory" value="save">Salvar</button>
            <button type="submit" name="memory" value="retrieve">Pegar Valores</button>
            <button type="submit" name="memory" value="clear">Apagar Histórico</button>
        </form>

        <div class="history">
            <h3>Histórico</h3>
            <?php
            session_start();
            if (!isset($_SESSION['history'])) {
                $_SESSION['history'] = array();
            }

            if (isset($_POST['memory'])) {
                switch ($_POST['memory']) {
                    case 'save':
                        $expression = $_POST['num1'] . ' ' . $_POST['operation'] . ' ' . $_POST['num2'] . ' = ' . $result;
                        $_SESSION['history'][] = $expression;
                        break;
                    case 'retrieve':
                        foreach ($_SESSION['history'] as $calculation) {
                            echo "<p>$calculation</p>";
                        }
                        break;
                    case 'clear':
                        $_SESSION['history'] = array();
                        break;
                    default:
                        break;
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
