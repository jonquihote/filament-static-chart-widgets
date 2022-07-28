<?php

namespace JQHT\FilamentStaticChartWidgets\Widgets;

use Illuminate\Support\Collection;
use JQHT\FilamentStaticChartWidgets\Support\ChartWidget;
use JQHT\FilamentStaticChartWidgets\Widgets\PieChartWidget\Slice;

abstract class PieChartWidget extends ChartWidget
{
    public bool $showTotalLabel = true;

    public string $size = 'md';

    protected static string $view = 'filament-static-chart-widgets::widgets.pie-chart';

    protected function getStylesBackground(): string
    {
        $currentDegree = 0;
        $totalSlices = count($this->getCachedData());

        return Collection::make($this->getCachedData())
            ->map(function (Slice $slice, int $index) use (&$currentDegree, $totalSlices) {
                $percentage = $slice->getPercentage();
                $sliceDegree = ceil($percentage / 100 * 360);

                if ($index === 0) {
                    $startDegree = 0;
                    $endDegree = $sliceDegree;
                } elseif ($index === $totalSlices) {
                    $startDegree = $currentDegree;
                    $endDegree = 360;
                } else {
                    $startDegree = $currentDegree;
                    $endDegree = $currentDegree + $sliceDegree;
                }

                $currentDegree += $sliceDegree;

                return "{$slice->getHexColor()} {$startDegree}deg {$endDegree}deg";
            })
            ->implode(',');
    }

    abstract protected function getSlices(): array;

    protected function getData(): array
    {
        $slices = Collection::make($this->getSlices());

        $totalValue = $slices->sum(function (Slice $slice) {
            return $slice->getValue();
        });

        return $slices->map(function (Slice $slice, int $index) use ($totalValue) {
            $color = $slice->getColor() ?? $this->choices[$index % count($this->choices)];

            $slice->color($this->colors[$color]);
            $slice->hexColor($this->hexColors[$color]);
            $slice->totalValue($totalValue);

            return $slice;
        })->toArray();
    }
}
