<?php

namespace Modules\People\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\People\Entities\People;

class PeopleController extends Controller
{
    /**
     * @return People
     */
    public function index()
    {
        $items = People::all();
        return response()->json($items);
    }

    /**
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $items = new People();

        $items->nombre             = $request->nombre;
        $items->apellido           = $request->apellido;
        $items->dni                = $request->dni;
        $items->cuil               = $request->cuil;
        $items->genero             = $request->genero;
        $items->direccion          = $request->direccion;
        $items->celular            = $request->celular;
        $items->email              = $request->email;
        $items->fecha_nacimiento   = $request->fecha_nacimiento;
        $items->lugar_nacimiento   = $request->lugar_nacimiento;
        $items->estado_civil       = $request->estado_civil;
        $items->observaciones      = $request->observaciones;
        $items->grupo_sanguineo    = $request->grupo_sanguineo;
        $items->updated_by_user_id = $request->updated_by_user_id;

        $items->save();

        return response()->json('Person Create');
    }

    /**
     * Show the specified resource.
     * @param Request $request
     * @return Person
     */
    public function show(Request $request)
    {
        $items = People::findorfail($request->id);

        return response()->json($items);
    }

    /**
     * @param Request $request
     * @return json
     */
    public function update(Request $request)
    {
        $items = People::findorfail($request->id);

        $items->nombre             = $request->nombre;
        $items->apellido           = $request->apellido;
        $items->dni                = $request->dni;
        $items->cuil               = $request->cuil;
        $items->genero             = $request->genero;
        $items->direccion          = $request->direccion;
        $items->celular            = $request->celular;
        $items->email              = $request->email;
        $items->fecha_nacimiento   = $request->fecha_nacimiento;
        $items->lugar_nacimiento   = $request->lugar_nacimiento;
        $items->estado_civil       = $request->estado_civil;
        $items->observaciones      = $request->observaciones;
        $items->grupo_sanguineo    = $request->grupo_sanguineo;
        $items->updated_by_user_id = $request->updated_by_user_id;

        $items->update();

        return response()->json('Person Update');
    }

    /**
     * @param Request $request
     * @return json
     */
    public function destroy(Request $request)
    {
        $items = People::findorfail($request->id)->delete();

        return response()->json('Person Delete');
    }
}
