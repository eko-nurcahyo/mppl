<?php

// Namespace untuk resource User di panel admin Filament
namespace App\Filament\Admin\Resources;

// Import halaman Filament dan model User
use App\Filament\Admin\Resources\UserResource\Pages;
use App\Models\User;

// Import komponen Filament untuk form & table
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// Import model & utilitas tambahan
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    // Model utama yang digunakan oleh resource ini
    protected static ?string $model = User::class;

    // Ikon menu di sidebar
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    // Kelompok menu di sidebar
    protected static ?string $navigationGroup = 'Administration';

    // Atribut utama yang ditampilkan sebagai judul record
    protected static ?string $recordTitleAttribute = 'name';

    // Urutan tampilan di sidebar (-2 artinya tampil di atas)
    protected static ?int $navigationSort = -2;

    // Badge jumlah total user di sidebar
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // Field yang dapat dicari secara global (di panel search)
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'roles.name'];
    }

    // Detail tambahan yang ditampilkan pada hasil pencarian global
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Role' => $record->roles->pluck('name')->implode(', '),
            'Email' => $record->email,
        ];
    }

    // Form create dan edit user
    public static function form(Form $form): Form
    {
        return $form->schema([
            // Grid dua kolom untuk data user
            Forms\Components\Grid::make(2)->schema([
                // Input nama
                Forms\Components\TextInput::make('name')
                    ->minLength(2)
                    ->maxLength(255)
                    ->columnSpan('full')
                    ->required(),

                // Upload avatar
                Forms\Components\FileUpload::make('avatar_url')
                    ->label('Avatar')
                    ->image()
                    ->optimize('webp') // konversi ke WebP
                    ->imageEditor()
                    ->imagePreviewHeight('250')
                    ->panelAspectRatio('7:2')
                    ->panelLayout('integrated')
                    ->columnSpan('full'),

                // Input email
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->prefixIcon('heroicon-m-envelope')
                    ->columnSpan('full')
                    ->email(),

                // Input password (hash otomatis, hanya wajib saat create)
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->confirmed()
                    ->columnSpan(1)
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state)) // hanya jika tidak kosong
                    ->required(fn (string $context): bool => $context === 'create'),

                // Konfirmasi password
                Forms\Components\TextInput::make('password_confirmation')
                    ->required(fn (string $context): bool => $context === 'create')
                    ->columnSpan(1)
                    ->password(),
            ]),

            // Bagian untuk assign roles user
            Forms\Components\Section::make('Roles')
                ->schema([
                    Forms\Components\Select::make('roles')
                        ->required()
                        ->multiple()
                        ->relationship('roles', 'name') // relasi ke tabel roles
                        ->label('Roles'),
                ])
                ->columns(1),
        ]);
    }

    // Tabel daftar user
    public static function table(Table $table): Table
    {
        return $table->columns([
            // Kolom ID
            Tables\Columns\TextColumn::make('id')
                ->sortable()
                ->searchable(),

            // Kolom nama
            Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable(),

            // Kolom avatar
            Tables\Columns\ImageColumn::make('avatar_url')
                ->defaultImageUrl(url('https://www.gravatar.com/avatar/64e1b8d34f425d19e1ee2ea7236d3028?d=mp&r=g&s=250'))
                ->label('Avatar')
                ->circular(),

            // Kolom email
            Tables\Columns\TextColumn::make('email')
                ->sortable()
                ->searchable(),

            // Kolom role, tampil sebagai badge
            Tables\Columns\TextColumn::make('roles.name')
                ->badge()
                ->sortable()
                ->searchable(),

            // Kolom tanggal dibuat
            Tables\Columns\TextColumn::make('created_at')
                ->date()
                ->sortable()
                ->searchable(),
        ])
        ->filters([
            // Belum ada filter
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),  // Tombol lihat detail
            Tables\Actions\EditAction::make(),  // Tombol edit
            Tables\Actions\DeleteAction::make(), // Tombol hapus
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                // Tables\Actions\DeleteBulkAction::make(), // bisa diaktifkan jika perlu
            ]),
        ])
        ->emptyStateActions([
            Tables\Actions\CreateAction::make(), // Tombol tambah user saat tabel kosong
        ]);
    }

    // Tidak ada relasi tambahan yang ditampilkan
    public static function getRelations(): array
    {
        return [];
    }

    // Halaman yang tersedia di resource ini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
