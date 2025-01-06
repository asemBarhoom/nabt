<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add your custom email styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .email-content {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<div class="email-content">
    <h1>New Contact Form Submission</h1>
    <p>A new contact form submission has been received:</p>
    <ul>
        <li><strong>Name:</strong> {{ $userData['name'] }}</li>
        <li><strong>Email:</strong> {{ $userData['email'] }}</li>
        <li><strong>Message:</strong> {{ $userData['message'] }}</li>
    </ul>
    <p>Thanks,<br>
        {{ config('app.name') }}</p>
</div>
</body>
</html>
