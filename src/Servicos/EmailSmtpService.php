<?php

namespace App\Servico;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailSmtpService
{
    private $servico_email = null;

    public function __construct()
    {
        $this->servico_email = new PHPMailer(true);
        $this->servico_email->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->servico_email->isSMTP();                                            //Send using SMTP
        $this->servico_email->Host       = $_ENV['MAIL_HOST']     ?? throw new \RuntimeException('MAIL_HOST não definido');                     //Set the SMTP server to send through
        $this->servico_email->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->servico_email->Username   = $_ENV['MAIL_USERNAME']     ?? throw new \RuntimeException('MAIL_USERNAME não definido');                     //SMTP username
        $this->servico_email->Password   = $_ENV['MAIL_PASSWORD']     ?? throw new \RuntimeException('MAIL_PASSWORD não definido');                               //SMTP password
        $this->servico_email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $this->servico_email->Port       = $_ENV['MAIL_PORT']     ?? throw new \RuntimeException('MAIL_PORT não definido');
        $this->servico_email->CharSet = "UTF-8";
    }

    public function addRemente(string $email): void
    {
        //Recipients (remetente e destinatários)
        $this->servico_email->setFrom($email);
    }

    public function addDestinario(string $email): void
    {
        $this->servico_email->addAddress($email);
    }

    public function addEmCopia(string $email): void
    {
        $this->servico_email->addCC($email);
    }

    public function addEmCopiaOculta(string $email): void
    {
        $this->servico_email->addBCC($email);
    }

    public function addAnexo(string $caminho_do_arquivo, string $nome_do_arquivo = ""): void
    {
        $this->servico_email->addAttachment($caminho_do_arquivo, $nome_do_arquivo);
    }

    public function enviaEmailBoasVindas(string $nome): void
    {
        try {
            $this->servico_email->isHTML(true);
            $this->servico_email->Subject = "Boas vindas {$nome}"; // Assunto
            $this->servico_email->Body    = "
                <b>{$nome}</b> seja bem vindo ao sistema xyz
                <hr>
                Esperamos que você aproveite o nosso sistema 😍!!!
            "; //Conteúdo
            $this->servico_email->AltBody = "{$nome}seja bem vindo ao sistema xyz. Esperamos que você aproveite o nosso sistema!"; // Conteudo sem HTML
            $this->servico_email->send();
        } catch (Exception $e) {
            echo "Não foi possível enviar a mensagem. Mailer Error: {$this->servico_email->ErrorInfo}";
        }
    }
}
