<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;

class BorrowingController extends Controller
{
    // Menampilkan semua data peminjaman
    public function index()
    {
        $borrowings = Borrowing::with(['user', 'book'])->get();

        return view('borrowings.index', compact('borrowings'));
    }

    // Menyimpan peminjaman buku
    public function store(int $bookId)
    {
        $book = Book::findOrFail($bookId);

        // cek stok
        if ($book->stock <= 0) {
            return back()->with('error', 'Stok buku habis');
        }

        // simpan peminjaman
        Borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrow_date' => now(),
            'status' => 'borrowed',
        ]);

        // kurangi stok
        $book->decrement('stock');

        return back()->with('success', 'Buku berhasil dipinjam');
    }

    // Riwayat peminjaman user login
    public function myBorrowings()
    {
        $borrowings = Borrowing::with('book')
            ->where('user_id', Auth::id())
            ->get();

        return view('borrowings.my', compact('borrowings'));
    }

    // Return buku
    public function returnBook(int $id)
    {
        $borrowing = Borrowing::findOrFail($id);

        // cek apakah sudah dikembalikan
        if ($borrowing->status == 'returned') {
            return back()->with('error', 'Buku sudah dikembalikan');
        }

        // update status
        $borrowing->status = 'returned';
        $borrowing->return_date = now();

        // tambah stok buku
        $book = $borrowing->book;
        $book->stock += 1;
        $book->save();

        // simpan perubahan
        $borrowing->save();

        return back()->with('success', 'Buku berhasil dikembalikan');
    }

    // Hapus borrowing
    public function destroy(int $id)
    {
        $borrowing = Borrowing::findOrFail($id);

        // kalau masih dipinjam, stok dikembalikan
        if ($borrowing->status == 'borrowed') {

            $book = $borrowing->book;
            $book->stock += 1;
            $book->save();
        }

        $borrowing->delete();

        return back()->with('success', 'Peminjaman berhasil dihapus');
    }
}
