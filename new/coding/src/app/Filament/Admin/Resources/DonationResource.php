<?php

// Namespace untuk resource Filament admin Donation
namespace App\Filament\Admin\Resources;

// Import class-page terkait dan model Donation
use App\Filament\Admin\Resources\DonationResource\Pages; // Halaman yang tersedia seperti edit dan list
use App\Models\Donation; // Model utama donation yang akan dikelola

// Import komponen dari Filament untuk forms dan tables
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;

// Kelas utama DonationResource yang mewakili resource donasi di panel admin
class DonationResource extends Resource
{
    // Menentukan model yang digunakan resource ini
    protected static ?string $model = Donation::class;

    // Ikon navigasi di sidebar admin
    protected static ?string $navigationIcon = 'heroicon-o-gift';

    // Label menu pada sidebar admin
    protected static ?string $navigationLabel = 'Donations';

    // Grup navigasi pada sidebar admin
    protected static ?string $navigationGroup = 'Donations Management';

    // Form input ketika membuat atau mengedit donasi
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('program_id')
                ->label('Program Donasi')
                ->relationship('program', 'judul')
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('nama')
                ->required()
                ->label('Nama Donatur'),

            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->label('Email'),

            Forms\Components\TextInput::make('nominal')
                ->required()
                ->numeric()
                ->label('Nominal'),

            Forms\Components\TextInput::make('metode_pembayaran')
                ->label('Metode Pembayaran')
                ->disabled(),

            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])
                ->required()
                ->label('Status'),

            Forms\Components\Textarea::make('keterangan')
                ->label('Catatan Admin'),

            Forms\Components\FileUpload::make('bukti_transfer')
                ->label('Bukti Transfer')
                ->image()
                ->disk('public')
                ->directory('bukti-transfer')
                ->disabled(),
        ]);
    }

    // Tabel data untuk menampilkan semua donasi
    public static function table(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('program.judul')
                    ->label('Program')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('nominal')
                    ->label('Nominal')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('metode_pembayaran')
                    ->label('Metode Pembayaran'),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->sortable(),

                ImageColumn::make('bukti_transfer')
                    ->label('Bukti Transfer')
                    ->disk('public')
                    ->height(40),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('program_id')
                    ->label('Filter Program')
                    ->relationship('program', 'judul'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
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

//✅ Kesimpulan
//File DonationResource.php ini adalah konfigurasi resource Filament Admin yang memungkinkan admin mengelola data donasi dengan:
//Form input lengkap: program donasi, nama, email, nominal, metode, status, dan bukti transfer.
//Tabel yang menampilkan data donasi dengan kolom penting: program, nominal, status (dengan badge warna), serta bukti transfer.
//Dukungan edit dan hapus data secara individual maupun massal.
//Keunggulan:
//Memudahkan pengelolaan donasi melalui antarmuka visual.
//Integrasi otomatis dengan relasi program.
//Tersedia validasi dan pembacaan data yang aman (misal: file hanya readonly).
//File ini sangat penting sebagai antarmuka admin profesional untuk memverifikasi, menyetujui, dan mengelola riwayat donasi dengan rapi dan efisien.