<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа 1 - Квадрат разности</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 800px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 2.2em;
        }
        
        .subtitle {
            color: #7f8c8d;
            font-size: 1.1em;
        }
        
        .form-container {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 600;
        }
        
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="number"]:focus {
            outline: none;
            border-color: #3498db;
        }
        
        .btn {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            width: 100%;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }
        
        .result-container {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            color: white;
            border-radius: 10px;
            padding: 25px;
            margin-top: 20px;
            display: none;
        }
        
        .result-container.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .result-title {
            font-size: 1.4em;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .calculation {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
            font-size: 1.1em;
        }
        
        .formula {
            color: #f1c40f;
            font-weight: bold;
            font-size: 1.2em;
            text-align: center;
            margin: 10px 0;
        }
        
        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin-top: 20px;
            font-size: 0.9em;
            color: #1565c0;
        }
        
        .server-info {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 0.9em;
            color: #7f8c8d;
        }
        
        .error {
            background: #ffebee;
            border-left: 4px solid #f44336;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin: 15px 0;
            color: #c62828;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Лабораторная работа 1</h1>
            <p class="subtitle">Клиент-серверное приложение: Вычисление квадрата разности двух чисел</p>
        </div>
        
        <!-- Алгоритм работы -->
        <div class="info-box" style="background: #fff3cd; border-left-color: #ffc107; color: #856404;">
            <h3>🔧 Алгоритм клиент-серверного взаимодействия:</h3>
            <ol>
                <li><strong>Пользователь открывает браузер</strong></li>
                <li><strong>Пользователь вводит адрес:</strong> http://<?php echo $_SERVER['HTTP_HOST']; ?>/</li>
                <li><strong>Пользователь переходит по указанному адресу</strong></li>
                <li><strong>Веб-сервер получает запрос</strong> от пользователя</li>
                <li><strong>Веб-сервер ищет файл index.php</strong> с программой</li>
                <li><strong>Интерпретатор PHP выполняет код программы</strong></li>
                <li><strong>Веб-сервер передает полученный результат</strong> пользователю</li>
            </ol>
        </div>
        
        <!-- Форма для ввода данных -->
        <div class="form-container">
            <h3>📝 Ввод данных для вычисления</h3>
            <form method="GET" action="">
                <div class="form-group">
                    <label for="num1">Первое число (a):</label>
                    <input type="number" id="num1" name="num1" step="any" 
                           placeholder="Введите первое число"
                           value="<?php echo isset($_GET['num1']) ? htmlspecialchars($_GET['num1']) : '15'; ?>"
                           required>
                </div>
                
                <div class="form-group">
                    <label for="num2">Второе число (b):</label>
                    <input type="number" id="num2" name="num2" step="any" 
                           placeholder="Введите второе число"
                           value="<?php echo isset($_GET['num2']) ? htmlspecialchars($_GET['num2']) : '7'; ?>"
                           required>
                </div>
                
                <button type="submit" class="btn">Вычислить квадрат разности</button>
            </form>
        </div>
        
        <?php
        // ============================================
        // ОСНОВНАЯ ПРОГРАММА: Квадрат разности двух чисел
        // ============================================
        
        // Данные для вычислений хранятся в переменных программы
        $num1 = isset($_GET['num1']) ? (float)$_GET['num1'] : 15;
        $num2 = isset($_GET['num2']) ? (float)$_GET['num2'] : 7;
        
        // Выполняем вычисления только если был отправлен запрос
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && (isset($_GET['num1']) || isset($_GET['num2']))) {
            
            // 1. Вычисляем разность чисел
            $difference = $num1 - $num2;
            
            // 2. Вычисляем квадрат разности (основная задача)
            $square_of_difference = pow($difference, 2);
            
            // 3. Альтернативный расчет по формуле (a-b)² = a² - 2ab + b²
            $num1_squared = pow($num1, 2);
            $num2_squared = pow($num2, 2);
            $double_product = 2 * $num1 * $num2;
            
            // Вывод результатов
            echo '<div class="result-container show">';
            echo '<div class="result-title">📊 Результаты вычислений</div>';
            
            // Основной результат
            echo '<div class="calculation">';
            echo "<strong>Основная задача:</strong> Вычисление квадрата разности<br>";
            echo "($num1 - $num2)² = ($difference)² = <strong style='color:#e74c3c; font-size:1.2em;'>$square_of_difference</strong>";
            echo '</div>';
            
            // Подробный расчет
            echo '<div class="formula">(a - b)² = a² - 2ab + b²</div>';
            
            echo '<div class="calculation">';
            echo "<strong>Подробный расчет по формуле:</strong><br>";
            echo "($num1 - $num2)² = $num1² - 2×$num1×$num2 + $num2²<br>";
            echo "= $num1_squared - $double_product + $num2_squared<br>";
            echo "= " . ($num1_squared - $double_product) . " + $num2_squared<br>";
            echo "= <strong>$square_of_difference</strong>";
            echo '</div>';
            
            // Дополнительные вычисления
            echo '<div class="calculation" style="background: rgba(52, 152, 219, 0.1);">';
            echo "<strong>Дополнительные результаты:</strong><br>";
            echo "Разность чисел: $num1 - $num2 = $difference<br>";
            echo "Квадрат первого числа: $num1² = $num1_squared<br>";
            echo "Квадрат второго числа: $num2² = $num2_squared<br>";
            echo "Произведение чисел: $num1 × $num2 = " . ($num1 * $num2);
            echo '</div>';
            
            echo '</div>';
        }
        ?>
        
        <!-- Информация о выполнении программы -->
        <div class="info-box">
            <h3>✅ Выполнение программы:</h3>
            <p><strong>Задание из варианта:</strong> Вычислить квадрат разности двух чисел</p>
            <p><strong>Формула:</strong> (a - b)² = a² - 2ab + b²</p>
            <p><strong>Текущие данные:</strong> a = <?php echo $num1; ?>, b = <?php echo $num2; ?></p>
            <?php if (isset($square_of_difference)): ?>
            <p><strong>Результат:</strong> (<?php echo $num1; ?> - <?php echo $num2; ?>)² = <?php echo $square_of_difference; ?></p>
            <?php endif; ?>
        </div>
        
        <!-- Информация о сервере -->
        <div class="server-info">
            <h3>🌐 Информация о сервере:</h3>
            <p><strong>Время выполнения:</strong> <?php echo date('d.m.Y H:i:s'); ?></p>
            <p><strong>Версия PHP:</strong> <?php echo phpversion(); ?></p>
            <p><strong>Имя хоста:</strong> <?php echo $_SERVER['HTTP_HOST']; ?></p>
            <p><strong>Метод запроса:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?></p>
            <p><strong>Запрошенный URL:</strong> <?php echo $_SERVER['REQUEST_URI']; ?></p>
            <p><strong>Серверное ПО:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
        </div>
        
        <div style="margin-top: 30px; text-align: center; color: #7f8c8d; font-size: 0.9em;">
            Лабораторная работа 1 выполнена. Git репозиторий создан, программа работает по полному циклу клиент-серверного взаимодействия.
        </div>
    </div>
</body>
</html>