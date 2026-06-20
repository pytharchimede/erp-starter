<?php

use PHPUnit\Framework\TestCase;
use App\View\Components\Ui;

final class UiTest extends TestCase
{
    public function test_badge_renders_label(): void
    {
        $this->assertStringContainsString('Actif', Ui::badge('Actif', 'success'));
    }
}
