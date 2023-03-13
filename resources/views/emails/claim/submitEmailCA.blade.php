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
    <p>To : {{ $HOD->employeeName ?? '-' }}</p>
    <p>I hereby submit my cash advance for your kind review. </p>
    <p>The details are :-</p>
    <br>
    <br>
    <p><strong>Claim ID </strong> : {{ $data['data']->id ?? '-' }}</p>
    <p><strong>Name </strong> : {{ $employee->employeeName ?? '-' }} </p>
    <p><strong>Claim for </strong> : {{ $data['data']->travel_date ?? '-' }} </p>
    <p><strong>Applied Date & Time </strong> : {{ $data['data']->created_at ?? '-' }} </p>
    <p><strong>Total Claim </strong> : {{ $data['data']->amount ?? '0' }} </p>

    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') . '/cashAdvanceApproverView' }}"><button>Click Here</button></a>
    <br>
    <br>
    <p>
        Best regards,<br>
        {{-- {{ dd(getEmployeeDetail(Auth::user()->id)) }} --}}
        {{ $employee->employeeName ?? '-' }} <br>
        {{ $employee->designationData->designationName ?? '-' }} <br>
        {{ $employee->departmentData->departmentName ?? '-' }} <br>
    </p>
</body>

</html>
