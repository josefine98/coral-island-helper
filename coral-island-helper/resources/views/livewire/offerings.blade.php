
<div>
    <a href="{{ url('/') }}">tilbage</a>
    <h1>hej banana</h1>
    @foreach ($altars as $altar)
        <h2>{{ $altar['offeringGroupTitle'] }}</h2>
        @foreach ($altar['offerings'] as $test)
            <h3>{{ $test['title'] }}</h3>
            <p>Reward name: {{ $test['rewards']['items'][0]['item']['displayName'] }}</p>
            @if($test['numOfItemRequired'] != -1)
                <p>Number of items required: {{ $test['numOfItemRequired'] }}</p>
            @endif
            <p>Reward amount: {{ $test['rewards']['items'][0]['amount'] }}</p>
            <img src="{{ URL::to('/') }}/images/icons/{{ $test['rewards']['items'][0]['item']['iconName'] }}.webp" alt="">
        @endforeach

        <p><?php  echo '<pre>'; print_r($altar); echo '</pre>'; ?> </p>

    @endforeach

</div> 
