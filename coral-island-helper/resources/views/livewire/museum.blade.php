<section class="offerings">
    <div class="back-to-frontpage">
        <a href="{{ url('/') }}">
            <img src="{{ URL::to('/') }}/images/icons8-arrow-50.png" alt="">
        </a>
    </div>
    <h1>Museum ?`???</h1>

    <div class="altar-nav">
        @foreach ($donations as $category)
        <?php
        $categoryKey = $category['key'];
        ?>
        <button class="altar-btn <?php echo $categoryKey ?>" onclick="openTab('<?php echo $categoryKey ?>')">{{ $category['key'] }}</button>
        @endforeach
    </div>
    @foreach ($donations as $category)
    <?php $categoryKey = $category['key']; ?>
    <section class="altar" id="<?php echo $categoryKey ?>">
        @foreach ($category[$categoryKey] as $item)
            <div>
                <img class="item-icon" src="{{ URL::to('/') }}/images/icons/{{ $item['iconName'] }}.webp" alt="">
                <h5>{{ $item['displayName'] }}</h5>
                <input class="item-checkbox" type="checkbox" id=" {{ $item['iconName']}}" name="checkbox">
            </div>
        @endforeach
    </section>
    @endforeach
</section>
<script>
    //tabs
    document.querySelector('.altar-btn.Artifacts').classList.add('active');

    function openTab(altar) {
        let i;
        let altars = document.getElementsByClassName("altar");
        let nav = document.getElementsByClassName("altar-btn");
        for (i = 0; i < altars.length; i++) {
            altars[i].style.display = "none";
            nav[i].classList.remove('active');
        }

        let element = document.getElementById(altar);
        element.style.display = "block";
        let button = document.querySelector(`.altar-btn.${altar}`);
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