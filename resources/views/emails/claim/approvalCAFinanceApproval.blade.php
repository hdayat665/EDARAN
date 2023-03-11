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
    <p>To : {{ $finance->employeeName ?? '-' }}</p>
    <p>Please be advised that there are cash advance applications that need your attention :- </p>
    <p>The details are :-</p>
    <br>
    <br>
    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') . '/cashAdvanceFapproverView' }}"><button>Click Here</button></a>
    <br>
    <br>
    <p>
        Best regards,<br>
        {{-- {{ dd(getEmployeeDetail(Auth::user()->id)) }} --}}
        {{ $approver->employeeName ?? '-' }} <br>
        {{ $approver->designationData->designationName ?? '-' }} <br>
        {{ $approver->departmentData->departmentName ?? '-' }} <br>
    </p>
</body>

</html>
