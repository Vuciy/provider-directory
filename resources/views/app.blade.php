<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Providers</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .provider { display: flex; margin-bottom: 20px; }
        img { max-width: 100px; }
    </style>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app" data-page="{{ json_encode($page) }}">
    </div>
</body>
</html>