<?php

namespace JQHT\FilamentStaticChartWidgets\Widgets\PieChartWidget;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Support\Htmlable;
use JQHT\FilamentStaticChartWidgets\Contracts\HasValue;

class Slice extends Component implements Htmlable, HasValue
{
    protected ?int $decimals = 2;

    protected ?string $color = null;

    protected ?string $hexColor = null;

    protected string|Htmlable $label;

    protected $value;

    protected $totalValue;

    protected bool $showPercentageLabel = true;

    final public function __construct(string $label, $value)
    {
        $this->label($label);
        $this->value($value);
    }

    public static function make(string $label, $value): static
    {
        return app(static::class, ['label' => $label, 'value' => $value]);
    }

    public function decimals(?int $decimals): static
    {
        $this->decimals = $decimals;

        return $this;
    }

    public function color(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function hexColor(?string $hexColor): static
    {
        $this->hexColor = $hexColor;

        return $this;
    }

    public function label(string|Htmlable $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function value($value): static
    {
        $this->value = $value;

        return $this;
    }

    public function totalValue($totalValue): static
    {
        $this->totalValue = $totalValue;

        return $this;
    }

    public function hidePercentageLabel(): static
    {
        $this->showPercentageLabel = false;

        return $this;
    }

    public function getDecimals(): ?int
    {
        return $this->decimals;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function getHexColor(): ?string
    {
        return $this->hexColor;
    }

    public function getLabel(): string|Htmlable
    {
        return $this->label;
    }

    public function getValue()
    {
        return value($this->value);
    }

    public function getTotalValue()
    {
        return value($this->totalValue);
    }

    public function shouldShowPercentageLabel(): bool
    {
        return $this->showPercentageLabel;
    }

    public function getPercentage(): float
    {
        return number_format($this->value / $this->totalValue * 100, $this->getDecimals());
    }

    public function getPercentageLabel(): string
    {
        return "{$this->getPercentage()}%";
    }

    public function toHtml(): string
    {
        return $this->render()->render();
    }

    public function render(): View
    {
        return view('filament-static-chart-widgets::widgets.pie-chart.slice', $this->data());
    }
}
