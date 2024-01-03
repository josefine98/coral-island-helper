<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
        <title><?php echo e($title ?? 'Page Title'); ?></title>

    </head>
    <body>
        <?php echo e($slot); ?>

    </body>
</html>
<?php /**PATH /Users/josefine/Documents/GitHub/coral-island-helper/coral-island-helper/resources/views/components/layouts/app.blade.php ENDPATH**/ ?>