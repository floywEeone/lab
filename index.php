<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    
    <title>Лабораторная работа №1: Веб-приложение</title>
</head>

<body>

    <!-- Навигация -->
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="index.html">Лабораторная работа</a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.html">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="aboutus.html">О нас</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Контакты</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron Header -->
    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6">
                    <h1>Лабораторная работа №1</h1>
                    <p>Веб-приложение для вычисления квадрата разности двух чисел с использованием Bootstrap и PHP</p>
                </div>
                <div class="col-12 col-sm align-self-center">
                    <img src="img/logo.png" class="img-fluid" alt="Логотип" style="max-height: 100px;">
                </div>
            </div>
        </div>
    </header>

    <!-- Основной контент -->
    <div class="container">
        
        <!-- Блок с описанием -->
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 col-md-3">
                <h3>Что это?</h3>
            </div>
            <div class="col col-sm col-md">
                <h2>Веб-приложение для вычислений</h2>
                <p class="d-none d-sm-block">Данное приложение позволяет вычислять квадрат разности двух чисел по формуле: <strong>(a - b)² = a² - 2ab + b²</strong></p>
                <p>Проект разработан в рамках лабораторной работы по веб-программированию с использованием современных технологий.</p>
            </div>
        </div>

        <!-- Блок с функционалом -->
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h3>Функционал</h3>
            </div>
            <div class="col col-sm order-sm-first col-md">
                <h2>Основные возможности</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0">Вычисления</h5>
                                <p>Точные математические расчеты квадрата разности чисел</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0">Адаптивность</h5>
                                <p>Работает на всех устройствах: от мобильных до десктопов</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-none d-md-block mt-3">
                    <div class="col-12">
                        <p><small>Приложение использует PHP для серверных вычислений и Bootstrap для адаптивного интерфейса.</small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Блок с технологиями -->
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 col-md-3">
                <h3>Технологии</h3>
            </div>
            <div class="col col-sm col-md">
                <h2>Используемый стек</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Frontend</h5>
                                <p>HTML5, CSS3, Bootstrap 4, JavaScript</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Backend</h5>
                                <p>PHP 5.6+, Apache, MySQL</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Tools</h5>
                                <p>Git, GitHub, UwAmp, VS Code</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Подробное описание технологий (скрыто на очень маленьких экранах) -->
                <div class="row d-none d-xxl-block mt-4">
                    <div class="col-12">
                        <div class="alert alert-info">
                            <h6>Детали реализации:</h6>
                            <p class="mb-0">Проект использует UwAmp как локальный сервер, Bootstrap для адаптивного дизайна, систему контроля версий Git с синхронизацией на GitHub. Все вычисления выполняются на стороне сервера с использованием PHP.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Блок с примером вычисления -->
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h3>Пример</h3>
            </div>
            <div class="col col-sm order-sm-first col-md">
                <h2>Пример вычисления</h2>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Дано:</h5>
                        <ul>
                            <li>Число a = 15</li>
                            <li>Число b = 7</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>Вычисление:</h5>
                        <p>(15 - 7)² = 8² = <strong>64</strong></p>
                        <p class="d-none d-lg-block">По формуле: 15² - 2×15×7 + 7² = 225 - 210 + 49 = 64</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <a href="calculator.php" class="btn btn-primary">Перейти к калькулятору</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Блок с инструкцией -->
        <div class="row row-content">
            <div class="col-12">
                <h2>Как использовать</h2>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Шаг 1</h5>
                                <p class="card-text">Откройте веб-приложение в браузере</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Шаг 2</h5>
                                <p class="card-text">Введите два числа в поля для ввода</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Шаг 3</h5>
                                <p class="card-text">Нажмите "Вычислить" для получения результата</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Футер -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Навигация</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html">Главная</a></li>
                        <li><a href="aboutus.html">О нас</a></li>
                        <li><a href="#">Документация</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Контакты</h5>
                    <address>
                        Пензенский государственный университет<br>
                        ул. Красная, 40<br>
                        Пенза, Россия<br>
                        <i class="fa fa-phone fa-lg"></i>: +7 8412 123456<br>
                        <i class="fa fa-envelope fa-lg"></i>: <a href="mailto:web-lab@example.com">web-lab@example.com</a>
                    </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <h5>Социальные сети</h5>
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <p>© 2024 Лабораторная работа №1. Все права защищены.</p>
                    <!-- Скрытая информация на очень маленьких экранах -->
                    <p class="d-none d-sm-block"><small>Создано с использованием Bootstrap 4 и PHP</small></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>