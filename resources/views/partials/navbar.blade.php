<nav>
    <div class="brand">Perpustakaan Digital Kampus</div>
    <ul>
        <li><a href="{{ route('books.index') }}" class="{{ request()->routeIs('books.*') ? 'active' : '' }}">Buku</a></li>
        <li><a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">Kategori</a></li>
        <li><a href="{{ route('members.index') }}" class="{{ request()->routeIs('members.*') ? 'active' : '' }}">Anggota</a></li>
    </ul>
</nav>