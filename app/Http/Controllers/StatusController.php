<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();
            $dbName = DB::connection()->getDatabaseName();
            $message = "Conexión a la base de datos <strong>$dbName</strong> exitosa";
            $success = true;
        } catch (\Exception $e) {
            $message = "Error de conexión a la base de datos <br><code>" . $e->getMessage() . "</code>";
            $success = false;
        }

        return view('welcome', compact('message', 'success'));
    }
}
