<?php
echo "<h1>Тестирование хоста lab1.local</h1>";
echo "<p>Время сервера: " . date('Y-m-d H:i:s') . "</p>";
echo "<p>Путь: " . __DIR__ . "</p>";
echo "<p>URL: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "</p>";

// Проверка доступности
echo "<h2>Проверка конфигурации:</h2>";
echo "<ul>";
echo "<li>Папка существует: " . (is_dir(__DIR__) ? "✓ Да" : "✗ Нет") . "</li>";
echo "<li>Файл test.php доступен: " . (file_exists(__FILE__) ? "✓ Да" : "✗ Нет") . "</li>";
echo "<li>PHP работает: " . (phpversion() ? "✓ Версия " . phpversion() : "✗ Нет") . "</li>";
echo "</ul>";
?>