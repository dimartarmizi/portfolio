<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use App\Models\Setting;
use Filament\Notifications\Notification;

class Settings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public ?string $owner_name = null;
    public $profile_picture = null;
    public ?string $description = null;
    public ?string $headline = null; // Kolom baru untuk headline
    public ?array $social_links = null;

    protected static ?string $title = 'Pengaturan Portofolio';
    protected static string $view = 'filament.pages.settings';
    protected static bool $shouldRegisterNavigation = false;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('owner_name')
                ->label('Nama Pemilik')
                ->placeholder('Masukkan nama pemilik portofolio')
                ->required(),

            FileUpload::make('profile_picture')
                ->label('Foto Profil')
                ->disk('public')
                ->image()
                ->directory('settings')
                ->nullable()
                ->helperText('Unggah foto profil. File akan disimpan di disk `public`.'),

            TextInput::make('headline') // Kolom baru untuk headline
                ->label('Headline')
                ->placeholder('Masukkan headline singkat, mis. Full Stack Developer')
                ->required(),

            Textarea::make('description') // Mengganti bio dengan description
                ->label('Deskripsi')
                ->placeholder('Deskripsi singkat tentang Anda')
                ->rows(3)
                ->nullable(),

            TextInput::make('contact_phone') // Menambahkan nomor telepon
                ->label('Nomor Telepon')
                ->placeholder('Masukkan nomor telepon, mis. +62 812-3456-7890')
                ->tel()
                ->nullable(),

            TextInput::make('contact_email') // Menambahkan email
                ->label('Email')
                ->placeholder('Masukkan email, mis. email@contoh.com')
                ->email()
                ->nullable(),

            Repeater::make('social_links')
                ->label('Tautan Media Sosial')
                ->schema([
                    Textarea::make('svg')
                        ->label('SVG Icon')
                        ->placeholder('Isi dengan tag svg lengkap')
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('platform')
                        ->label('Platform')
                        ->placeholder('Contoh: LinkedIn, GitHub')
                        ->required(),

                    TextInput::make('url')
                        ->label('URL')
                        ->placeholder('Masukkan tautan lengkap, mis. https://linkedin.com/in/username')
                        ->url()
                        ->required(),
                ])
                ->addActionLabel('Tambah Tautan')
                ->columns(2)
                ->nullable(),
        ];
    }

    protected function getFormData(): array
    {
        $keys = [
            'owner_name',
            'profile_picture',
            'headline',
            'description',
            'contact_phone',
            'contact_email',
            'social_links',
        ];

        $data = [];
        foreach ($keys as $key) {
            $val = setting($key, null);
            $data[$key] = $val;
        }

        return $data;
    }

    public function mount(): void
    {
        $this->form->fill($this->getFormData());
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = json_encode($value);
            }

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );

            cache()->forget("setting_{$key}");
        }

        Notification::make()
            ->success()
            ->title('Pengaturan tersimpan')
            ->send();
    }
}
