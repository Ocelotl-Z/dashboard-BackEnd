<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use DateTime;
use GuzzleHttp\Exception\ClientException;


class ReportController extends Controller
{

    public function index()
    {

        $client = new Client([
            'base_uri' => 'https://sdawhelpdesk.azurewebsites.net',
            'timeout'  => 10.0,
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

            $grafica = ticketMesDia($reportes);

            $empleadoTickets = empleadoRespuestas($reportes);

            return view('admin.reports.help_desk', compact('reportes', 'pendientes', 'completados', 'res', 'grafica', 'empleadoTickets'));
        } catch (\Throwable $th) {

            return view('errors.report');
        }
    }

    public function inventory()
    {
        return view('admin.reports.inventory');
    }

    public function sales()
    {

        $client = new Client([
            'base_uri' => 'https://sdawhelpdesk.azurewebsites.net',
            'timeout'  => 10.0,
        ]);

        try {

            $response = $client->request('GET', '/');

            $ventas = json_decode($response->getBody())->items;

            return view('admin.reports.sales');
        } catch (\Throwable $th) {

            return view('errors.report');
        }
    }
}
