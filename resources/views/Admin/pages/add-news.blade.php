@section('title')
Add Product
@endsection

<x-layout>
<div class="dashboard-menu">
    <div class="menu-form">
      <h1>News Create Form</h1>
      <form action="/store-news" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-field">
          <label>News Title<span>Required</span></label>
          <input type="text" name="title" placeholder="News Title" />
        </div>
          <div class="form-field">
            <label>Parent Category <span>Required</span></label>
            <select name="category_id">
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-field">
            <label>News Category <span>Required</span></label>
            <select name="category_name">
              @foreach($subcategoryCategories as $category)
              <option value="{{$category->name}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-field">
            <label>News Type <span>Required</span></label>
            <select name="news_type">
              <option value="Free">Free</option>
              <option value="Premium">Premium</option>
            </select>
          </div>
          <div class="form-field">
            <label>News Description <span>Required</span></label>
            <textarea id="markdown-editor" name="description">Enter text here...</textarea>
          </div>
        <div class="form-field">
          <label>News Thunbnail <span>Required</span></label>
          <label for="image"
            ><i class="fa fa-image text"> Upload a file</i>
          </label>
          <input type="file" id="image" name="image" />
        </div>
        <button class="add-button" type="submit">Add News</button>
      </form>
    </div>
  </div>
  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
  <script>
      const easyMDE = new EasyMDE({
          showIcons: ['heading', 'heading-bigger', 'heading-smaller', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
          element: document.getElementById('markdown-editor')});
  </script>
  @endpush
</x-layout>