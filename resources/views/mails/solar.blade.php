<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paradise Digital World</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<div style="font-family: Open Sans; margin: 10px">
    <div style=" padding-top: 5px; padding-bottom: 20px; padding-right: 50px; padding-left: 50px; margin: 0px;">
        <h4>Dear {{ $training->name  }}, </h4>
        <h4>Solar Training Registration</h4>
        <p>
            You successfully registered for the solar Training, on <a href="{{ env('MAIN_URL') }}">Paradise Digital World</a>.</p>
        <p>
            Your payment reference is: <strong>{{ $training->ref }}</strong>
            <br>
            Please keep it safe for validation of yoour payment.
        </p>
        <p>
            Amount Paid: <strong>N 5,000</strong>
        </p>
    </div>
    <div style="margin: 0px; padding: 10px; text-align: center;">
        <p>Copyright &copy; <a href="{{ env('APP_URL') }}">Paradise Digital World</a> {{ date('Y') }}</p>
    </div>
</div>

</body>
</html>