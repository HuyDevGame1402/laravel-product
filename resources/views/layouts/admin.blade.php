<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
        <p>
            Quản lý Danh mục
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
                <p>Xem danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('categories.create') }}" class="nav-link">
                <p>Thêm mới</p>
            </a>
        </li>
    </ul>
</li>
