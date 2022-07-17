<!DOCTYPE html>
<html>
    <header>
        <title>Verify OTP</title>
    </header>
    <body>
        <form method="POST" action="_verifyOTP.php">
            <input type="text" name="username" placeholder="Username" />
            <input type="text" name="otpcode" placeholder="OTP Code" />
            <input type="submit" value="Iniciar sesión (get token)" />
        </form>
    </body>
</html>