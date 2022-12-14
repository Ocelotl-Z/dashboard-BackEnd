<?php
if (!function_exists('tiemposDeRespuesta')) {
    function tiemposDeRespuesta($reportes)
    {
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

        return ["rapida" => $diferencias[0], "lenta" => end($diferencias), "promedio" => $promedio];
    }
}
