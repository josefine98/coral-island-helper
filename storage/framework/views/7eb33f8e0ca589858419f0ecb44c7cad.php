<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coral Island Helper</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="frontpage">
    <img src="<?php echo e(URL::to('/')); ?>/images/Lily_default-spring.webp" alt="">
    <div class="content">
        <img src="<?php echo e(URL::to('/')); ?>/images/Coral_Island_logo.webp" alt="">
        <h1>Lake temple & museum helper</h1>

        <div class="frontpage-nav">
            <a href="<?php echo e(url('offerings')); ?>">Offerings</a>
            <a href="<?php echo e(url('museum')); ?>">Museum</a>
        </div>

        <div class="animals">
            <img src="<?php echo e(URL::to('/')); ?>/images/Bonbon_full_-_default.webp" alt="">
            <img src="<?php echo e(URL::to('/')); ?>/images/Grantle.webp" alt="">
            <img src="<?php echo e(URL::to('/')); ?>/images/Grog_default-spring.webp" alt="">
            <img src="<?php echo e(URL::to('/')); ?>/images/Peanut_happy-spring.webp" alt="">
            <img src="<?php echo e(URL::to('/')); ?>/images/Taco_default-spring.webp" alt="">
        </div>
    </div>
    <img src="<?php echo e(URL::to('/')); ?>/images/Sunny_default-spring.webp" alt="">
</body>

</html><?php /**PATH /Users/josefine/Documents/GitHub/coral-island-helper/coral-island-helper/resources/views/welcome.blade.php ENDPATH**/ ?>