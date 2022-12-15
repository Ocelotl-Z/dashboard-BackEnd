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

        return [gmdate("H:i:s", $diferencias[0] * 60), gmdate("H:i:s", end($diferencias) * 60), gmdate("H:i:s", $promedio * 60)];
    }
}

if (!function_exists('ticketMesDia')) {
    function ticketMesDia($reportes)
    {
        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
    }
}
