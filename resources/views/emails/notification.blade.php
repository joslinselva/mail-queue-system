<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #007BFF;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }

        .footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
            border-top: 1px solid #e1e1e1;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Email Notification</h1>
        </div>
        <div class="content">
            <h3>Title: {{ $emailData['title'] }}</h2>
            <p><strong>Subject:</strong> {{ $emailData['subject'] }}</p>
            <p><strong>Message:</strong>{{ $emailData['body'] }}</p>
        </div>
        <div class="footer">
            Email Notification System
        </div>
    </div>
</body>

</html>
