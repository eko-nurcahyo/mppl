<?php

namespace App\Filament\Admin\Resources\DonationResource\Pages;

use App\Filament\Admin\Resources\DonationResource;
use Filament\Resources\Pages\EditRecord;

use Illuminate\Support\Facades\Mail;
use App\Mail\DonationStatusUpdated;
use App\Mail\DonationPendingMail;

class EditDonation extends EditRecord
{
    protected static string $resource = DonationResource::class;

    protected function afterSave(): void
    {
        if ($this->record->status === 'pending') {
            Mail::to($this->record->email)
                ->send(new DonationPendingMail($this->record));
        } else {
            Mail::to($this->record->email)
                ->send(new DonationStatusUpdated($this->record));
        }
    }
}