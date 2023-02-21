<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store()
    {
        $categories = [
            '18.5' => [
                'type' => 'Underweight',
                'color' => 'red'
            ],
            '25'   => [
                'type' => 'Normal weight',
                'color' => 'green'
            ],
            '30'   => [
                'type' => 'Overweight',
                'color' => 'yellow'
            ]
        ];

        $data = request()->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric'
        ]);

        $result = round($data['weight'] / pow(($data['height'] / 100), 2), 2);

        $message = 'Obese';
        $color = 'red';

        foreach ($categories as $key => $value) {
            if ($result < floatval($key)) {
                $message = $value['type'];
                $color = $value['color'];
                break;
            }
        }

        return view('home', [
            'result' => $result,
            'message' => $message,
            'color' => $color
        ]);
    }
}
