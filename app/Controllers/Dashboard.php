<?php namespace App\Controllers;

use App\Libraries\phpmailer;
use App\Libraries\smtp;
use App\Libraries\pop;
use App\Libraries\exception;

class Dashboard extends BaseController
{


  //-------------------------------------------------------
  public function correosimple($usuario,$info,$cuerpo,$para,$asunto){
    $mail = new PHPMailer(false);
    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_OFF;                     //Enable verbose debug output
      $mail->isSMTP();                                        //Send using SMTP
      $mail->Host       = $_ENV['Host'];                //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                               //Enable SMTP authentication
      $mail->Username   = $_ENV['Username'];      //SMTP username
      $mail->Password   = $_ENV['Password'];                    //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 465;                                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      
      //Recipients
      $mail->setFrom($_ENV['From'], 'Información del Sistema');

      $mail->addAddress($para);     //Add a recipient
      //$mail->addAddress('ellen@example.com');               //Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
    /*
      foreach ($valor as $val) {
      $mail->addCC($val->correo);
    }*/
      //$mail->addCC('antonioravenna@gmail.com');
    // $mail->addBCC('bcc@example.com');
      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
      //Content
      $mail->isHTML(true);
      $mail->Subject = $asunto;
      $mail->Body    = '
      <!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
          <head>
          <meta charset="utf-8">
          <meta charset="iso-8859-1">
          <meta name="viewport" content="width=device-width,initial-scale=1">
          <meta name="x-apple-disable-message-reformatting">
          <title></title>
          <style>
            table, td, div, h1, p {
              font-family: Arial, sans-serif;
            }
            @media screen and (max-width: 530px) {
              .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #555555;
                text-decoration: none !important;
                font-weight: bold;
              }
              .col-lge {
                max-width: 100% !important;
              }
            }
            @media screen and (min-width: 531px) {
              .col-sml {
                max-width: 27% !important;
              }
              .col-lge {
                max-width: 73% !important;
              }
            }
          </style>
          </head>
          <body style="margin:0;padding:0;word-spacing:normal;background-color:#374250;">
          <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#374250;">
            <table role="presentation" style="width:100%;border:none;border-spacing:0;">
              <tr>
                <td align="center" style="padding:0;">
                  <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                    <tr>
                      <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                        <a href="" style="text-decoration:none;"><img src="'.base_url().'/application/plantilla/logo-02.png" width="300" alt="Logo" style="width:80%;max-width:300px;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:30px;background-color:#ffffff;">
                        <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">Hola '.$usuario.'! </h1>
                        <p style="margin:0;">'.$info.'</p>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:35px 30px 11px 30px;font-size:0;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                        <div class="col-sml" style="display:inline-block;width:100%;max-width:145px;vertical-align:top;text-align:left;font-family:Arial,sans-serif;font-size:14px;color:#363636;">
                          <img src="'.base_url().'/application/plantilla/inf.png" width="115" alt="" style="width:80%;max-width:115px;margin-bottom:20px;">
                        </div>
                        <div class="col-lge" style="display:inline-block;width:100%;max-width:395px;vertical-align:top;padding-bottom:20px;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                          '.$cuerpo.'
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:30px;background-color:#ffffff;">
                        <p style="margin:0;">Este mensaje fue generado por el Sistema Coisav, para notificación del usuario, no olvidar ingresar al sistema para ver la información, <strong>NO DEVOLVER EL MENSAJE </strong></p>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">
                        <p style="margin:0;font-size:14px;line-height:20px;">&reg; Sistema Coisav 2021<br>Desarrollado por: Victor Islachin</a></p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
          </body>
        </html>';
      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

}

  
