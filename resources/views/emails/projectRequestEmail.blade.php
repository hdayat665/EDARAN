<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1><strong>Orbit Project Request Application</strong></h1>
    <br>
    <br>
    <p>{{$content1}}</p>
    <p>I would like to request the following project:</p>
    <br>
    <p>Customer Name : {{$customer_name}}</p>
    <br>
    <p>Project Code : {{$project_code}} </p>
    <br>
    <p>Project Name : {{$project_name}}</p>
    <br>
    <p>Reason for joining : {{$reason}}</p>
    <br>
    <br>
    <p>Your consideration is highly appreciated. <br><br> Thank you. <br><br> Please click link below to make approval:</p>
    <br>
    <a href="{{ $resetPassLink }}"><button>Click</button></a>
    {{-- <a href="{{ $resetPassLink }}"><button>Activate</button></a> --}}
    <br>
    <br>
    {{-- <p>If the button above doesn't work, <a href="{{ $resetPassLink }}/"> click here</a></p> --}}
  </body>
</html>
