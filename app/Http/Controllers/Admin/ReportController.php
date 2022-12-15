<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;


class ReportController extends Controller
{

    public function index()
    {

        $client = new Client([
            'base_uri' => 'https://sdawhelpdesk.azurewebsites.net',
            'timeout'  => 2.0,
        ]);

        try {
            $response = $client->request('GET', '/');

            // $response = Http::acceptJson()->get('https://sdawhelpdesk.azurewebsites.net/');
            // $reportes = $response->items;
            
            $reportes = json_decode($response->getBody())->items;

            $pendientes =  count(array_filter($reportes, function ($reporte) {
                return $reporte->estatus == "PENDIENTE";
            }));

            $completados = count(array_filter($reportes, function ($reporte) {
                return $reporte->estatus == "SOLUCIONADO";
            }));

            $res = tiemposDeRespuesta($reportes);

            return view('admin.reports.index', compact('reportes', 'pendientes', 'completados', 'res'));
        
        } catch (\Throwable $th) {

            return view('errors.report');
        }
    }
}
