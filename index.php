<?php
// Обработка ошибок для отладки
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Функция для расчета площади треугольника
function calculateTriangleArea($a, $b, $c) {
    // Проверка на положительные значения
    if ($a <= 0 || $b <= 0 || $c <= 0) {
        return array(
            'success' => false,
            'message' => 'Ошибка: Все стороны должны быть положительными числами!'
        );
    }
    
    // Проверка условия существования треугольника
    if (($a + $b <= $c) || ($a + $c <= $b) || ($b + $c <= $a)) {
        return array(
            'success' => false,
            'message' => 'Ошибка: Треугольник с такими сторонами не существует!<br>Сумма любых двух сторон должна быть больше третьей стороны.'
        );
    }
    
    // Расчет полупериметра
    $p = ($a + $b + $c) / 2;
    
    // Расчет площади по формуле Герона
    $area = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
    
    return array(
        'success' => true,
        'area' => round($area, 4),
        'semiperimeter' => round($p, 2),
        'sides' => array($a, $b, $c),
        'message' => 'Площадь треугольника успешно рассчитана!'
    );
}

// Инициализация переменных
$sideA = $sideB = $sideC = '';
$result = null;
$hasError = false;

// Обработка POST запроса
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем и очищаем данные
    $sideA = isset($_POST['side_a']) ? floatval($_POST['side_a']) : 0;
    $sideB = isset($_POST['side_b']) ? floatval($_POST['side_b']) : 0;
    $sideC = isset($_POST['side_c']) ? floatval($_POST['side_c']) : 0;
    
    // Проверяем, что все поля заполнены
    if ($sideA > 0 && $sideB > 0 && $sideC > 0) {
        $result = calculateTriangleArea($sideA, $sideB, $sideC);
        $hasError = !$result['success'];
    } else {
        $result = array(
            'success' => false,
            'message' => 'Пожалуйста, заполните все поля корректными положительными числами!'
        );
        $hasError = true;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №4 - Расчет площади треугольника</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container {
            max-width: 800px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #667eea;
        }
        
        h1 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: #7f8c8d;
            font-size: 1.1rem;
        }
        
        .form-section {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
        }
        
        .form-label {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            border: 2px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 14px 30px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
            width: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .result-section {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .result-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .result-error {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        
        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 20px;
            border-radius: 8px;
            margin-top: 25px;
        }
        
        .formula-box {
            background: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            font-family: 'Consolas', monospace;
        }
        
        .validation-result {
            background: #fff3cd;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
        
        .footer {
            text-align: center;
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .calculation-steps {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
            font-family: 'Consolas', monospace;
        }
        
        .method-info {
            background: #f0f7ff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            border: 1px dashed #667eea;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Лабораторная работа №4</h1>
            <p class="subtitle">Расчет площади треугольника со сторонами A, B, C</p>
            <p class="text-muted">Использование метода POST для передачи данных на сервер</p>
        </div>
        
        <!-- Форма для ввода данных -->
        <div class="form-section">
            <h4>Введите длины сторон треугольника:</h4>
            <form method="POST" action="" id="triangleForm">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <label class="form-label">Сторона A:</label>
                            <input type="number" 
                                   class="form-control" 
                                   name="side_a" 
                                   step="0.01"
                                   min="0.01"
                                   value="<?php echo htmlspecialchars($sideA); ?>"
                                   required
                                   placeholder="Пример: 5.0">
                            <div class="form-text">Положительное число</div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="input-group">
                            <label class="form-label">Сторона B:</label>
                            <input type="number" 
                                   class="form-control" 
                                   name="side_b" 
                                   step="0.01"
                                   min="0.01"
                                   value="<?php echo htmlspecialchars($sideB); ?>"
                                   required
                                   placeholder="Пример: 6.0">
                            <div class="form-text">Положительное число</div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="input-group">
                            <label class="form-label">Сторона C:</label>
                            <input type="number" 
                                   class="form-control" 
                                   name="side_c" 
                                   step="0.01"
                                   min="0.01"
                                   value="<?php echo htmlspecialchars($sideC); ?>"
                                   required
                                   placeholder="Пример: 7.0">
                            <div class="form-text">Положительное число</div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                    Вычислить площадь треугольника
                </button>
            </form>
        </div>
        
        <!-- Вывод результата -->
        <?php if ($result): ?>
            <div class="result-section <?php echo $hasError ? 'result-error' : 'result-success'; ?>">
                <h4><?php echo $hasError ? '❌ Результат расчета:' : '✅ Результат расчета:'; ?></h4>
                
                <p><strong><?php echo $result['message']; ?></strong></p>
                
                <div class="calculation-steps">
                    <p><strong>Введенные значения:</strong></p>
                    <p>A = <?php echo $sideA; ?> ед.</p>
                    <p>B = <?php echo $sideB; ?> ед.</p>
                    <p>C = <?php echo $sideC; ?> ед.</p>
                    
                    <?php if (!$hasError): ?>
                        <hr>
                        <p><strong>Этапы расчета:</strong></p>
                        <p>1. Полупериметр (p) = (A + B + C) / 2</p>
                        <p>   p = (<?php echo $sideA; ?> + <?php echo $sideB; ?> + <?php echo $sideC; ?>) / 2 = <?php echo $result['semiperimeter']; ?> ед.</p>
                        
                        <p>2. Площадь (S) = √[p × (p - A) × (p - B) × (p - C)]</p>
                        <p>   S = √[<?php echo $result['semiperimeter']; ?> × (<?php echo $result['semiperimeter']; ?> - <?php echo $sideA; ?>) × (<?php echo $result['semiperimeter']; ?> - <?php echo $sideB; ?>) × (<?php echo $result['semiperimeter']; ?> - <?php echo $sideC; ?>)]</p>
                        
                        <p><strong>3. Итог: S = <?php echo $result['area']; ?> кв.ед.</strong></p>
                    <?php endif; ?>
                </div>
                
                <div class="validation-result">
                    <p><strong>Проверка существования треугольника:</strong></p>
                    <ul>
                        <li>A + B > C: <?php echo $sideA . " + " . $sideB . " > " . $sideC . " = " . ($sideA + $sideB > $sideC ? "✅ Верно" : "❌ Неверно"); ?></li>
                        <li>A + C > B: <?php echo $sideA . " + " . $sideC . " > " . $sideB . " = " . ($sideA + $sideC > $sideB ? "✅ Верно" : "❌ Неверно"); ?></li>
                        <li>B + C > A: <?php echo $sideB . " + " . $sideC . " > " . $sideA . " = " . ($sideB + $sideC > $sideA ? "✅ Верно" : "❌ Неверно"); ?></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Информация о методе POST -->
        <div class="method-info">
            <h5>📡 Информация о методе передачи данных:</h5>
            <p><strong>Используемый метод: POST</strong></p>
            <p>Данные формы отправляются на сервер в теле HTTP-запроса.</p>
            <p><strong>Преимущества метода POST:</strong></p>
            <ul>
                <li>Безопасность - данные не отображаются в URL</li>
                <li>Нет ограничений по объему передаваемых данных</li>
                <li>Можно передавать файлы</li>
                <li>Данные не кэшируются браузером</li>
            </ul>
        </div>
        
        <!-- Информация о формуле -->
        <div class="info-box">
            <h5>📚 Теоретическая часть:</h5>
            <p>Перед расчетом площади треугольника необходимо проверить условие его существования:</p>
            <p>Треугольник существует, если сумма длин любых двух его сторон больше длины третьей стороны:</p>
            <ul>
                <li>A + B > C</li>
                <li>A + C > B</li>
                <li>B + C > A</li>
            </ul>
        </div>
        
        <!-- Формула Герона -->
        <div class="formula-box">
            <h5>Формула Герона для расчета площади треугольника:</h5>
            <p>S = √[p × (p - a) × (p - b) × (p - c)]</p>
            <p>где:</p>
            <p>p = (a + b + c) / 2 - полупериметр треугольника</p>
            <p>a, b, c - длины сторон треугольника</p>
            <p>S - площадь треугольника</p>
        </div>
        
        <div class="footer">
            <p>Лабораторная работа №4 | PHP + Bootstrap 5 | Метод передачи данных: POST</p>
            <p>Дата выполнения: <?php echo date('d.m.Y H:i:s'); ?></p>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Валидация формы на стороне клиента
        document.getElementById('triangleForm').addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input[type="number"]');
            let allValid = true;
            
            // Проверка каждого поля
            inputs.forEach(input => {
                const value = parseFloat(input.value);
                
                if (isNaN(value) || value <= 0) {
                    allValid = false;
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                } else {
                    input.classList.add('is-valid');
                    input.classList.remove('is-invalid');
                }
            });
            
            // Если все поля валидны, проверяем существование треугольника
            if (allValid) {
                const a = parseFloat(inputs[0].value);
                const b = parseFloat(inputs[1].value);
                const c = parseFloat(inputs[2].value);
                
                if ((a + b <= c) || (a + c <= b) || (b + c <= a)) {
                    allValid = false;
                    alert('Ошибка: Треугольник с такими сторонами не существует!\nСумма любых двух сторон должна быть больше третьей стороны.');
                    
                    // Подсветка всех полей
                    inputs.forEach(input => {
                        input.classList.add('is-invalid');
                        input.classList.remove('is-valid');
                    });
                }
            }
            
            if (!allValid) {
                e.preventDefault();
                return false;
            }
            
            return true;
        });
        
        // Сброс валидации при изменении значений
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('is-invalid', 'is-valid');
            });
        });
    </script>
</body>
</html>
