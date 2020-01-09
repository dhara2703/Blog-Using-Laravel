<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Document</title>
</head>
<body>

     <!-- Blade is a Laravel's templating engine. Laravel reads a blade file and compile 
          it to vanilla php and use it to serve the file. For php <\?php is used while in 
          blade language only @ symbol is required. To echo data: instead of  <\?= this 
          sign we can wrap it with {/{ variable name}}  -->


    <!-- Episode - 5 : Ways of displaying name  -->
    <!-- <h1>Hello, </?php echo $name; ?></h1>
    <h1>Hello, </?= $name; ?></h1>         -->
    <h1>This is a Welcome Page</h1><br><br>
    <ul>
        <?php foreach($tasks as $task): ?>
            <li><?= $task->body; ?></li>
        <?php endforeach; ?>
    </ul>

    <br/>

    <ul>
        @foreach($tasks as $task)
        <li>{{ $task->body}}</li>
        @endforeach
    </ul>

</body>
</html>