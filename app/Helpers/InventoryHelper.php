<?php

if (!function_exists('generalProductos')) {
    function generalProductos($productos)
    {
        $maxStock = 0;
        $minStock = INF;

        $maxProd = [];
        $minProd = [];

        foreach ($productos as $key => $producto) {
            if ($producto->stock > $maxStock) {
                $maxStock = $producto->stock;
                $maxProd = $producto;
            }
            if ($producto->stock < $minStock) {
                $minStock = $producto->stock;
                $minProd = $producto;
            }
        }

        return [$maxProd, $minProd];
        // return $maxStock;
    }
}

if (!function_exists('mejorRating')) {
    function mejorRating($productos)
    {
        $maxRating = 0;
        $minRating = INF;

        $maxProd = [];
        $minProd = [];

        foreach ($productos as $key => $producto) {
            if ($producto->stock > $maxRating) {
                $maxRating = $producto->rating;
                $maxProd = $producto;
            }
            if ($producto->stock < $minRating) {
                $minRating = $producto->rating;
                $minProd = $producto;
            }
        }

        return [$maxProd, $minProd];
    }
}

if (!function_exists('productosMasVendidos')) {
    function productosMasVendidos($productos)
    {
        $maxRating = 0;
        $minRating = INF;

        $maxProd = [];
        $minProd = [];

        foreach ($productos as $key => $producto) {
            if ($producto->stock > $maxRating) {
                $maxRating = $producto->rating;
                $maxProd = $producto;
            }
            if ($producto->stock < $minRating) {
                $minRating = $producto->rating;
                $minProd = $producto;
            }
        }

        return [$maxProd, $minProd];
    }
}
