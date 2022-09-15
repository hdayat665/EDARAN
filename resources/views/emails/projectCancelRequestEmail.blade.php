<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1><strong>Orbit Project Request Application</strong></h1>
    <br>
    <br>
    <p>Dear {{$project_manager}} ,    </p>
    <p>I would like to cancel the following project request :</p>
    <br>
    <p>Customer Name : {{$customer_name}}</p>
    <br>
    <p>Project Code : {{$project_code}} </p>
    <br>
    <p>Project Name : {{$project_name}}</p>
    <br>
    <br>
    <p> Thank you.</p>
    <br>
    <p>Best regards,    </p>
    <p>{{$employeeName}}</p>
    <p>{{$departmentName}}</p>
    {{-- <a href="{{ $resetPassLink }}"><button>Activate</button></a> --}}
    <br>
    <br>
    {{-- <p>If the button above doesn't work, <a href="{{ $resetPassLink }}/"> click here</a></p> --}}
  </body>
</html>
