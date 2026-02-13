@foreach($categories as $cat)
<tr>
    <td>{{ $cat->name }}</td>
    <td>{{ $cat->parent?->name ?? 'Root' }}</td>
    <td>
        <a href="{{ route('categories.edit',$cat) }}">Sửa</a>
        <form method="POST" action="{{ route('categories.destroy',$cat) }}">
            @csrf @method('DELETE')
            <button>Xóa</button>
        </form>
    </td>
</tr>
@endforeach
