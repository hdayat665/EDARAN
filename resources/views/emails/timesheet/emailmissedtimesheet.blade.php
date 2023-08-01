<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8" />
</head>

<body>
   
    <br>
    <br>
    <p>Title: FIRST REMINDER | TIMESHEET LOG REMINDER | {{ $date }} (DATE)</p>
    <p>Please complete your timesheet log for the date {{ $date }} </p><br>
    {{-- <p>{{ $user_id }} </p><br>
    <p>{{ $branch }} </p><br>
    <p>{{ $state }} </p><br> --}}
    {{-- @foreach ($dow as $day)
        <p>{{ $day }}</p><br>
    @endforeach --}}
    <p>{{ $wknd1 }} naim</p><br>
    
   

    <br>
   
    <br>
    
    

    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') . '/myTimesheet' }}"><button>Click Here</button></a>
    <br>
    <br>
    <p>
         Thank You
       
    </p>
</body>

</html>
