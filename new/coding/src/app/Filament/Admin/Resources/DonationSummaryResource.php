<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DonationSummaryResource\Pages;
use App\Models\Program;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;

class DonationSummaryResource extends Resource
{
    protected static ?string $model = Program::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Rekap Donasi';

    public static function table(Table $table): Table
    {
        return $table
            ->query(fn () => Program::with('donations'))
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Program')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('wilayah')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kategori')
                    ->sortable(),

                Tables\Columns\TextColumn::make('target_donasi')
                    ->money('IDR', true)
                    ->label('Target'),

                Tables\Columns\TextColumn::make('total_raised')
                    ->label('Total Semua Nominal')
                    ->getStateUsing(function ($record) {
                        return $record->donations()->where('status', 'approved')->sum('nominal');
                    })
                    ->money('IDR', true),

                Tables\Columns\TextColumn::make('progress')
                    ->label('Progress')
                    ->getStateUsing(function ($record) {
                        $total = $record->donations()->where('status', 'approved')->sum('nominal');
                        return $record->target_donasi > 0
                            ? number_format(($total / $record->target_donasi) * 100, 0) . '%'
                            : '0%';
                    }),

                Tables\Columns\IconColumn::make('target_terpenuhi')
                    ->label('Target Terpenuhi')
                    ->boolean()
                    ->getStateUsing(function ($record) {
                        $total = $record->donations()->where('status', 'approved')->sum('nominal');
                        return $record->target_donasi > 0 && $total >= $record->target_donasi;
                    }),
            ])
            ->filters([
                SelectFilter::make('wilayah')
                    ->options(Program::select('wilayah')->distinct()->pluck('wilayah', 'wilayah')),

                SelectFilter::make('kategori')
                    ->options(Program::select('kategori')->distinct()->pluck('kategori', 'kategori')),
            ])
            ->actions([
                Action::make('Lihat Detail')
                    ->label('Masuk')
                    ->url(fn ($record) => route('filament.admin.resources.programs.edit', ['record' => $record->id]))
                    ->icon('heroicon-o-arrow-right-circle'),

                Action::make('Hapus')
                    ->requiresConfirmation()
                    ->icon('heroicon-o-trash')
                    ->visible(fn ($record) =>
                        $record->donations()->where('status', 'approved')->sum('nominal') >= $record->target_donasi
                    )
                    ->action(fn ($record) => $record->delete()),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonationSummaries::route('/'),
        ];
    }
}
