<x-news-layout>
    <div class="subscription">
        <div class="subscription-container">
          <h2>SUBSCRIBE TO GET IN TOUCH WITH OUR INSIGHTS ON THE WORLD</h2>
          <div class="subscription-cards">
            @foreach($plans as $plan)
            <div class="subscription-card">       
              <div class="subscription-info">
                <h2>{{$plan->name}}</h2>
                <p class="sub-money">US ${{$plan->price}}</p>
                <p><strong>Duration:</strong> {{$plan->description}} month</p>
              </div>
              <div class="subscription-button">
                  <button><a href="{{route('plans.show', $plan->slug)}}">Subscribe</a></button>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
</x-news-layout>