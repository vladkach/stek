<?php 

$sendto = 'ceramic.stek@gmail.com' . ', ';
$sendto .= 'revolage@gmail.com' . ', '; // почта, на которую будет приходить письмо
//$sendto = 'revolage@gmail.com';
$username = $_POST['name'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = $_POST['phone']; // сохраняем в переменную данные полученные из поля c телефонным номером
$usermail = $_POST['email']; // сохраняем в переменную данные полученные из поля c адресом электронной почты
 
// Формирование заголовка письма
$subject  = strip_tags($username)." - очікує на дзвінок";
$headers  = "From: " . 'stek.in.ua' . "\r\n";
$headers .= "Reply-To: ". 'stek.in.ua' . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<p><strong>Від:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>Пошта:</strong> ".$usermail."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
$msg .= "</body></html>";
 
// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
    header("Location: ../plugins/thanks.html");
} else {
    echo "В процесі відправки повідомлення сталася помилка! Спробуйте будь ласка ще раз трошки пізніше.";
}

?>