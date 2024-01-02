<section class="offerings">
    <div class="back-to-frontpage">
        <a href="{{ url('/') }}">
            <img src="{{ URL::to('/') }}/images/icons8-arrow-50.png" alt="">
        </a>
    </div>
    <h1>Lake Temple</h1>

    <div class="nav">
        @foreach ($altars as $altar)
        <?php
        $altarKey = $altar['key'];
        ?>
        <button class="nav-btn <?php echo $altarKey ?>" onclick="openTab('<?php echo $altarKey ?>')">{{ $altar['offeringGroupTitle'] }}</button>
        @endforeach
    </div>

    @foreach ($altars as $altar)
    <?php $altarKey = $altar['key']; ?>
    <section class="altar" id="<?php echo $altarKey ?>">
        <h2 class="altar-reward">{{ $altar['offeringGroupTitle'] }} {{ $altar['offeringGroupRewardText'] }}</h2>
        <section class="altar-categories">
            @foreach ($altar['offerings'] as $category)
            <section class="altar-category">
                <img class="category-icon" src="{{ URL::to('/') }}/images/offering/{{ $category['imageName'] }}.png" alt="">
                <h3>{{ $category['title'] }}</h3>
                <section class="category-reward">
                    <p>Reward: {{ $category['rewards']['items'][0]['amount'] }} x {{ $category['rewards']['items'][0]['item']['displayName'] }}</p>
                    <img src="{{ URL::to('/') }}/images/icons/{{ $category['rewards']['items'][0]['item']['iconName'] }}.webp" alt="">
                </section>
                @if($category['numOfItemRequired'] != -1)
                <p>No. of items required: {{ $category['numOfItemRequired'] }}</p>
                @else
                <p>No. of items required: All items</p>
                @endif
                <section class="items">
                    @foreach ($category['requiredItems'] as $item)
                    <div class="item">
                        <input class="item-checkbox" type="checkbox" id=" {{ $item['item']['iconName']}}" name="checkbox">
                        <div class="item-icons">
                            @if($item['quality'] != 'base')
                            <img class="item-quality-icon" src="{{ URL::to('/') }}/images/quality-stars/star-{{ $item['quality'] }}.png" alt="">
                            @endif
                            <img class="item-icon" src="{{ URL::to('/') }}/images/icons/{{ $item['item']['iconName'] }}.webp" alt="">
                        </div>
                        <div class="item-text">
                            <h5>{{ $item['amount']}} {{ $item['item']['displayName']}}</h5>

                            <div class="how-to-find">
                                @if(array_key_exists('location', $item['item']))
                                <div>
                                    <p>Location:</p>
                                    <p>{{ $item['item']['location'] }}</p>
                                </div>
                                @endif

                                @if(array_key_exists('season', $item['item']))
                                <div>
                                    <p>Season:</p>
                                    <p>{{ $item['item']['season'] }}</p>
                                </div>
                                @endif

                                @if(array_key_exists('weather', $item['item']))
                                <div>
                                    <p>Weather:</p>
                                    <p>{{ $item['item']['weather'] }}</p>
                                </div>
                                @endif

                                @if(array_key_exists('timeOfDay', $item['item']))
                                <div>
                                    <p>Time of day:</p>
                                    <p>{{ $item['item']['timeOfDay'] }}</p>
                                </div>
                                @endif

                                @if(array_key_exists('growthTime', $item['item']))
                                <div>
                                    <p>Growth time:</p>
                                    <p>{{ $item['item']['growthTime'] }}</p>
                                </div>
                                @endif

                                @if(array_key_exists('unlockRequirements', $item['item']))
                                <div>
                                    <p>Unlock requirements:</p>
                                    <p>{{ $item['item']['unlockRequirements'] }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </section>
            </section>
            @endforeach
        </section>
    </section>
    @endforeach
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
        echo '</pre>'; ?> </p>-->