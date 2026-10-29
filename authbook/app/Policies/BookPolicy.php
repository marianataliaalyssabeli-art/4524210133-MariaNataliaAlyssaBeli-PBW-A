<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    // Semua role dapat melihat daftar buku
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'staff',
            'viewer',
        ]);
    }

    // Semua role dapat melihat detail buku
    public function view(User $user, Book $book): bool
    {
        return in_array($user->role, [
            'admin',
            'staff',
            'viewer',
        ]);
    }

    // Hanya Admin dan Staff yang dapat membuat buku
    public function create(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'staff',
        ]);
    }

    // Hanya Admin dan Staff yang dapat mengedit buku
    public function update(User $user, Book $book): bool
    {
        return in_array($user->role, [
            'admin',
            'staff',
        ]);
    }

    // Hanya Admin yang dapat menghapus buku
    public function delete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    // Hanya Admin yang dapat menghapus banyak buku sekaligus
    public function deleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    // Hanya Admin yang dapat memulihkan buku
    public function restore(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    // Hanya Admin yang dapat menghapus buku secara permanen
    public function forceDelete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    // Hanya Admin yang dapat menghapus banyak buku secara permanen
    public function forceDeleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }
}