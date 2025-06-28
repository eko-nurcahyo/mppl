<?php

namespace App\Filament\Admin\Resources\DonationSummaryResource\Pages;

use App\Filament\Admin\Resources\DonationSummaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDonationSummaries extends ListRecords
{
    protected static string $resource = DonationSummaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
