<!DOCTYPE html>
<html>

<head>
    <title>Edit Buku</title>
</head>

<body>

    <h1>Edit Buku</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kategori</label><br>
        <select name="category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ $book->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select><br><br>

        <label>Judul</label><br>
        <input type="text" name="title" value="{{ $book->title }}"><br><br>

        <label>Penulis</label><br>
        <input type="text" name="author" value="{{ $book->author }}"><br><br>

        <label>Penerbit</label><br>
        <input type="text" name="publisher" value="{{ $book->publisher }}"><br><br>

        <label>Tahun</label><br>
        <input type="text" name="year" value="{{ $book->year }}"><br><br>

        <label>Stok</label><br>
        <input type="number" name="stock" value="{{ $book->stock }}"><br><br>

        <button type="submit">Update Buku</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>

</body>

</html>