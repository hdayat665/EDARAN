<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1><strong>Orbit Project Request Application Status    </strong></h1>
    <br>
    <br>
    <p>Hello there,    </p>
    <p>We are pleased to inform that your application has been {{$status}}.     </p>
    <p>Below is the requested project details :    </p>
    <br>
    <p>Customer Name : {{$customer_name}}</p>
    <p>Project Code : {{$project_code}} </p>
    <p>Project Name : {{$project_name}}</p>
    <br>
    <p>Please click the link below to display the status.        :</p>
    <br>
    <a href="{{ $resetPassLink }}"><button>Click</button></a>
    {{-- <a href="{{ $resetPassLink }}"><button>Activate</button></a> --}}
    <br>
    <br>
    {{-- <p>If the button above doesn't work, <a href="{{ $resetPassLink }}/"> click here</a></p> --}}
  </body>
</html>
