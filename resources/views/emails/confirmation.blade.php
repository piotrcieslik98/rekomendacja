<!DOCTYPE html>
<html>
<head>
    <title>Potwierdzenie wysłania wiadomości</title>
</head>
<body>
<h1>Dziękujemy za kontakt!</h1>
<p>Twoja wiadomość została pomyślnie wysłana.</p>
<p><strong>Twoje dane:</strong></p>
<ul>
    <li><strong>E-mail:</strong> {{ $email }}</li>
    <li><strong>Temat:</strong> {{ $topic }}</li>
    <li><strong>Wiadomość:</strong> {{ $messageContent }}</li>
</ul>
<p>Skontaktujemy się z Tobą najszybciej, jak to możliwe.</p>
</body>
</html>
