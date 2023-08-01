<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8" />
</head>

<body>
   
    <br>
    <br>
    <p>Title: Event Reminder :  {{ $event_name }}</p>
    <p>Dear {{ $nameFrom }}</p>
    <p>Please be advised that you have an event to attend.</p><br>
    <p>
    Date : {{ $date }}<br>
    Time : {{ $start_time }} - {{ $end_time }}<br>
    Venue : {{ $venue }}
    </p>
    <br>
    <p>
         Thank You
       
    </p>
</body>

</html>
