<?php

// Importa as classes do PHPMailer para o global namespace
use PHPMailer\PHPMailer\PHPMailer;

// Incorpora o autoload.php a este arquivo
require 'vendor/autoload.php';

// Cria uma nova instancia de PHPMailer
$mail = new PHPMailer;

// Informa ao PHPMailer que utilizaremos o protocolo SMTP
$mail->isSMTP();

// Ativa(habilita) SMTP debugging
// 0 = off (para etapa de produção)
// 1 = messagem para o cliente (para etapa de testes)
// 2 = menssagens para cliente e server (para etapa de desenvolvimento)
$mail->SMTPDebug = 2;

// Define host server do gmail
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

// Define o número da porta SMTP - 587 para autenticação TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;

// Define a encriptografia para uso - ssl (depreciado) or tls
$mail->SMTPSecure = 'ssl';

// Definir se será autenticavel o SMTP
$mail->SMTPAuth = true;

// Usuário de autenticação
$mail->Username = "aula.sendmail@gmail.com";

// Senha de autenticação
$mail->Password = "123qwe..";

// Quem está enviando
$mail->setFrom('aula.sendmail@gmail.com', 'Sistema Senac de Email');

// Responda para (não obrigatório)
$mail->addReplyTo('prof.lpjunior@gmail.com', 'Luis Lessa');

// Define quem vai receber o email
$mail->addAddress('vinicius.sathler2@gmail.com', 'Vinicius Sathler');

// Define o titulo do email
$mail->Subject = 'Aula de envio de email';

// Ler o arquivo HTML e converter para o corpo do email
$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

// (opcional) é o corpo do email alternativo, para clients que não tem suporte HTML
$mail->AltBody = 'Mensagem de teste para aula de sendmail';

// Para anexar arquivos (foto, docs, xml, etc..)
#$mail->addAttachment('images/phpmailer_mini.png');

// verifica os erros e envia o email (Daqui para baixo não se mexe!)
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
