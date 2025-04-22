<?php

/**
 * @see https://github.com/shuvroroy/filament-spatie-laravel-health/tree/main
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Modules\Xot\Filament\Widgets;
use Spatie\Health\Checks\Checks;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\Health\Facades\Health;
use Spatie\Health\ResultStores\ResultStore;

class HealthPage extends Page
{
    use NavigationLabelTrait;

    /**
     * @var array<string, string>
     */
    protected $listeners = ['refresh-component' => '$refresh'];

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static string $view = 'xot::filament.pages.health';

    public function refresh(): void
    {
        $checks = [
            Checks\OptimizedAppCheck::new(),
            Checks\DebugModeCheck::new(),
            Checks\EnvironmentCheck::new(),
            Checks\UsedDiskSpaceCheck::new(),
            Checks\DatabaseCheck::new(),
            Checks\DatabaseSizeCheck::new(),
            Checks\DatabaseTableSizeCheck::new(),
            Checks\CacheCheck::new(),
            Checks\DatabaseConnectionCountCheck::new(),
            Checks\FlareErrorOccurrenceCountCheck::new(),
            Checks\HorizonCheck::new(),
            Checks\MeiliSearchCheck::new(),
            Checks\QueueCheck::new(),
            Checks\RedisCheck::new(),
            Checks\ScheduleCheck::new(),
            Checks\RedisMemoryUsageCheck::new(),
            // Checks\PingCheck::new()->url('https://google.com')->name('Google'),
        ];
        if (class_exists(\Spatie\CpuLoadHealthCheck\CpuLoadCheck::class)) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
            /** @var \Spatie\CpuLoadHealthCheck\CpuLoadCheck $check */
            $check = \Spatie\CpuLoadHealthCheck\CpuLoadCheck::new();
            $checks[] = $check;
        }
        if (class_exists(\Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck::class)) {
            /** @var \Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck $check */
            $check = \Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck::new();
            $checks[] = $check;
        }
        if (class_exists(\Laraxot\SmtpHealthCheck\SmtpCheck::class)) {
            /** @var \Laraxot\SmtpHealthCheck\SmtpCheck $check */
            $check = \Laraxot\SmtpHealthCheck\SmtpCheck::new();
            $checks[] = $check;
        }
        /** @var array<\Spatie\Health\Checks\Check> $checks */
<<<<<<< HEAD
=======
=======
            $checks[] = \Spatie\CpuLoadHealthCheck\CpuLoadCheck::new();
        }
        if (class_exists(\Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck::class)) {
            $checks[] = \Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck::new();
        }
        if (class_exists(\Laraxot\SmtpHealthCheck\SmtpCheck::class)) {
            $checks[] = \Laraxot\SmtpHealthCheck\SmtpCheck::new();
        }
        // @phpstan-ignore argument.type
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        Health::checks($checks);
        Artisan::call(RunHealthChecksCommand::class);
        $this->dispatch('refresh-component');
        Notification::make()
            ->title('Health check results refreshed')
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('refresh')
<<<<<<< HEAD
                
=======
<<<<<<< HEAD
                
=======
                ->label('')
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
                ->tooltip('refresh')
                ->icon('heroicon-o-arrow-path')
                ->button()
                ->action('refresh'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\HealthOverviewWidget::make(),
        ];
    }

    protected function getViewData(): array
    {
        $checkResults = app(ResultStore::class)->latestResults();

        return [
<<<<<<< HEAD
            'lastRanAt' => $checkResults?->finishedAt,
=======
<<<<<<< HEAD
            'lastRanAt' => $checkResults?->finishedAt,
=======
            'lastRanAt' => new Carbon($checkResults?->finishedAt),
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
            'checkResults' => $checkResults,
        ];
    }
}
