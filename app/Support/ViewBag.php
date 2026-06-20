<?php

namespace App\Support;

final class ViewBag
{
    public static function defaults(): array
    {
        return [
            'title' => 'Accueil',
            'active' => '',
            'breadcrumbs' => [],
            'viewData' => [],
        ];
    }
}
