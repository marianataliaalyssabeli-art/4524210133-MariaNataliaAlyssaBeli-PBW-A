<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use App\Models\Book;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LibraryStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Buku', Book::count())
                ->description('Jumlah seluruh buku')
                ->icon('heroicon-o-book-open'),

            Stat::make('Jumlah Penulis', Author::count())
                ->description('Jumlah seluruh penulis')
                ->icon('heroicon-o-users'),

            Stat::make(
                'Books Available',
                Book::where('status', 'available')->count()
            )
                ->description('Buku yang tersedia')
                ->icon('heroicon-o-check-circle'),

            Stat::make(
                'Books Borrowed',
                Book::where('status', 'borrowed')->count()
            )
                ->description('Buku yang sedang dipinjam')
                ->icon('heroicon-o-clock'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}