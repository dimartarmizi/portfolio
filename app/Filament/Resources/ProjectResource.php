<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
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
                        TextInput::make('year')
                            ->label('Tahun')
                            ->numeric()
                            ->placeholder('Contoh: 2025')
                            ->nullable(),

                        TextInput::make('title')
                            ->label('Judul')
                            ->placeholder('Masukkan judul proyek')
                            ->required(),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->placeholder('otomatis-diisi-dari-judul')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('made_at')
                            ->label('Dibuat Di')
                            ->placeholder('Tempat/pembuat (opsional)')
                            ->nullable(),

                        TextInput::make('link')
                            ->label('Link')
                            ->url()
                            ->placeholder('https://contoh.com')
                            ->nullable(),
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
                            ->nullable(),

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
                TextColumn::make('year')->label('Tahun')->sortable(),
                TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug')->toggleable()->sortable(),
                TextColumn::make('made_at')->label('Made At')->toggleable()->sortable(),
                TextColumn::make('link')->label('Link')->url(fn ($record): ?string => $record->link)->toggleable()->sortable(),
                IconColumn::make('status')
                    ->label('Selesai')
                    ->boolean()
                    ->trueIcon('heroicon-o-check')
                    ->falseIcon('heroicon-o-clock'),
            ])
            ->filters([
                // No category filter in migration; keep filters minimal
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
