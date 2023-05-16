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
    <table border="1">
      <tr>
        <td>Start Date</td>
        <td>{{$start_date}}</td>
      </tr>
      <tr>
        <td>Start Time</td>
        <td>{{$start_time}}</td>
      </tr>
      <tr>
        <td>Duration</td>
        <td>{{$duration}}</td>
      </tr>
      <tr>
        <td>Venue</td>
        <td>{{$venue}}</td>
      </tr>
      <tr>
        <td>Description</td>
        <td>{{$desc}}</td>
      </tr>
    </table>
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
