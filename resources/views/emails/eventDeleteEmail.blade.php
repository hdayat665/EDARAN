<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1><strong>{{$title}}</strong></h1>
    <h3>Orbit Teams Meeting</h3>
    <br>
    <br>
    <p>Dear teams ,    </p>
    <p>Please be adviced that the event has been cancelled :</p>
    <p>as follows   :</p>
    <br>
    <p>Start Date   : {{$start_date ?? '-'}}</p>
    <br>
    <p>Start Time   : {{$start_time ?? '-'}} </p>
    <br>
    <p>Duration     : {{$duration ?? '-'}}</p>
    <br>
    <p>Venue        : {{$venue ?? '-'}}</p>
    <br>
    <p>Description  : {{$desc ?? '-'}}</p>
    <br>
    <br>
    <br>
    <p> Thank you.</p>
    <br>
    <p>We are sorry for the inconvenience caused.</p>
    <p>Thank you.</p>
    <br>
    <p>Best regards,    </p>
    <p>{{$employeeName ?? '-'}}</p>
    <p>{{$departmentName ?? '-'}}</p>
    {{-- <a href="{{ $resetPassLink }}"><button>Activate</button></a> --}}
    <br>
    <br>
    {{-- <p>If the button above doesn't work, <a href="{{ $resetPassLink }}/"> click here</a></p> --}}
  </body>
</html>
