<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Forms\Components\Select;
use App\Models\Donation;
use Carbon\CarbonPeriod;

class DonasiPerKategoriChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Donasi per Kategori';
    protected static ?int $sort = 1;

    // Penting agar form filter aktif
    protected static bool $isLazy = false;

    // Menampilkan form filter
    public function hasFilters(): bool
    {
        return true;
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function filtersFormColumns(): int
    {
        return 1;
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('range')
                ->label('Rentang Waktu')
                ->options([
                    '7_days' => '7 Hari Terakhir',
                    '1_month' => '1 Bulan Terakhir',
                    '3_months' => '3 Bulan Terakhir',
                    '6_months' => '6 Bulan Terakhir',
                    '1_year' => '1 Tahun Terakhir',
                ])
                ->default('1_year')
                ->reactive(),
        ];
    }

    protected function getData(): array
    {
        $range = $this->filters['range'] ?? '1_year';

        $endDate = now();
        $startDate = match ($range) {
            '7_days' => now()->subDays(6),
            '1_month' => now()->subMonth(),
            '3_months' => now()->subMonths(3),
            '6_months' => now()->subMonths(6),
            '1_year' => now()->subYear(),
            default => now()->subYear(),
        };

        $kategoriList = ['Pendidikan', 'Air Bersih', 'Bencana Alam'];
        $colors = [
            'Pendidikan' => '#10b981',
            'Air Bersih' => '#3b82f6',
            'Bencana Alam' => '#ef4444',
        ];

        $format = $range === '7_days' ? 'd M' : 'M Y';
        $interval = $range === '7_days' ? '1 day' : '1 month';
        $period = CarbonPeriod::create($startDate, $interval, $endDate);
        $dates = collect($period)->values();

        $labels = $dates->map(fn($date) => $date->format($format))->toArray();
        $datasets = [];

        foreach ($kategoriList as $kategori) {
            $data = [];

            foreach ($dates as $date) {
                $start = $range === '7_days'
                    ? $date->copy()->startOfDay()
                    : $date->copy()->startOfMonth();

                $end = $range === '7_days'
                    ? $date->copy()->endOfDay()
                    : $date->copy()->endOfMonth();

                $jumlah = Donation::join('programs', 'donations.program_id', '=', 'programs.id')
                    ->where('programs.kategori', $kategori)
                    ->whereBetween('donations.created_at', [$start, $end])
                    ->where('donations.status', 'approved')
                    ->sum('donations.nominal');

                $data[] = $jumlah;
            }

            $datasets[] = [
                'label' => $kategori,
                'borderColor' => $colors[$kategori] ?? '#999999',
                'backgroundColor' => $colors[$kategori] ?? '#999999',
                'data' => $data,
                'fill' => false,
                'tension' => 0.4,
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }
}
