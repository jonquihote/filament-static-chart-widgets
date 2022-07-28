<?php

namespace JQHT\FilamentStaticChartWidgets\Contracts;

interface HasValue
{
    public function value($value): static;

    public function getValue();
}
