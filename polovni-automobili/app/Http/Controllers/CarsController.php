<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 cars per page
        $page = $request->input('page', 1);
        $brand = $request->input('brand');
        $model = $request->input('model');
    
        $query = Car::query();
    
        if ($brand) {
            return $query->searchByBrand($brand);
        }
    
        if ($model) {
            return $query->searchByModel($model);
        } 

        else {
            $cars = Car::paginate($perPage, ['*'], 'page', $page);
        }

    
        return response()->json($cars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|min:2',
            'model' => 'required|min:2',
            'year' => 'required',
            'is_automatic' => 'required',
            'engine' => 'required',
            'number_of_doors' => 'required|numeric|min:2|max:5',
            'max_speed' => 'nullable|numeric|min:20|max:300',
        ]);
    
        $car = new Car();
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->max_speed = $request->input('max_speed');
        $car->is_automatic = $request->input('is_automatic');
        $car->engine = $request->input('engine');
        $car->number_of_doors = $request->input('number_of_doors');
        $car->save();
    
        return response()->json($car, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand' => 'sometimes|required|min:2',
            'model' => 'sometimes|required|min:2',
            'year' => 'sometimes|required',
            'is_automatic' => 'sometimes|required',
            'engine' => 'sometimes|required',
            'number_of_doors' => 'sometimes|required|numeric|min:2|max:5',
            'max_speed' => 'nullable|numeric|min:20|max:300',
        ]);
    
        $car = Car::findOrFail($id);
        $car->brand = $request->input('brand', $car->brand);
        $car->model = $request->input('model', $car->model);
        $car->year = $request->input('year', $car->year);
        $car->max_speed = $request->input('max_speed', $car->max_speed);
        $car->is_automatic = $request->input('is_automatic', $car->is_automatic);
        $car->engine = $request->input('engine', $car->engine);
        $car->number_of_doors = $request->input('number_of_doors', $car->number_of_doors);
        $car->save();
    
        return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        // Obrišite automobil
        $car->delete();
        return response()->json(null, 204);
    }
}
