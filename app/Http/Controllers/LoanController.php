<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Book;
use App\Models\User;

class LoanController extends Controller
{

    public function index()
    {
        $loans = Loan::with(['member', 'user', 'loanItems.book'])->paginate(10);
    
        foreach ($loans as $loan) {
            if (
                $loan->status === 'dipinjam' &&
                $loan->tanggal_kembali < now()->toDateString()
            ) {
                $loan->status = 'terlambat';
            }
        }
    
        return view('loans.index', compact('loans'));
    }

public function show(string $id)
{
    $loan = Loan::with(['member', 'user', 'loanItems.book'])->findOrFail($id);

    return view('loans.show', compact('loan'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'member_id' => 'required|integer|exists:members,id',
        'user_id' => 'required|integer|exists:users,id',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        'book_ids' => 'required|array|min:1',
        'book_ids.*' => 'integer|exists:books,id',
    ]);

    $loan = Loan::create([
        'member_id' => $validated['member_id'],
        'user_id' => $validated['user_id'],
        'tanggal_pinjam' => $validated['tanggal_pinjam'],
        'tanggal_kembali' => $validated['tanggal_kembali'],
    ]);

    foreach ($validated['book_ids'] as $bookId) {
        $loan->loanItems()->create(['book_id' => $bookId]);
    }

    return redirect()->route('loans.index')
        ->with('success', 'Transaksi peminjaman berhasil dibuat.');
}

public function create()
{
    $members = Member::all();
    $books = Book::all();
    $users = User::all();

    return view('loans.create', compact('members', 'books', 'users'));
}

public function edit(string $id)
{
    $loan = Loan::with(['member', 'user', 'loanItems.book'])->findOrFail($id);

    return view('loans.edit', compact('loan'));
}

public function update(Request $request, string $id)
{
    $loan = Loan::findOrFail($id);

    $validated = $request->validate([
        'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        'status' => 'required|in:dipinjam,dikembalikan,terlambat',
    ], [
        'tanggal_kembali.required' => 'Tanggal kembali wajib diisi.',
        'tanggal_kembali.after_or_equal' => 'Tanggal kembali tidak boleh sebelum tanggal pinjam.',
    ]);

    $loan->update($validated);

    return redirect()->route('loans.index')
        ->with('success', 'Transaksi peminjaman berhasil diperbarui.');
}

public function destroy(string $id)
{
    $loan = Loan::findOrFail($id);
    $loan->loanItems()->delete();
    $loan->delete();

    return redirect()->route('loans.index')
        ->with('success', 'Transaksi peminjaman berhasil dihapus.');
}

public function kembalikan(string $id)
{
    $loan = Loan::findOrFail($id);

    $loan->update([
        'status' => 'dikembalikan',
        'tanggal_dikembalikan' => now()->toDateString(),
    ]);

    return redirect()->route('loans.index')
        ->with('success', 'Buku berhasil dikembalikan.');
}

}