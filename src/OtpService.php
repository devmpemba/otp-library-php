<?php

namespace SalimMbise\OtpLibrary;

class OtpService
{
    protected $otpLength;
    protected $otpExpiry;
    
    public function __construct($otpLength = 6, $otpExpiry = 300)
    {
        $this->otpLength = $otpLength;
        $this->otpExpiry = $otpExpiry; // OTP expiry time in seconds (default is 5 minutes)
    }

    // Generate OTP
    public function generateOtp($email)
    {
        $otp = $this->generateRandomOtp($this->otpLength);

        // Store OTP in session or database
        $_SESSION['otp'] = [
            'email' => $email,
            'otp' => $otp,
            'expires_at' => time() + $this->otpExpiry
        ];

        return $otp;
    }

    // Verify OTP
    public function verifyOtp($email, $inputOtp)
    {
        if (!isset($_SESSION['otp'])) {
            return false; // OTP not found
        }

        $otpData = $_SESSION['otp'];

        if ($otpData['email'] !== $email) {
            return false; // Email does not match
        }

        if ($otpData['otp'] !== $inputOtp) {
            return false; // OTP does not match
        }

        if (time() > $otpData['expires_at']) {
            return false; // OTP has expired
        }

        // OTP is valid
        return true;
    }

    // Private method to generate a random OTP
    private function generateRandomOtp($length)
    {
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= mt_rand(0, 9);
        }
        return $otp;
    }
}
