<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Models\Experience;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Pengalaman';

    protected static ?string $pluralModelLabel = 'Pengalaman';

    protected static ?string $modelLabel = 'Pengalaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        TextInput::make('position')
                            ->label('Posisi')
                            ->required(),

                        TextInput::make('company')
                            ->label('Perusahaan')
                            ->required(),

                        TextInput::make('company_link')
                            ->label('Link Perusahaan')
                            ->url()
                            ->nullable(),

                        TextInput::make('location')
                            ->label('Lokasi')
                            ->nullable(),

                        DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->required(),

                        DatePicker::make('end_date')
                            ->label('Tanggal Selesai')
                            ->nullable(),

                        Select::make('employment_type')
                            ->label('Tipe Pekerjaan')
                            ->options([
                                'Full-time' => 'Full-time',
                                'Part-time' => 'Part-time',
                                'Contract' => 'Contract',
                                'Internship' => 'Internship',
                                'Freelance' => 'Freelance',
                            ])
                            ->default('Full-time')
                            ->required(),
                    ]),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->nullable(),

                Repeater::make('highlights')
                    ->label('Highlight')
                    ->schema([
                        TextInput::make('highlight')
                            ->label('Highlight')
                            ->required(),
                    ])
                    ->columns(1)
                    ->nullable(),

                Repeater::make('tech_stack')
                    ->label('Tech Stack')
                    ->schema([
                        TextInput::make('tech')
                            ->label('Teknologi')
                            ->required(),
                    ])
                    ->columns(1)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('position')->label('Posisi')->searchable()->sortable(),
                TextColumn::make('company')->label('Perusahaan')->searchable()->sortable(),
                TextColumn::make('location')->label('Lokasi')->toggleable()->sortable(),
                TextColumn::make('start_date')->label('Mulai')->date()->sortable(),
                TextColumn::make('end_date')->label('Selesai')->date()->toggleable()->sortable(),
                TextColumn::make('employment_type')->label('Tipe')->toggleable()->sortable(),
            ])
            ->filters([
                // optional filters could be added here
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
            'index' => Pages\ListExperiences::route('/'),
        ];
    }
}
