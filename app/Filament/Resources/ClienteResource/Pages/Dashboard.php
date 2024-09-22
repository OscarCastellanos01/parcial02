<?php

namespace App\Filament\Resources\ClienteResource\Pages;

use App\Filament\Resources\ClienteResource;
use Filament\Resources\Pages\Page;

class Dashboard extends Page
{
    protected static string $resource = ClienteResource::class;

    protected static string $view = 'filament.resources.cliente-resource.pages.dashboard';
}
