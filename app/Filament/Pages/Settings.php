<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Models\Setting;
use Filament\Notifications\Notification;

class Settings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public ?string $app_name = null;
    public $app_logo = null;
    public ?string $app_description = null;
    public ?string $contact_email = null;
    public ?string $contact_phone = null;
    public ?string $address = null;
    public ?string $timezone = null;

    protected static ?string $title = 'Pengaturan';
    protected static string $view = 'filament.pages.settings';
    protected static bool $shouldRegisterNavigation = false;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('app_name')
                ->label('Nama Aplikasi')
                ->placeholder('Masukkan nama aplikasi, mis. My Company')
                ->required(),

            Textarea::make('app_description')
                ->label('Deskripsi Aplikasi')
                ->placeholder('Deskripsi singkat aplikasi untuk homepage atau meta tag SEO')
                ->rows(3)
                ->nullable(),

            FileUpload::make('app_logo')
                ->label('Logo Aplikasi')
                ->disk('public')
                ->image()
                ->directory('settings')
                ->nullable()
                ->helperText('Unggah logo aplikasi. File akan disimpan di disk `public`.'),

            TextInput::make('contact_email')
                ->label('Email Kontak')
                ->placeholder('email@contoh.com')
                ->email()
                ->nullable(),

            TextInput::make('contact_phone')
                ->label('No. Telepon')
                ->placeholder('0812-3456-7890')
                ->nullable(),

            Textarea::make('address')
                ->label('Alamat')
                ->placeholder('Alamat kantor atau operasional')
                ->rows(2)
                ->nullable(),

            Select::make('timezone')
                ->label('Zona Waktu')
                ->options(function () {
                    $zones = \DateTimeZone::listIdentifiers();
                    return array_combine($zones, $zones);
                })
                ->searchable()
                ->placeholder('Pilih zona waktu, mis. Asia/Jakarta')
                ->nullable(),
        ];
    }

    protected function getFormData(): array
    {
        $keys = [
            'app_name',
            'app_logo',
            'app_description',
            'contact_email',
            'contact_phone',
            'address',
            'timezone',
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
                $value = $value[0]['id'] ?? $value[0]['path'] ?? json_encode($value);
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
