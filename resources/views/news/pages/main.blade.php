<x-news-layout>
    <main class="main-headline">
        <section class="main-section">
          <div class="main-container">
            <div class="headline-one">
              <article>
                <picture>
                  <img
                    src="https://preview.colorlib.com/theme/megasis/assets/img/gallery/whats_news_details1.jpg.webp"
                    alt={{$heading->title}}
                    srcset=""
                  />
                </picture>
                <div class="headline-info">
                  <span>{{$heading->category->name}}</span>
                  <h2>
                    <a href="/news/{{$heading->id}}">
                    {{$heading->title}}
                    </a>
                  </h2>
                  <p>By {{$heading->user->name}}</p>
                </div>
              </article>
            </div>
            <div class="headline-two">
              @foreach($newArticles as $newArticle)
              <article>
                <picture>
                  <img
                    src="https://preview.colorlib.com/theme/megasis/assets/img/gallery/whats_news_details1.jpg.webp"
                    alt={{$newArticle->title}}
                    srcset=""
                  />
                </picture>
                <div class="headline-info">
                  <span>{{$newArticle->category->name}}</span>
                  <h4>
                    {{$newArticle->title}}
                  </h4>
                  <p>By {{$newArticle->user->name}}</p>
                </div>
              </article>
              @endforeach
            </div>
          </div>
        </section>
      </main>
      <article class="sports-article">
        <div class="sports-article-container">
          <div class="sports-header">
            <h1>Sports</h1>
            <span><a href="/news/category/2">See All</a></span>
          </div>
          <div class="sport-article-list">
            @foreach($sports as $sport)
            <article class="sport-article">
              <picture>
                <img
                  src="https://preview.colorlib.com/theme/megasis/assets/img/gallery/culture2.jpg.webp"
                  alt={{$sport->title}}
                />
              </picture>
              <div class="sport-article-info">
                <span>{{$sport->category->name}}</span>
                <h4>
                  <a href="/news/{{$sport->id}}">
                  {{$sport->title}}
                  </a>
                </h4>
                <p>By {{$sport->user->name}}</p>
              </div>
            </article>
            @endforeach
          </div>
        </div>
      </article>
</x-news-layout>