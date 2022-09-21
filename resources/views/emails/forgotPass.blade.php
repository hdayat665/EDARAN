<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1><strong>{{$title}}</strong></h1>
    <br>
    <br>
    <p>{{$content1}}</p>
    <br>
    <br>
    <p><strong>Domain Name</strong> : {{ $domain }}</p>
    <p><strong>Working Email</strong> : {{ $username }} </p>
    <br>
    <p>{{$content2}}</p>
    <a href="{{ $resetPassLink }}"><button>Reset</button></a>
    <br>
    <br>
    <p>If the button above doesn't work, <a href="{{ $resetPassLink }}/"> click here</a></p>
  </body>
</html>
