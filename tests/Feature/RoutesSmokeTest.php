<?php

use PHPUnit\Framework\TestCase;

final class RoutesSmokeTest extends TestCase
{
    public function test_routes_file_exists(): void
    {
        $this->assertFileExists(BASE_PATH . '/routes/web.php');
    }
}
