<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select as FormSelect;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Proyek';

    protected static ?string $pluralModelLabel = 'Proyek';

    protected static ?string $modelLabel = 'Proyek';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->placeholder('Masukkan judul proyek')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->placeholder('otomatis-diisi-dari-judul')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Website' => 'Website',
                                'Mobile App' => 'Aplikasi Mobile',
                                'Design' => 'Desain',
                                'Video' => 'Video',
                                'Other' => 'Lainnya',
                            ])
                            ->placeholder('Pilih kategori')
                            ->required(),

                        TextInput::make('client')
                            ->label('Klien')
                            ->placeholder('Nama klien (opsional)'),

                        TextInput::make('year')
                            ->label('Tahun')
                            ->numeric()
                            ->placeholder('Contoh: 2025')
                            ->nullable(),

                        TextInput::make('project_url')
                            ->label('URL Proyek')
                            ->url()
                            ->placeholder('https://contoh.com'),
                    ]),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->placeholder('Deskripsikan proyek secara singkat')
                    ->rows(4),

                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->image()
                    ->placeholder('Unggah gambar thumbnail (opsional)')
                    ->imagePreviewHeight('150')
                    ->nullable(),

                Repeater::make('gallery')
                    ->label('Galeri')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->required(),

                        TextInput::make('caption')
                            ->label('Keterangan')
                            ->placeholder('Keterangan gambar (opsional)')
                            ->nullable(),
                    ])
                    ->columns(1)
                    ->reorderable()
                    ->nullable(),

                Repeater::make('technologies')
                    ->label('Teknologi')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Teknologi')
                            ->placeholder('Contoh: Laravel, React')
                            ->required(),
                    ])
                    ->columns(1)
                    ->nullable(),

                Repeater::make('features')
                    ->label('Fitur')
                    ->schema([
                        TextInput::make('feature')
                            ->label('Fitur')
                            ->placeholder('Deskripsikan fitur')
                            ->required(),
                    ])
                    ->columns(1)
                    ->nullable(),

                Repeater::make('results')
                    ->label('Hasil')
                    ->schema([
                        TextInput::make('result')
                            ->label('Hasil')
                            ->placeholder('Hasil yang dicapai')
                            ->required(),
                    ])
                    ->columns(1)
                    ->nullable(),

                FormSelect::make('status')
                    ->label('Status')
                    ->options([
                        'ongoing' => 'Sedang Berlangsung',
                        'completed' => 'Selesai',
                    ])
                    ->default('completed')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                TextColumn::make('category')->label('Kategori')->sortable(),
                TextColumn::make('client')->label('Klien')->toggleable()->sortable(),
                TextColumn::make('year')->label('Tahun')->sortable(),
                IconColumn::make('status')
                    ->label('Selesai')
                    ->boolean()
                    ->trueIcon('heroicon-o-check')
                    ->falseIcon('heroicon-o-clock'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Website' => 'Aplikasi Web',
                        'Mobile App' => 'Aplikasi Mobile',
                        'Design' => 'Desain',
                        'Video' => 'Video',
                        'Other' => 'Lainnya',
                    ]),
            ])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
        ];
    }
}
