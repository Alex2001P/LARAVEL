<?php
/*
namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    
    public function getAll()
    {
        $alumnos = Alumno::all();
        return $alumnos;
    }

    public function getAlumno($id)
    {
        $alumno = Alumno::find($id);
        return $alumno;
    }

    public function deleteAlumno($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
        return $alumno;
    }

    public function editAlumno($id, Request $request)
    {
        $alumno = Alumno::find($id);
        $alumno->fill($request->all())->save();
        return $alumno;
    }

    public function listado()
    {
        $alumnos = DB::table('alumnos')
            ->paginate(10);
        return view('alumno.lista', compact('alumnos'));
    }

    public function delete($id)
    {
        Alumno::destroy($id);
        return back()->with('alumnoguardado', 'Alumno guardado con éxito');
    }

    public function create()
    {
        return view('alumno.create');
    }

    public function save(Request $request)
    {
        if ($request->control == 'form' || $request->control == 'api') {
            $validator = $this->validate($request, [
                'DPI' => 'required',
                'NOMBRE' => 'required',
                'APELLIDO' => 'required',
                'EMAIL' => 'required|email|unique:alumnos',
                'CARNE' => 'required',
                'FACULTAD' => 'required',
                'CICLO' => 'required',
            ]);

            Alumno::create($validator);
        }

        if ($request->control == 'form') {
            return redirect()->route('Listar')->with('alumnoguardado', 'Alumno guardado con éxito');
        } elseif ($request->control == 'api') {
            return response()->json([
                'codigo' => '1',
                'descripcion' => 'Guardado exitosamente',
            ]);
        }
    }

    public function modify($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumno.edit', compact('alumno'));
    }

    public function update(Request $request, $id)
    {
        $dataAlumno = request()->except(['_token', '_method']);
        Alumno::where('id', '=', $id)->update($dataAlumno);
        return back()->with('alumnoguardado', 'Alumno modificado con éxito');
    }
}*/

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Alumnocontroller extends Controller
{
    public function getAll(){
        $alumnos = Alumno::all();
        return $alumnos;
    }

    public function getAlumno($id){
        $alumnos= Alumno::find($id);
        return $alumnos;
    }

    public function deleteAlumno($id){
        $alumnos= $this->getAlumno($id);
        $alumnos->delete();
        return $alumnos;
    }


    public function editAlumno($id, Request $request){
        $alumnos = $this->getAlumno($id);
        $alumnos->fill($request->all())->save();
        return $alumnos;
    }

    public function listado(){
        $alumnos = DB::table('alumnos')
            ->paginate(10);
        return view('Alumno.lista', compact('alumnos'));
    }

    public function delete($id){
        Alumno::destroy($id);
        return back() ->with('alumnoguardado', 'Alumno guardado con exito');
    }

    public function crear(){

        return view('alumno.crear');
    }

    public function save(Request $request){
        if ($request->control=='form' || $request->control=='api'){
            $validator=$this->validate($request,[

                'DPI'=>'required',
                'NOMBRE'=>'required',
                'APELLIDO'=>'required',
                'EMAIL'=>'required|email|unique:alumnos',
                'CARNE'=>'required',
                'FACULTAD'=>'required',
                'CICLO'=>'required',

            ]);

            alumno::create([
                'DPI' => $validator['DPI'],
                'NOMBRE' => $validator['NOMBRE'],
                'APELLIDO' => $validator['APELLIDO'],
                'EMAIL' => $validator['EMAIL'],
                'CARNE' => $validator['CARNE'],
                'FACULTAD' => $validator['FACULTAD'],
                'CICLO' => $validator['CICLO'],
                //'id_usuario'=>Auth()->user()->id

            ]);
        }
        //si funciona este
        if ($request->control=='form'){
            return redirect()->route('Listar')
                ->with('alumnoguardado', 'Alumno guardado con exito');
        }elseif ($request->control=='api'){
            return response()->json([
                'codigo' => '1',
                'descripcion' => 'Guardado exitosamente',
            ]);
        }

    }

    public function modificar ($id){
        $empleado=Alumno::findorfail($id);
        return view('Alumno.editar', compact('alumnos'));

    }

    public function edit(Request $request,$id){
        $datosalumnos=request()->except((['_token','_method']));
        Alumno::where('id','=', $id)->update($datosalumnos);
        return back() ->with('alumnoguardado', 'Alumno modificado con exito');

    }

}

