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
    <p>Please be advised that your Timesheet Appeal as follows :-</p>
    <br>
    <p><strong>Status</strong> : {{ $data['data']->status ?? '-' }}</p>
    <p><strong>Appeal ID </strong> : {{ $data['data']->logid ?? '-' }} </p>
    <p><strong>Employee Name </strong> : {{ $employeeNamex ?? '-' }} </p>
    <p><strong>Appeal Date</strong> : {{ $data['data']->applied_date ?? '-' }} </p>
    @if (!empty($data['data']->reasonreject))
    <p><strong>Reason of Rejected</strong> : {{ $data['data']->reasonreject }}</p>
    @endif
    <br>
    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') . '/myTimesheet' }}"><button>Click Here</button></a>
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
