<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ReportController extends Controller
{

    public function index()
    {

        $client = new Client([
            'base_uri' => 'https://sdawhelpdesk.azurewebsites.net',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '/');

        // $response = Http::acceptJson()->get('https://sdawhelpdesk.azurewebsites.net/');
        // $reportes = $response->items;

        $reportes = json_decode($response->getBody())->items;


        $pendientes =  count(array_filter($reportes, function ($reporte) {
            return $reporte->estatus == "PENDIDNTE";
        }));

        $completados = count(array_filter($reportes, function ($reporte) {
            return $reporte->estatus == "REALIZADO";
        }));

        return view('admin.reports.index', compact('reportes', 'pendientes', 'completados'));
    }
}
