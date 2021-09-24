<?php
use App\Noty;
    function noty()
    {
        return Noty::latest()
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();
    }