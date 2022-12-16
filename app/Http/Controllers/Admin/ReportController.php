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
        $client = new Client([
            'base_uri' => 'https://dummyjson.com',
            'timeout'  => 700.0,
        ]);

        // $response = Http::acceptJson()->get('https://sdawhelpdesk.azurewebsites.net');
        // $productos = $response->items;

        try {

            $response = $client->request('GET', '/products', ['query' => ['limit' => 100]]);
            $productos = json_decode($response->getBody())->products;

            $reporte = generalProductos($productos);
            $rating = mejorRating($productos);

            $total_items = 0;

            foreach ($productos as $key => $producto) {
                $total_items += $producto->stock;
            }

            return view('admin.reports.inventory', compact('productos', 'reporte', 'rating', 'total_items'));
        } catch (\Throwable $th) {
            return view('errors.report');
        }
    }

    public function sales()
    {

        $client = new Client([
            'base_uri' => 'https://dummyjson.com',
            'timeout'  => 10.0,
        ]);

        try {

            $response = $client->request('GET', '/carts');

            $ventas = json_decode($response->getBody())->carts;

            return view('admin.reports.sales', compact('ventas'));
        } catch (\Throwable $th) {
            return view('errors.report');
        }
    }
}
