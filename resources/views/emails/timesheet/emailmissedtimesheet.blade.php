<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8" />
</head>

<body>
   
    <br>
    <br>
    <p>Title: TIMESHEET LOG REMINDER | {{ $date }} (DATE)</p>           
    <p>Please complete your timesheet on date {{ $date }} </p><br>
    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') . '/myTimesheet' }}"><button>Click Here</button></a>
    <br>
    <p>
         Thank You.
       
    </p>
    {{-- <p>{{ $combinedHours }}</p>
    <p>{{ $eventHours }} event</p>
    <p>{{ $logHours }} log</p> --}}
</body>

</html>
