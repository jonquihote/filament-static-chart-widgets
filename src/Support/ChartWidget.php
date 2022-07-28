<?php

namespace JQHT\FilamentStaticChartWidgets\Support;

use Filament\Widgets\Widget;
use Illuminate\Support\Collection;
use JQHT\FilamentStaticChartWidgets\Contracts\HasValue;

abstract class ChartWidget extends Widget
{
    public array $colors = [
        'slate' => 'bg-slate-500',
        'gray' => 'bg-gray-500',
        'zinc' => 'bg-zinc-500',
        'neutral' => 'bg-neutral-500',
        'stone' => 'bg-stone-500',
        'red' => 'bg-red-500',
        'orange' => 'bg-orange-500',
        'amber' => 'bg-amber-500',
        'yellow' => 'bg-yellow-500',
        'lime' => 'bg-lime-500',
        'green' => 'bg-green-500',
        'emerald' => 'bg-emerald-500',
        'teal' => 'bg-teal-500',
        'cyan' => 'bg-cyan-500',
        'sky' => 'bg-sky-500',
        'blue' => 'bg-blue-500',
        'indigo' => 'bg-indigo-500',
        'violet' => 'bg-violet-500',
        'purple' => 'bg-purple-500',
        'fuchsia' => 'bg-fuchsia-500',
        'pink' => 'bg-pink-500',
        'rose' => 'bg-rose-500',
    ];

    public array $hexColors = [
        'slate' => '#64748b',
        'gray' => '#6b7280',
        'zinc' => '#71717a',
        'neutral' => '#737373',
        'stone' => '#78716c',
        'red' => '#ef4444',
        'orange' => '#f97316',
        'amber' => '#f59e0b',
        'yellow' => '#eab308',
        'lime' => '#84cc16',
        'green' => '#22c55e',
        'emerald' => '#10b981',
        'teal' => '#14b8a6',
        'cyan' => '#06b6d4',
        'sky' => '#0ea5e9',
        'blue' => '#3b82f6',
        'indigo' => '#6366f1',
        'violet' => '#8b5cf6',
        'purple' => '#a855f7',
        'fuchsia' => '#d946ef',
        'pink' => '#ec4899',
        'rose' => '#f43f5e',
    ];

    public array $choices = [
        'red',
        'orange',
        'yellow',
        'green',
        'blue',
        'indigo',
        'purple',
        'pink',
        'gray',
    ];

    protected ?array $cachedData = null;

    protected static ?string $heading = null;

    protected function getTotalValue(): int
    {
        return Collection::make($this->getCachedData())->sum(function (HasValue $item) {
            return $item->getValue();
        });
    }

    protected function getCachedData(): array
    {
        return $this->cachedData ??= $this->getData();
    }

    abstract protected function getData(): array;

    protected function getHeading(): ?string
    {
        return static::$heading;
    }
}
