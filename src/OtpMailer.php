<?php

namespace SalimMbise\OtpLibrary;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class OtpMailer
{
    protected $mailer;

    public function __construct($host, $username, $password, $port = 587)
    {
        $this->mailer = new PHPMailer(true);

     
        // Setup PHPMailer
        $this->mailer->isSMTP();
        $this->mailer->Host = $host;
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $username;
        $this->mailer->Password = $password;
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = $port;
    }

    public function sendOtpEmail($email, $otp)
    {
        try {
            // Set email content
            $this->mailer->setFrom('dawadirect47@gmail.com', 'OTP Service');
            $this->mailer->addAddress($email);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Your OTP Code';
            $this->mailer->Body    = "Your OTP code is: <strong>$otp</strong>";

            // Send email
            $this->mailer->send();
        } catch (\Exception $e) {
            throw new \Exception("Message could not be sent. Mailer Error: {$this->mailer->ErrorInfo}");
        }
    }
}
