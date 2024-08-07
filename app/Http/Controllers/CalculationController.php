<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index(){
        return view('easy.calculator');
    }

    public function calculate(Request $request){

        $request->validate([
            'first_number' => 'required|integer',
            'second_number' => 'required|integer',
            'operation' => 'required|string'
        ]);

        $firstNumber = $request->first_number;
        $secondNumber = $request->second_number;
        $operation = $request->operation;
        $results = 0;

        switch($operation){
            case 'add':
                $results = $firstNumber + $secondNumber;
                break;
            case 'subtract':
                $results = $firstNumber - $secondNumber;
                break;
            case 'multiply':
                $results = $firstNumber * $secondNumber;
                break;
            case 'divide':
                $results = $firstNumber / $secondNumber;
                break;
            default:
                return back()->withErrors(['operation' => 'Invalid operation selected']);
        }

        $calculation = new Calculation();
        $calculation->first_number = $firstNumber;
        $calculation->second_number = $secondNumber;
        $calculation->operation = $operation;
        $calculation->result = $results;
        $calculation->save();

        return view('easy.calculator', compact('results'));
    }
}
