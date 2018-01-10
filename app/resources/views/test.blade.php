<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('722792494e8b215b8049', {
            cluster: 'ap1',
            encrypted: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('App\\Events\\UserHasRegistered', function(data) {
            alert(data);
            console.log(22222);
        });
    </script>
</head>
<body>
<h1>For Test</h1>
</body>
</html>