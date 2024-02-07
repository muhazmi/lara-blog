<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar_menu'         => Menu::orderBy('order_number')->get(),
            'page_title'    => 'Konfigurasi',
            'configuration' => 'as',
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuration $configuration)
    {
        //
    }

}
