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
        // $days = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
        // $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $reportes = array_filter($reportes, function ($reporte) {
            return date('n', strtotime($reporte->fecha_creacion)) == 12;
        });

        $data = array(0, 0, 0, 0, 0, 0, 0);

        foreach ($reportes as $index => $reporte) {
            $day = date('w', strtotime($reporte->fecha_creacion));

            $data[$day] += 1;
        }

        return $data;
    }
}


if (!function_exists('empleadoRespuestas')) {
    function empleadoRespuestas($reportes)
    {
        $ids = [];

        $reportes = array_filter($reportes, function ($reporte) {
            return $reporte->id_empleado != null;
        });


        foreach ($reportes as $key => $reporte) {
            array_push($ids, $reporte->id_empleado);
        }

        array_count_values($ids);
        sort($ids);

        return $ids[0];
    }
}
