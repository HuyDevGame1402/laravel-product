<form method="POST" action="{{ route('categories.store') }}">
@csrf

<input name="name" placeholder="Tên danh mục">

<select name="parent_id">
    <option value="">-- Không có --</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select>

<textarea name="description"></textarea>

<button>Thêm</button>
</form>
