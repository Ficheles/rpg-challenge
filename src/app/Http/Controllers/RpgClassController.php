<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RpgClass;
use Illuminate\Http\Request;
use App\Http\Requests\RpgClassRequest;


class RpgClassController extends Controller
{
    public function index()
    {
        
        return response()->json(RpgClass::all());
    }

    public function store(RpgClassRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $class = RpgClass::create($request->all());

        return response()->json($class, 201);
    }

    public function show($id)
    {
        $class = RpgClass::findOrFail($id);

        return response()->json($class);
    }

    public function update(RpgClassRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $class = RpgClass::findOrFail($id);
        $class->update($request->all());

        return response()->json($class);
    }

    public function destroy($id)
    {
        RpgClass::destroy($id);

        return response()->json(null, 204);
    }
}