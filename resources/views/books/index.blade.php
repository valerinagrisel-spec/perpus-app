@extends('layouts.app')

@section('content')

<h2 class="page-title">Daftar Buku</h2>

@if(auth()->user()->role == 'admin')

<a href="{{ route('books.create') }}"
    class="btn btn-primary mb-4">

    + Tambah Buku

</a>

@endif

<div class="card card-custom p-3">

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-dark">

                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Author</th>
                    <th>Kategori</th>
                    <th>Stock</th>
                    <th width="250">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @foreach($books as $book)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $book->title }}</strong>
                    </td>

                    <td>{{ $book->author }}</td>

                    <td>
                        <span class="badge bg-secondary">
                            {{ $book->category->name }}
                        </span>
                    </td>

                    <td>{{ $book->stock }}</td>

                    <td>

                        <a href="{{ route('books.show', $book->id) }}"
                            class="btn btn-info btn-sm text-white">

                            Detail

                        </a>

                        @if(auth()->user()->role == 'member')

                        <form action="{{ route('borrow.store', $book->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf

                            <button type="submit"
                                class="btn btn-success btn-sm">

                                Pinjam

                            </button>

                        </form>

                        @endif

                        @if(auth()->user()->role == 'admin')

                        <a href="{{ route('books.edit', $book->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('books.destroy', $book->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus buku?')">

                                Hapus

                            </button>

                        </form>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection