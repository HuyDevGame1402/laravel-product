<form method="POST" action="{{ route('categories.update',$category) }}">
@csrf @method('PUT')

<input name="name" value="{{ $category->name }}">

<select name="parent_id">
    <option value="">-- Không có --</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}"
            {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select>

<button>Cập nhật</button>
</form>
