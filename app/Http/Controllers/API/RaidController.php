<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\Raid;


class RaidController extends Controller
{
    public function getRaids()
    {
        $raids = Raid::all();
        return response()->json($raids, 200);
    }

    public function createRaid()
    {
        try {
            $raid = new Raid;
            $raid->region_id = 1;
            $raid->pokemon_id = 13;
            $raid->tier = 3;
            $raid->gym = "Yo yo yo";
            $raid->save();
            return response()->json($raid, 201);
        } catch (Exception $e) {
            echo $e;
        }

    }
}
