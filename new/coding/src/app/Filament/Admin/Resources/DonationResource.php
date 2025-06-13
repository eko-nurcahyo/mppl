<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DonationResource\Pages;
use App\Models\Donation;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;
    protected static ?string $navigationIcon = 'heroicon-o-gift';
    protected static ?string $navigationLabel = 'Donations';
    protected static ?string $navigationGroup = 'Donations Management';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->required()->label('Nama Donatur'),
            Forms\Components\TextInput::make('email')->required()->email()->label('Email'),
            Forms\Components\TextInput::make('nominal')->required()->numeric()->label('Nominal'),
            Forms\Components\TextInput::make('metode_pembayaran')->label('Metode Pembayaran')->disabled(),
            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])
                ->required()
                ->label('Status'),
            Forms\Components\Textarea::make('keterangan')->label('Catatan Admin'),
            Forms\Components\FileUpload::make('bukti_transfer')
                ->label('Bukti Transfer')
                ->image()
                ->disk('public')
                ->directory('bukti-transfer')
                ->disabled(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
            Tables\Columns\TextColumn::make('nominal')->money('IDR')->label('Nominal'),
            Tables\Columns\TextColumn::make('metode_pembayaran')->label('Metode Pembayaran'),
            Tables\Columns\BadgeColumn::make('status')->label('Status')
                ->colors([
                    'warning' => 'pending',
                    'success' => 'approved',
                    'danger' => 'rejected',
                ])->sortable(),
            Tables\Columns\ImageColumn::make('bukti_transfer')->label('Bukti Transfer')->disk('public'),
            Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime()->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonations::route('/'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
