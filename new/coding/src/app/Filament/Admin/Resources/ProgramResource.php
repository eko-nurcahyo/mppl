<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Program Donasi';
    protected static ?string $navigationGroup = 'Donasi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul Program')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('slug')
                ->label('Slug (Opsional)')
                ->placeholder('Otomatis dari judul jika dikosongkan')
                ->maxLength(255)
                ->helperText('Biarkan kosong jika ingin dibuat otomatis.')
                ->dehydrated(false),

            Forms\Components\TextInput::make('target_donasi')
                ->label('Target Donasi (Rp)')
                ->numeric()
                ->required(),

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

            Forms\Components\TextInput::make('kota')
                ->label('Kota')
                ->required(),

            Forms\Components\FileUpload::make('gambar')
                ->label('Gambar Utama Program (Banner)')
                ->image()
                ->imageEditor()
                ->directory('assets/charitee/img/gmbr')
                ->disk('public')
                ->maxSize(10240)
                ->helperText('Gambar ini akan tampil di halaman daftar program.'),

            Forms\Components\FileUpload::make('foto_kisah')
                ->label('Foto Pendukung Kisah')
                ->image()
                ->imageEditor()
                ->directory('assets/charitee/img/gmbr')
                ->disk('public')
                ->maxSize(3072)
                ->helperText('Foto ini akan tampil di halaman detail donasi.'),

            RichEditor::make('kisah')
                ->label('Kisah Program')
                ->toolbarButtons([
                    'bold', 'italic', 'link', 'blockquote', 'bulletList', 'orderedList', 'undo', 'redo'
                ])
                ->helperText('Tulis kisah menyentuh untuk mengajak orang berdonasi.'),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi Singkat Program')
                ->rows(4)
                ->required(),

            Forms\Components\DatePicker::make('tanggal_mulai')
                ->label('Tanggal Mulai Program')
                ->required(),

            Forms\Components\DatePicker::make('tanggal_akhir')
                ->label('Tanggal Berakhir Program')
                ->required(),

            Forms\Components\Select::make('status')
                ->label('Status Program')
                ->options([
                    'aktif' => 'Aktif',
                    'nonaktif' => 'Nonaktif',
                ])
                ->default('aktif')
                ->required(),

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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')->label('Judul')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->label('Slug')->toggleable(),
                Tables\Columns\TextColumn::make('kategori')->label('Kategori')->sortable(),
                Tables\Columns\TextColumn::make('wilayah')->label('Wilayah')->sortable(),
                Tables\Columns\TextColumn::make('kota')->label('Kota')->sortable(),
                Tables\Columns\TextColumn::make('target_donasi')->label('Target Donasi')->money('IDR')->sortable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')->label('Tanggal Mulai')->date(),
                Tables\Columns\TextColumn::make('tanggal_akhir')->label('Tanggal Akhir')->date(),
                Tables\Columns\ImageColumn::make('gambar')->label('Banner'),
                Tables\Columns\ImageColumn::make('foto_kisah')->label('Foto Kisah'),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state === 'aktif' ? 'Aktif' : 'Nonaktif')
                    ->colors([
                        'success' => 'aktif',
                        'danger' => 'nonaktif',
                    ]),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}