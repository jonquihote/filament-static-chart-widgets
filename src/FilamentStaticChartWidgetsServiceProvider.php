<?php

namespace JQHT\FilamentStaticChartWidgets;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentStaticChartWidgetsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-static-chart-widgets'

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name(static::$name)
            ->hasAssets()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make(static::$name, __DIR__. '/../resources/dist/filament-static-chart-widgets.css'),
        ], 'jonquihote/' . static::$name);
    }
}
