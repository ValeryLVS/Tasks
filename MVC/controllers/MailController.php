<?php


namespace app\controllers;


use app\engine\Request;

class MailController extends RenderController
{
    public function actionSend()
    {
        $method = (new Request())->getMethod();
        {
            function getRecaptcha($secret_key)
            {
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response={$secret_key}");
                $return = json_decode($response);
                return $return;
            }

            $return = getRecaptcha($_POST['g-recaptcha-response']);

            if ($return->success) {

                $admin_email = "alexei-polfinov@yandex.ru";
                $form_subject = "Письмо с сайта Автосервиса";

                foreach ($_POST as $key => $value) {
                    if ($value != "" && $key != "form_subject" && $key != "g-recaptcha-response") {
                        switch ($key) {
                            case 'mail_name':
                                $n = 'Имя';
                                break;
                            case 'mail_phone':
                                $n = 'Телефон';
                                break;
                            case 'mail_email':
                                $n = 'E-mail';
                                break;
                            case 'mail_message':
                                $n = 'Сообщение';
                                break;
                        }
                        $message .=  '<tr>' . '<tr style="background-color: #f8f8f8;">' . "
                                                           <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$n</b></td>
                                                           <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
                                                       </tr>";
                        }
                    }

                $message = "<table style='width: 100%;'>$message</table>";

                $headers= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";

                $sended = mail($admin_email, $form_subject, $message, $headers);

                if ($sended) {
                    $response = [
                        'status' => 'Ok',
                    ];

                    header("Content-type: application/json");
                    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                } else {
                    $response = [
                        'status' => 'No',
                    ];
                }
            }
        }
    }
}