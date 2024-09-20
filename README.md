## OTP Library PHP


## How to Install the Package

```bash
composer require composer require salimmbise/otp-library
````

## How to Use it 
At first make sure you run composer require and publish the Vendor,
then import this package in order to use it. Below is example of how to use this library in Laravel Application:

```bash
use SalimMbise\OtpLibrary\OtpMailer;

Route::get('/send-otp', function () {
    try {
        // Instantiate the OtpMailer class
        $otpMailer = new OtpMailer();

        // Generate a test OTP
        $otp = rand(100000, 999999);

        // Use a test email to send the OTP
        $testEmail = 'test@example.com';

        // Send the OTP email
        $otpMailer->sendOtpEmail($testEmail, $otp);

        return "OTP email sent successfully to $testEmail with OTP: $otp";
    } catch (\Exception $e) {
        return "Failed to send OTP email. Error: " . $e->getMessage();
    }
});

```

Happy Coding! 
