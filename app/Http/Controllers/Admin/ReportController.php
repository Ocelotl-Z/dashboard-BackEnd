<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use DateTime;

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


            $diferencias = [];

            $reportesC = array_filter($reportes, function ($reporte) {
                return $reporte->estatus == "SOLUCIONADO";
            });

            foreach ($reportesC as $reporte) {
                $solucion = new DateTime($reporte->fecha_solucion);
                $creacion = new Datetime($reporte->fecha_creacion);

                $diff = $creacion->diff($solucion);

                $total_minutes = ($diff->days * 24 * 60);
                $total_minutes += ($diff->h * 60);
                $total_minutes += $diff->i;

                array_push($diferencias, $total_minutes);

                sort($diferencias);
            }

            $promedio =  array_sum($diferencias) / count($diferencias);



            // dd(gmdate("H:i:s", $promedio * 60));

            // $res = ["rapida" => $diferencias[0], "lenta" => end($diferencias), "promedio" => $promedio];
            $res = [$diferencias[0], end($diferencias), gmdate("H:i:s", $promedio * 60)];
            return view('admin.reports.index', compact('reportes', 'pendientes', 'completados', 'res'));
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return view('errors.report');
        }
    }
}
