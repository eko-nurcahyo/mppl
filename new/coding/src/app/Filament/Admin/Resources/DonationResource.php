<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DonationResource\Pages;
use App\Models\Donation;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Form Donasi, biasanya tidak perlu diedit dari admin
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('nominal')->label('Nominal')->money('IDR'),
                Tables\Columns\TextColumn::make('metode_pembayaran')->label('Metode Pembayaran'),
                Tables\Columns\TextColumn::make('status')->label('Status')
                    ->badge()
                    ->color(fn ($state) => [
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    ][$state] ?? 'secondary'),
                Tables\Columns\ImageColumn::make('bukti_transfer')->label('Bukti Transfer')->disk('public'),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->action(function ($record) {
                        $record->status = 'approved';
                        $record->save();
                        // TODO: Kirim email kwitansi jika perlu
                    }),
                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->color('danger')
                    ->icon('heroicon-o-x')
                    ->action(function ($record) {
                        $record->status = 'rejected';
                        $record->save();
                        // TODO: Kirim email penolakan jika perlu
                    }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
