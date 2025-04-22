<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Panel;

use Filament\Panel;
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

class ApplyMetatagToPanelAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 4ab3760 (.)
    /**
     * Applica i metatag al pannello Filament.
     *
     * @param Panel &$panel Il pannello Filament a cui applicare i metatag
     *
     * @return Panel Il pannello con i metatag applicati
     */
>>>>>>> 50bb41c (fix: auto resolve conflict)
    public function execute(Panel &$panel): Panel
    {
        try {
            $metatag = MetatagData::make();

            return $panel
<<<<<<< HEAD
<<<<<<< HEAD
                // @phpstan-ignore argument.type
                ->colors($metatag->getColors())
=======
<<<<<<< HEAD
                // @phpstan-ignore argument.type
                ->colors($metatag->getColors())
=======
                //->colors($metatag->getColors())
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
                // @phpstan-ignore argument.type
                ->colors($metatag->getColors())
>>>>>>> 50bb41c (fix: auto resolve conflict)
                ->brandLogo($metatag->getLogoHeader())
                ->brandName($metatag->title)
                ->darkModeBrandLogo($metatag->getLogoHeaderDark())
                ->brandLogoHeight($metatag->getLogoHeight())
                ->favicon($metatag->getFavicon());
<<<<<<< HEAD
        } catch (\Exception $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> 50bb41c (fix: auto resolve conflict)
            // Log l'errore ma non bloccare l'applicazione
            \Illuminate\Support\Facades\Log::error('Error applying metatag to panel: ' . $e->getMessage());
            return $panel;
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    public function execute(Panel &$panel): Panel
    {
        $metatag = MetatagData::make();

        return $panel
            // @phpstan-ignore argument.type
            ->colors($metatag->getColors())
            ->brandLogo($metatag->getLogoHeader())
            ->brandName($metatag->title)
            ->darkModeBrandLogo($metatag->getLogoHeaderDark())
            ->brandLogoHeight($metatag->getLogoHeight())
            ->favicon($metatag->getFavicon());
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
