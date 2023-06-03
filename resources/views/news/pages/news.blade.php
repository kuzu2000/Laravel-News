<x-news-layout>
    <div style="margin-top: 100px; text-align: center;">
        <h2>{{$categoryHeader->name}}</h2>
        <ul>
            @foreach($news as $new)
            <li><a href="/?category={{$new->category_id}}">{{$new->category_id}}</a></li>
            @endforeach
        </ul>
    </div>
</x-news-layout>