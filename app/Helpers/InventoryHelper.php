<?php

use GuzzleHttp\Client;

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
    function productosMasVendidos($ventas, Client $client)
    {
        $productos = [];

        foreach ($ventas as $key => $venta) {
            foreach ($venta->products as $producto) {
                array_push($productos, $producto->id);
            }
        }
        $productos = array_count_values($productos);
        sort($productos);

        // $maxSell = end($productos);

        $maxProds = array_filter($productos, function ($producto) {
            return $producto == 3;
        });

        $maxProds = array_keys($maxProds);

        foreach ($maxProds as $key => $prod) {

            $response = $client->request('GET', '/products/' . $prod);
            $peticion = json_decode($response->getBody());

            $maxProds[$key] = $peticion;
        }

        return $maxProds;
    }
}


if (!function_exists('ventaMayor')) {

    function ventaMayor($ventas)
    {
        $maxMoney = 0;
        $maxVenta = 0;

        foreach ($ventas as $key => $venta) {
            if ($venta->total > $maxMoney) {
                $maxMoney = $venta->total;
                $maxVenta = $venta;
            }
        }

        return $maxVenta;
    }
}

if (!function_exists('productosVendidos')) {

    function productosVendidos($ventas)
    {
        $totalProductos = 0;
        foreach ($ventas as $venta) {
            $totalProductos += $venta->totalProducts;
        }

        return $totalProductos;
    }
}
