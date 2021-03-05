<h1>Currencies</h1>

<p>Задание</p>
<br>
<p>Необходимо реализовать сервис со следующей функциональностью на php использованием фреймворка Laravel/Symfony или их младших версий &ndash; Lumen/Slim. База данных на ваш выбор: mySql/Postgre.</p>
<p>В базе данных currencies должна быть таблица currency c колонками:</p>
<br>
<p>id &mdash; первичный ключ</p>
<p>name &mdash; название валюты</p>
<p>rate &mdash; курс валюты к рублю</p>
<br>
<p>Должна быть консольная команда для обновления данных в таблице currency. Данные по курсам валют можно взять отсюда: http://www.cbr.ru/scripts/XML_daily.asp</p>
<br>
<p>Реализовать 2 REST API метода:</p>
<br>
<p>GET /currencies &mdash; должен возвращать список курсов валют с возможностью пагинации</p>
<p>GET /currency/ &mdash; должен возвращать курс валюты для переданного сокращенного наименования валюты (например, UAH)</p>
<br>
<p>API должно быть закрыто bearer авторизацией.</p>
<br>
<p>Бонус задания: сделать bearer-авторизацию через JWT по максимуму сохранив базовую модель авторизации выбранного фреймворка. В этом случае вам потребуются дополнительные методы.</p>
<br><br>
<p>Installation:</p>
<p>composer install</p>
<p>./vendor/bin/sail up -d</p>
<p>./vendor/bin/sail artisan migrate</p>

<p>go to http://localhost/api/currencies or http://localhost/api/currency/AUD via curl or Postman</p>
