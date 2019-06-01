<?php
   
// создаем табличку для отправк

$name = $_POST['name'];
$phone = $_POST['phone'];
$mess = $_POST['mess'];



$message = '<tr style="background-color: #f8f8f8;">' . "
                <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Имя клиента:</b></td>
                <td style='padding: 10px; border: #e9e9e9 1px solid;'>$name</td>
            </tr> " . "<tr>
                <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Номер телефона:</b></td>
                <td style='padding: 10px; border: #e9e9e9 1px solid;'>$phone</td>
            </tr>" . " <tr style='background-color: #f8f8f8;'>
            	<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Сообщение:</b></td>
                <td style='padding: 10px; border: #e9e9e9 1px solid;'>$mess</td>
            </tr>";

require_once './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$subject = "Новый выкуп авто";

// Настройки SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;

$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "rostislavdomosedov@gmail.com";
$mail->Password = "063vladislav";

// От кого
$mail->setFrom('rostislavdomosedov@gmail.com', 'ВыкупАвто');        

// Кому
$mail->addAddress('vykupavtotambov@gmail.com', '');

// Тема письма
$mail->Subject = $subject;

// Тело письма
$body = "<table style='width: 100%;'>$message</table>";
$mail->msgHTML($body);

$mail->send();
echo "ок";

?>