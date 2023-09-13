<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8" />
</head>

<body>
   
    <br>
    <br>
    <p>Title: 
        @if ($mailtime == 0)
            FIRST REMINDER
        @elseif ($mailtime == 1)
            SECOND REMINDER
        @elseif ($mailtime == 2)
            THIRD REMINDER
        @endif
        | TIMESHEET LOG REMINDER | {{ $date }} (DATE)</p>           
    <p>Please complete your timesheet log for the date {{ $date }} </p><br>
    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') . '/myTimesheet' }}"><button>Click Here</button></a>
    <br>
    <p>
         Thank You.
       
    </p>
    <p>for testing purpose : {{ $nameFrom }}</p>
</body>

</html>
