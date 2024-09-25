## OTP Library PHP


## How to Install the Package

```bash
composer require salimmbise/otp-library
````

## How to Send OTP  
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

## How to Validate OTP
```bash
use SalimMbise\OtpLibrary\OtpService;

Route::get('/validate-otp', function () {
    try {
        // Instantiate the OtpService class
        $otpService = new OtpService();

        $email = $request->input('example@email.com');
        $otp = $request->input('340123');

        $isValid = $this->otpService->verifyOtp($email, $otp);

        if ($isValid) {
            return response()->json(['message' => 'OTP verified successfully']);

        } else {

            return response()->json(['message' => 'OTP verification failed'], 400);
        }

       
    } catch (\Exception $e) {
        return "Failed to send OTP email. Error: " . $e->getMessage();
    }
});

```



Happy Coding! 
