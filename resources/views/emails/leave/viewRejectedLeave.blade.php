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
    <p>To : {{ $employeeName ?? '-' }}</p>
    <p>Please be advised that your leave is rejected as follows:-</p>
    <br>
    <br>
    <p><strong>Employer Name </strong> : {{ $employeeName ?? '-' }}</p>
    <p><strong>Start Date </strong> : {{ $data['data']->start_date ?? '-' }} </p>
    <p><strong>End Date </strong> : {{ $data['data']->end_date ?? '-' }} </p>
    <p><strong>Type of Leave</strong> : {{ $data['data']->type ?? '-' }} </p>
    <p><strong>Total Days Apllied</strong> : {{ $data['data']->total_day_applied ?? '0' }} </p>
    @if(!is_null($data['data']->leave_session))
        @switch($data['data']->leave_session)
            @case(1)
                <p><strong>Leave Session</strong>: Morning</p>
                @break
            @case(2)
                <p><strong>Leave Session</strong>: Evening</p>
                @break
        @endswitch
    @else
        <p style="display: none;"><strong>Leave Session</strong>: {{ $data['data']->leave_session }}</p>
    @endif
    <p><strong>Rejection Reason</strong> : {{ $data['data']->up_rec_reason ?? '-' }} </p>


    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') }}"><button>Click Here</button></a>
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
