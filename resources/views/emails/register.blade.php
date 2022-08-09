<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1><strong>Orbit Account Activation</strong></h1>
    <br>
    <br>
    <p>This email is sent you to verify your email.</p>
    <br>
    <br>
    <p>Hello there,</p>
    <p>Welcome to Orbit!</p>
    <br>
    <p><strong>Full Name</strong> :{{ $first_name.' '.$last_name }}</p>
    <p><strong>Domain</strong> : {{ $domain }}</p>
    <p><strong>Username</strong> : {{ $username }} </p>
    <p><strong>Password</strong> : {{ $password }}  </p>
    <br>
    <p>Please click the button below to verify your email</p>
    <a href="{{ env('APP_URL') }}/verifiedView/{{$id}}"><button>Verify</button></a>
    <br>
    <p>Best Regards,</p>
    <p>Orbit Team</p>
    <br>
    <p>If the button above doesn't work, <a href="{{ env('APP_URL') }}/"> click here</a></p>
  </body>
</html>
