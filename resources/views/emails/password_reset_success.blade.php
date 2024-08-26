<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mã OTP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            font-size: 1.25rem;
            padding: 1rem;
        }
        .card-body {
            padding: 2rem;
        }
        .card-body h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 1.5rem 0;
            color: #007bff;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
            padding: 1.5rem;
            font-size: 0.875rem;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            color: #6c757d;
        }
        .card-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .card-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Hello {{ $user->name }},!
                    <br>
                    You have successfully changed your EnglishLab account password.
                </div>
                <div class="card-body text-center">
                    <p>Your password has been successfully reset on {{ $datetime }}.</p>
                    <p>If you did not perform this action, or if you do not recognize the following device, please contact our support team immediately.</p>
                    <p><strong>Device:</strong> {{ $device }}</p>
                </div>
                <div class="card-footer text-center">
                    <p>Thank you,</p>
                    <p>{{ config('app.name') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
