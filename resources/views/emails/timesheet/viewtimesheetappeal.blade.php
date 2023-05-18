<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8" />
</head>

<body>
    <h1><strong>{{ $title }}</strong></h1>
    {{-- {{ dd($data['data']) }} --}}
    <br>
    <br>
    <p>To : {{ $employeeNamex ?? '-' }}</p>
    <p>I hereby apply appeal for your kind review. </p>
    <br>
    <p>The details are :</p>
    <br>
    <br>
    <p><strong>Employee Name </strong> : {{ $employeeName ?? '-' }}</p>
    <p><strong>Appeal Date </strong> : {{ $data['data']->applied_date ?? '-' }} </p>
    <p><strong>Reason </strong> : {{ $data['data']->reason ?? '-' }} </p>
    <br>
    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') . '/appealtimesheet' }}"><button>Click Here</button></a>
    <br>
    <br>
    <p>
        Best regards,<br>
        <strong>{{ $employeeName ?? '-' }}</strong><br>
        <strong>{{ $designationName ?? '-' }}</strong><br>
        <strong>{{ $departmentName ?? '-' }}</strong>
    </p>
</body>

</html>
