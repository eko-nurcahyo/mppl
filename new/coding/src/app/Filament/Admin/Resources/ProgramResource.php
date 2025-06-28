<?php

// Namespace dari file ini berada dalam struktur Filament Admin untuk Program Donasi
namespace App\Filament\Admin\Resources;

// Import halaman-halaman CRUD khusus Program (Create, Edit, List)
use App\Filament\Admin\Resources\ProgramResource\Pages;

// Import model Program yang akan dikelola oleh resource ini
use App\Models\Program;

// Import komponen-komponen yang digunakan untuk membuat form dan tabel
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;

class ProgramResource extends Resource
{
    // Model utama yang digunakan oleh resource ini (Program)
    protected static ?string $model = Program::class;

    // Ikon yang ditampilkan di sidebar menu admin (dari Heroicons)
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Label menu di sidebar admin
    protected static ?string $navigationLabel = 'Program Donasi';

    // Group menu di sidebar admin (untuk pengelompokan)
    protected static ?string $navigationGroup = 'Donasi';

    // Method untuk membuat form create/edit program
    public static function form(Form $form): Form
    {
        return $form->schema([
            // Input teks untuk judul program
            Forms\Components\TextInput::make('judul')
                ->label('Judul Program')
                ->required()
                ->maxLength(255),

            // Input slug yang bisa otomatis dari judul (optional)
            Forms\Components\TextInput::make('slug')
                ->label('Slug (Opsional)')
                ->placeholder('Otomatis dari judul jika dikosongkan')
                ->maxLength(255)
                ->helperText('Biarkan kosong jika ingin dibuat otomatis.')
                ->dehydrated(false), // Tidak dikirim ke server jika kosong

            // Target donasi berupa angka
            Forms\Components\TextInput::make('target_donasi')
                ->label('Target Donasi (Rp)')
                ->numeric()
                ->required(),

            // Pilihan wilayah pulau
            Forms\Components\Select::make('wilayah')
                ->label('Pulau/Wilayah')
                ->options([
                    'Paupa' => 'Papua',
                    'Jawa' => 'Jawa',
                    'Sulawesi' => 'Sulawesi',
                    'Kalimantan' => 'Kalimantan',
                    'Sumatera' => 'Sumatera',
                    'Bali & Nusa Tenggara' => 'Bali & Nusa Tenggara',
                    'Maluku' => 'Maluku',
                ])
                ->required(),

            // Input kota
            Forms\Components\TextInput::make('kota')
                ->label('Kota')
                ->required(),

            // Upload gambar utama/banner program
            Forms\Components\FileUpload::make('gambar')
                ->label('Gambar Utama Program (Banner)')
                ->image()
                ->imageEditor()
                ->directory('assets/charitee/img/gmbr') // lokasi penyimpanan
                ->disk('public') // disimpan di disk publik
                ->maxSize(10240) // maksimal 10MB
                ->helperText('Gambar ini akan tampil di halaman daftar program.'),

            // Upload foto pendukung cerita
            Forms\Components\FileUpload::make('foto_kisah')
                ->label('Foto Pendukung Kisah')
                ->image()
                ->imageEditor()
                ->directory('assets/charitee/img/gmbr')
                ->disk('public')
                ->maxSize(3072) // maksimal 3MB
                ->helperText('Foto ini akan tampil di halaman detail donasi.'),

            // Rich text editor untuk menulis kisah
            RichEditor::make('kisah')
                ->label('Kisah Program')
                ->toolbarButtons([
                    'bold', 'italic', 'link', 'blockquote', 'bulletList', 'orderedList', 'undo', 'redo'
                ])
                ->helperText('Tulis kisah menyentuh untuk mengajak orang berdonasi.'),

            // Deskripsi singkat program
            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi Singkat Program')
                ->rows(4)
                ->required(),

            // Tanggal mulai program
            Forms\Components\DatePicker::make('tanggal_mulai')
                ->label('Tanggal Mulai Program')
                ->required(),

            // Tanggal berakhir program
            Forms\Components\DatePicker::make('tanggal_akhir')
                ->label('Tanggal Berakhir Program')
                ->required(),

            // Status aktif atau nonaktif
            Forms\Components\Select::make('status')
                ->label('Status Program')
                ->options([
                    'aktif' => 'Aktif',
                    'nonaktif' => 'Nonaktif',
                ])
                ->default('aktif')
                ->required(),

            // Pilihan kategori program
            Forms\Components\Select::make('kategori')
                ->label('Kategori Program')
                ->options([
                    'Pendidikan' => 'Pendidikan',
                    'Air Bersih' => 'Air Bersih',
                    'Bencana Alam' => 'Bencana Alam',
                ])
                ->required(),
        ]);
    }

    // Tabel data program yang muncul di halaman admin
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom teks: Judul, searchable & sortable
                Tables\Columns\TextColumn::make('judul')->label('Judul')->searchable()->sortable(),

                // Kolom slug yang bisa disembunyikan
                Tables\Columns\TextColumn::make('slug')->label('Slug')->toggleable(),

                // Kategori, wilayah, kota (semua sortable)
                Tables\Columns\TextColumn::make('kategori')->label('Kategori')->sortable(),
                Tables\Columns\TextColumn::make('wilayah')->label('Wilayah')->sortable(),
                Tables\Columns\TextColumn::make('kota')->label('Kota')->sortable(),

                // Target donasi ditampilkan dalam format uang
                Tables\Columns\TextColumn::make('target_donasi')->label('Target Donasi')->money('IDR')->sortable(),

                // Kolom tanggal mulai & akhir
                Tables\Columns\TextColumn::make('tanggal_mulai')->label('Tanggal Mulai')->date(),
                Tables\Columns\TextColumn::make('tanggal_akhir')->label('Tanggal Akhir')->date(),

                // Tampilkan gambar dan foto kisah
                Tables\Columns\ImageColumn::make('gambar')->label('Banner'),
                Tables\Columns\ImageColumn::make('foto_kisah')->label('Foto Kisah'),

                // Kolom status dengan badge warna
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state === 'aktif' ? 'Aktif' : 'Nonaktif')
                    ->colors([
                        'success' => 'aktif',
                        'danger' => 'nonaktif',
                    ]),
            ])
            ->filters([]) // Bisa ditambahkan filter custom jika dibutuhkan
            ->actions([
                Tables\Actions\EditAction::make(), // ✏️ Edit
                Tables\Actions\DeleteAction::make(), // 🗑️ Hapus
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // 🧹 Hapus banyak sekaligus
                ]),
            ]);
    }

    // Belum ada relasi tambahan yang didefinisikan untuk resource ini
    public static function getRelations(): array
    {
        return [];
    }

    // Daftar halaman CRUD yang tersedia untuk resource ini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrograms::route('/'),             // Halaman daftar program
            'create' => Pages\CreateProgram::route('/create'),     // Halaman tambah program
            'edit' => Pages\EditProgram::route('/{record}/edit'),  // Halaman edit program
        ];
    }
}

// ✅ Kesimpulan:
//File ProgramResource.php adalah bagian dari Filament Admin yang mengatur tampilan form input, tabel data, dan halaman manajemen program donasi. Fitur yang ditangani:
//Input lengkap: judul, slug, kota, wilayah, target, tanggal, gambar, kisah, kategori, status.
//Upload file dengan validasi dan lokasi penyimpanan.
//Tampilan tabel lengkap dengan sorting, badge status, dan aksi edit/hapus massal.
//File ini memungkinkan admin melakukan CRUD secara visual dengan nyaman melalui panel backend Filament.
//Dengan resource ini, pengelolaan data program donasi menjadi mudah, terstruktur, dan profesional.