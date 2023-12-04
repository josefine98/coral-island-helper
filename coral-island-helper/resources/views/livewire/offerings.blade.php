
<section class="offerings">
    <a href="{{ url('/') }}">tilbage</a>
    <h1>Lake Temple</h1>
    @foreach ($altars as $altar)
        <section>
            <h2>{{ $altar['offeringGroupTitle'] }}</h2>
            <p>{{ $altar['offeringGroupRewardText'] }}</p>
            @foreach ($altar['offerings'] as $category)
            <section>
            <img src="{{ URL::to('/') }}/images/offering/{{ $category['imageName'] }}.png" alt="">
                <h3>{{ $category['title'] }}</h3>
                <p>Reward name: {{ $category['rewards']['items'][0]['item']['displayName'] }}</p>

                @if($category['numOfItemRequired'] != -1)
                    <p>Number of items required: {{ $category['numOfItemRequired'] }}</p>
                @endif

                <p>Reward amount: {{ $category['rewards']['items'][0]['amount'] }}</p>
                <img src="{{ URL::to('/') }}/images/icons/{{ $category['rewards']['items'][0]['item']['iconName'] }}.webp" alt="">
                <h4>Required items</h4>
                <section>
                @foreach ($category['requiredItems'] as $item)
                    <h5>{{ $item['amount']}} {{ $item['item']['displayName']}}</h5>
                    <img src="{{ URL::to('/') }}/images/icons/{{ $item['item']['iconName'] }}.webp" alt="">
                    @if($item['quality'] != 'base')
                        <p>Quality: {{ $item['quality']}}</p>
                    @endif
                @endforeach
                </section>
                </section>
            @endforeach
        </section>
    @endforeach
</section>
        <!--<p><?php  echo '<pre>'; print_r($altar); echo '</pre>'; ?> </p>-->
