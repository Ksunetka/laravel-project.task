<p>Установить зависимости</p>
<pre>
composer install
</pre>
<p>Копировать <b>.env.example</b> файл и переименовать его в <b>.env</b></p>
<pre>
cp .env.example .env // for Linux, MacOS
copy .env.example .env // for Windowns
</pre>
<p>Сгенерировать ключ <b>APP_KEY</b></p>
<pre>
php artisan key:generate
</pre>
<p>Зарегистрироваться на сайте <a href="https://app.mailgun.com/">Mailgun</a></p>
<p>На сайте перейти в Sending -> Domains -> Your Domain -> SMTP</p>
<p>В .env файле добавить свои учетные данные SMTP</p>
<pre>
MAIL_USERNAME={your_name mailgun}
MAIL_PASSWORD={your_password mailgun}
MAIL_FROM_ADDRESS={your_email_address mailgun}
</pre>
<p>Примечание: если вы используете тестовый домен Mailgun, тогда вам нужно добавить email-адреса авторизованных получателей для возможности отправки сообщений</p>
<p>В .env файле изменить настройкии подключения к БД</p>
<pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
</pre>
<p>Далее</p>
<pre>
php artisan migrate
php artisan storage:link
php artisan serve
</pre>
