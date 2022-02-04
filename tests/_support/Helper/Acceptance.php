<?php
namespace Helper;

use PHPMailer\PHPMailer\PHPMailer;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{
    public function sendEmail($to, $subject, $body)
    {
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = '127.0.0.1';
        $phpmailer->Port = 1025;
        $phpmailer->SMTPAutoTLS = false;

        $phpmailer->setFrom("sender@example.com");
        $phpmailer->addAddress($to);
        $phpmailer->Subject = $subject;
        $phpmailer->Body = $body;
        if (!$phpmailer->send()){
            throw new \Exception($phpmailer->ErrorInfo);
        };
    }
}
