<x-news-layout>
    <ol class="breadcrumb-lists">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">{{$categoryHeader->parent->name}}</li>
        <li class="breadcrumb-item">{{$categoryHeader->name}}</li>
      </ol>
      <article class="news-lists-article">
          <div class="news-lists-article-container">
            <div class="news-lists-header">
              <h1>{{$categoryHeader->name}}</h1>
            </div>
            <div class="news-list">
              @foreach($news as $new)
                <article class="news-article">
                  <picture>
                    <img
                      src="https://preview.colorlib.com/theme/megasis/assets/img/gallery/culture2.jpg.webp"
                      alt={{$new->title}}
                      srcset=""
                    />
                  </picture>
                  <div class="news-article-info">
                    <span>{{$new->category->name}}</span>
                    <h4>
                      <a href="/news/{{$new->id}}">
                        {{$new->title}}
                      </a>
                    </h4>
                    <p>By {{$new->user->name}}</p>
                  </div>
                </article>
                @endforeach
            </div>
          </div>
        </article>
</x-news-layout>