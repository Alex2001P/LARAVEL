<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Alumnocontroller extends Controller
{
    public function index()
    {
        $alumnos = Alumno::paginate();

        return view('alumno.index', compact('alumnos'))
            ->with('i', (request()->input('page', 1) - 1) * $alumnos->perPage());
    }
/////

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno = new Alumno();
        return view('alumno.create', compact('alumno'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Alumno::$rules);
        $alumno = Alumno::create($request->all());
        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno created successfully.');
    }

    /**
     * Mostrar el recurso especificado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);

        return view('alumno.show', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        request()->validate(Alumno::$rules);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'ACTUALIZACION CORRECTO');
    }    
    
////
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

    /*
    public function delete($id){
        Alumno::destroy($id);
        return back() ->with('alumnoguardado', 'Alumno guardado con exito');
    }
    */

    public function crear(){

        return view('alumno.crear');
    }
    
    public function destroy($id)
    {
        $alumno = Alumno::find($id)->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno deleted successfully');
    }

    public function delete($id, Request $request)
    {
        $alumno = Alumno::find($id);

        if ($request->isMethod('get')) {
            // Si es una solicitud GET, mostrar la vista de confirmación de eliminación en el navegador
            return view('alumno.delete', compact('alumno'));
        } elseif ($request->isMethod('delete')) {
            // Si es una solicitud DELETE (o equivalente), eliminar al alumno
            $alumno->delete();

            // Redirigir de vuelta a la lista de alumnos con un mensaje de éxito
            return redirect()->route('alumnos.index')
                ->with('success', 'Alumno eliminado con éxito');
        }
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

    /*
    public function edit(Request $request,$id){
        $datosalumnos=request()->except((['_token','_method']));
        Alumno::where('id','=', $id)->update($datosalumnos);
        return back() ->with('alumnoguardado', 'Alumno modificado con exito');

    }
    */
            public function edit($id, Request $request)
        {
            $alumno = Alumno::find($id);

            if ($request->isMethod('get')) {
                // Si es una solicitud GET, mostrar la vista de edición en el navegador
                return view('alumno.edit', compact('alumno'));
            } elseif ($request->isMethod('put')) {
                // Si es una solicitud PUT (o equivalente), actualizar los datos
                $datosAlumno = $request->except(['_token', '_method']);
                Alumno::where('id', '=', $id)->update($datosAlumno);

                // Responder con un mensaje de éxito
                return response()->json([
                    'mensaje' => 'Alumno modificado con éxito',
                ]);
            }
        }
    }

