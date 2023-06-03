@section('title')
Add Category
@endsection

<x-layout>
<div class="dashboard-menu">
    <div class="menu-form">
      <h1>News Create Form</h1>
      <form action="{{url('/store-category')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-field">
          <label>Category Name<span>Required</span></label>
          <input type="text" name="name" placeholder="Category Name" />
        </div>
        <div class="form-field">
            <label>Parent Category<span>Required</span></label>
            <select type="text" name="parent_id">
                <option value="">None</option>
                @if($categories)
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                @endif
            </select>
          </div>
        <button class="add-button" type="submit">Add Category</button>
      </form>
    </div>
  </div>
</x-layout>