<?php

namespace App\Filament\Admin\Resources\DonationResource\Pages;

use App\Filament\Admin\Resources\DonationResource;
use Filament\Resources\Pages\EditRecord;

use Illuminate\Support\Facades\Mail;
use App\Mail\DonationStatusUpdated;

class EditDonation extends EditRecord
{
    protected static string $resource = DonationResource::class;

    protected function afterSave(): void
    {
        // Kirim email notifikasi status donasi ke user
        Mail::to($this->record->email)
            ->send(new DonationStatusUpdated($this->record));
    }
}
