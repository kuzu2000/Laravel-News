<x-news-layout>
    <ol class="breadcrumb-lists">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">{{$news->category->name}}</li>
        <li class="breadcrumb-item">{{$news->category_name}}</li>
        <li class="breadcrumb-item">News Details</li>
      </ol>
    <main class="news-deatil-main">
        <h1>{{$news->title}}</h1>
        <picture>
          <img
            src="https://preview.colorlib.com/theme/megasis/assets/img/gallery/whats_news_details1.jpg.webp"
            alt={{$news->title}}
            srcset=""
          />
        </picture>
        <div class="news-author">
          <p>{{$news->user->name}}</p>
          <span>{{date('M jS Y H:i:s', strtotime($news->created_at))}}</span>
        </div>

        <div>
          @if($news->news_type === 'Premium')
              @if(auth()->user()?->sub_expire > date('Y-m-d'))
                <div style="font-size:18px;line-height: 28px;">{!! $news->description !!}</div>
              @else
                <div class="please-subscribe">
                  <p>
                    Please consider supporting our news website with a paid subscption to our website, which will unlock all the premium posts like below and more. Click <strong>Subscribe Now</strong>
                    to read all the updated news now.
                  </p>
                  <a href="/plans" role="button">Subscribe Now</a>
                </div>
              @endif
          @else
          <div style="font-size:18px;line-height: 28px;">{!! $news->description !!}</div>
          @endif
        </div>
        </div>
      </main>
</x-news-layout>