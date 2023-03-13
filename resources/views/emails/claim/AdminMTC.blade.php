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
    <p>Please be advised that there are claim applications that need your attention.
    </p>
    <br>
    <br>
    <br>

    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') . '/adminApprovalView' }}"><button>Click Here</button></a>
    <br>
    <br>
    <p>
        Best regards,<br>
        {{-- {{ dd(getEmployeeDetail(Auth::user()->id)) }} --}}
        {{ $employeeName ?? '-' }} <br>
        {{ getEmployeeDetail(Auth::user()->id)->designation->designationName ?? '-' }} <br>
        {{ getEmployeeDetail(Auth::user()->id)->department->departmentName ?? '-' }} <br>
    </p>
</body>

</html>
