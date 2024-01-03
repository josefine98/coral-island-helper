<section class="offerings">
    <div class="back-to-frontpage">
        <a href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(URL::to('/')); ?>/images/icons8-arrow-50.png" alt="">
        </a>
    </div>
    <h1>Lake Temple</h1>

    <div class="nav">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $altars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $altar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $altarKey = $altar['key'];
        ?>
        <button class="nav-btn <?php echo $altarKey ?>" onclick="openTab('<?php echo $altarKey ?>')"><?php echo e($altar['offeringGroupTitle']); ?></button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $altars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $altar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $altarKey = $altar['key']; ?>
    <section class="altar" id="<?php echo $altarKey ?>">
        <h2 class="altar-reward"><?php echo e($altar['offeringGroupTitle']); ?> <?php echo e($altar['offeringGroupRewardText']); ?></h2>
        <section class="altar-categories">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $altar['offerings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="altar-category">
                <img class="category-icon" src="<?php echo e(URL::to('/')); ?>/images/offering/<?php echo e($category['imageName']); ?>.png" alt="">
                <h3><?php echo e($category['title']); ?></h3>
                <section class="category-reward">
                    <p>Reward: <?php echo e($category['rewards']['items'][0]['amount']); ?> x <?php echo e($category['rewards']['items'][0]['item']['displayName']); ?></p>
                    <img src="<?php echo e(URL::to('/')); ?>/images/icons/<?php echo e($category['rewards']['items'][0]['item']['iconName']); ?>.webp" alt="">
                </section>
                <!--[if BLOCK]><![endif]--><?php if($category['numOfItemRequired'] != -1): ?>
                <p>No. of items required: <?php echo e($category['numOfItemRequired']); ?></p>
                <?php else: ?>
                <p>No. of items required: All items</p>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                <section class="items">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $category['requiredItems']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <input class="item-checkbox" type="checkbox" id=" <?php echo e($item['item']['iconName']); ?>" name="checkbox">
                        <div class="item-icons">
                            <!--[if BLOCK]><![endif]--><?php if($item['quality'] != 'base'): ?>
                            <img class="item-quality-icon" src="<?php echo e(URL::to('/')); ?>/images/quality-stars/star-<?php echo e($item['quality']); ?>.png" alt="">
                            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                            <img class="item-icon" src="<?php echo e(URL::to('/')); ?>/images/icons/<?php echo e($item['item']['iconName']); ?>.webp" alt="">
                        </div>
                        <div class="item-text">
                            <h5><?php echo e($item['amount']); ?> <?php echo e($item['item']['displayName']); ?></h5>

                            <div class="how-to-find">
                                <!--[if BLOCK]><![endif]--><?php if(array_key_exists('location', $item['item'])): ?>
                                <div>
                                    <p>Location:</p>
                                    <p><?php echo e($item['item']['location']); ?></p>
                                </div>
                                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if(array_key_exists('season', $item['item'])): ?>
                                <div>
                                    <p>Season:</p>
                                    <p><?php echo e($item['item']['season']); ?></p>
                                </div>
                                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if(array_key_exists('weather', $item['item'])): ?>
                                <div>
                                    <p>Weather:</p>
                                    <p><?php echo e($item['item']['weather']); ?></p>
                                </div>
                                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if(array_key_exists('timeOfDay', $item['item'])): ?>
                                <div>
                                    <p>Time of day:</p>
                                    <p><?php echo e($item['item']['timeOfDay']); ?></p>
                                </div>
                                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if(array_key_exists('growthTime', $item['item'])): ?>
                                <div>
                                    <p>Growth time:</p>
                                    <p><?php echo e($item['item']['growthTime']); ?></p>
                                </div>
                                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if(array_key_exists('unlockRequirements', $item['item'])): ?>
                                <div>
                                    <p>Unlock requirements:</p>
                                    <p><?php echo e($item['item']['unlockRequirements']); ?></p>
                                </div>
                                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                </section>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
        </section>
    </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
</section>
<script>

    //tabs
    document.querySelector('.nav-btn.CropBased').classList.add('active');

    function openTab(altar) {
        let i;
        let altars = document.getElementsByClassName("altar");
        let nav = document.getElementsByClassName("nav-btn");
        for (i = 0; i < altars.length; i++) {
            altars[i].style.display = "none";
            nav[i].classList.remove('active');
        }

        let element = document.getElementById(altar);
        element.style.display = "block";
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

</script>
<!--<p><?php echo '<pre>';
        print_r($altar);
        echo '</pre>'; ?> </p>--><?php /**PATH /Users/josefine/Documents/GitHub/coral-island-helper/coral-island-helper/resources/views/livewire/offerings.blade.php ENDPATH**/ ?>