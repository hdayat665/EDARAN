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
    <p>Please be adviced that the event has been updated:</p>
    <p>to following events on:</p>
    <br>
    <p>Start Date   : {{$start_date}}</p>
    <br>
    <p>Start Time   : {{$start_time}} </p>
    <br>
    <p>Duration     : {{$duration}}</p>
    <br>
    <p>Venue        : {{$venue}}</p>
    <br>
    <p>Description  : {{$desc}}</p>
    <br>
    <br>
    <br>
    <p> Thank you.</p>
    <br>
    <p>Please make yourself available during that time.</p>
    <br>
    <p>You may confirm your attendance in the orbit. <a href="{{$link}}">click here.</a></p>
    <p>Best regards,    </p>
    <p>{{$employeeName}}</p>
    <p>{{$departmentName}}</p>
    {{-- <a href="{{ $resetPassLink }}"><button>Activate</button></a> --}}
    <br>
    <br>
    {{-- <p>If the button above doesn't work, <a href="{{ $resetPassLink }}/"> click here</a></p> --}}
  </body>
</html>
