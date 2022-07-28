<?php

namespace JQHT\FilamentStaticChartWidgets\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Database\Eloquent\Factories\Factory;
use JQHT\FilamentStaticChartWidgets\FilamentStaticChartWidgetsServiceProvider;

/**
 * @internal
 */
class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'JQHT\\FilamentStaticStatsWidget\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentStaticChartWidgetsServiceProvider::class,
        ];
    }
}
