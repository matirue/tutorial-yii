<?php


    Yii::import('application.extensions.phpmailer.JPhpMailer');

    class EnviarEmail{
        
        public function enviar(array $form, array $destinatario, $asunto, $mensaje){

            $mail = new JPhpMailer;

            $mail->IsSMTP();                           // Enviar usando SMTP
            $mail->SMTPDebug = 1;
            //$mail->SMTPSecure = "ssl";
            //$mail->SMTPAuth = true;
            $mail->Host = 'localhost';                 // Indico el host
            $mail->setFrom($form[0], $form[1]);
            $mail->Subject = $asunto;                  // Cargo el asunto
            $mail->MsgHTML($mensaje);                  // Puede aceptar html
            $mail->AddAddress($destinatario[0], $destinatario[1]);     // Destino
            $mail->send();                              // Lo envio

        }
    }

?>