<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <link rel="icon" href="/favicon.ico">

        <!-- Scripts -->
        <script src="<?php echo e(asset('/js/app.js')); ?>" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Fonte awasome Icones-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

        <!-- Styles -->
        <link href="<?php echo e(asset('/css/app.css')); ?>" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <main> <App></App> </main>
        </div>
    </body>
</html><?php /**PATH /var/www/resources/views/App.blade.php ENDPATH**/ ?>