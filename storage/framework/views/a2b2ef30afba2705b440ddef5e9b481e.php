<section class="museum">
    <div class="back-to-frontpage">
        <a href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(URL::to('/')); ?>/images/icons8-arrow-50.png" alt="">
        </a>
    </div>
    <h1>Museum</h1>

    <div class="nav">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $categoryKey = $category['key'];
        ?>
        <button class="nav-btn <?php echo $categoryKey ?>" onclick="openTab('<?php echo $categoryKey ?>')"><?php echo e($category['key']); ?></button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
    </div>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $categoryKey = $category['key']; ?>
    <section class="donations" id="<?php echo $categoryKey ?>">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $category[$categoryKey]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="donation-item">
                <img class="item-icon" src="<?php echo e(URL::to('/')); ?>/images/icons/<?php echo e($item['iconName']); ?>.webp" alt="">
                <h5><?php echo e($item['displayName']); ?></h5>
                <input class="item-checkbox" type="checkbox" id=" <?php echo e($item['iconName']); ?>" name="checkbox">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
    </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
</section>
<script>
    //tabs
    document.querySelector('.nav-btn.Artifacts').classList.add('active');

    function openTab(altar) {
        let i;
        let altars = document.getElementsByClassName("donations");
        let nav = document.getElementsByClassName("nav-btn");
        for (i = 0; i < altars.length; i++) {
            altars[i].style.display = "none";
            nav[i].classList.remove('active');
        }

        let element = document.getElementById(altar);
        element.style.display = "flex";
        let button = document.querySelector(`.nav-btn.${altar}`);
        button.classList.add('active');
    }



    //Saving checkbox checked in local storage 
    let items = Array.from(document.getElementsByClassName('item-checkbox'));

    function save() {
        items.forEach(item => {
            localStorage.setItem(item.id, item.checked);
        });
    }

    //for loading
    items.forEach(item => {
        if (localStorage.getItem(item.id)) {
            let checked = JSON.parse(localStorage.getItem(item.id));
            document.getElementById(item.id).checked = checked;
        }
    });

    window.addEventListener('change', save); // Remove the parentheses after save
</script><?php /**PATH /Users/josefine/Documents/GitHub/coral-island-helper/coral-island-helper/resources/views/livewire/museum.blade.php ENDPATH**/ ?>