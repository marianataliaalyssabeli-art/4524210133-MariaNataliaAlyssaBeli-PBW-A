<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat admin jika belum tersedia
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        // Membuat 10 author jika belum tersedia
        if (Author::count() === 0) {
            $authors = Author::factory(10)->create();
        } else {
            $authors = Author::all();
        }

        // Membuat 50 buku jika belum tersedia
        if (Book::count() === 0) {
            Book::factory(50)->make()->each(function ($book) use ($authors) {
                $book->author_id = $authors->random()->id;
                $book->save();
            });
        }
    }
}