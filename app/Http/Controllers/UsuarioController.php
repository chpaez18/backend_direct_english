<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;

class UsuarioController extends Controller{


    /**
     * GET | Retorna un listado de la tabla usuarios
     *  Url: http://directenglish.test/api/usuarios | http://directenglish.test/api/usuarios/1
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($id = false)
    {
        try{
            
            //verificamos si se envio el parametro id
            if($id){
                $table_data = Usuario::find($id);
            }else{
                $table_data = Usuario::where('estado', 1)->paginate(10);
            }
            
        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json($table_data, 200);
                                                            
    }

    /**
     * POST | Crea un nuevo registro en la tabla usuarios
     * Url: http://directenglish.test/api/usuarios/add
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        try{
            $model = new Usuario();
            $model->nombre = $request->input('nombre');
            $model->telefono = $request->input('telefono');
            $model->username = $request->input('username');
            $model->fecha_nacimiento = $request->input('fecha_nacimiento');
            $model->correo = $request->input('correo');
            $model->password = $request->input('password');
            $model->save();

        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json(['success' =>  true], 200);
    }

    /**
     * PUT | Edita un registro en la tabla usuarios
     * Url: http://directenglish.test/api/usuarios/update/1
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        //header('Access-Control-Allow-Origin: *');

        try{
            $model = Usuario::find($id);
            if($model){
                $model->update($request->all());
            }else{
                return response()->json(['errorCode' => 500, 'errorMessage' => 'El usuario no existe'], 500);
            } 

        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json(['success' =>  true], 200);
    }

    /**
     * PUT | Se hace un borrado logico en la tabla usuarios, modificando el estado de 1 a 2 
     * Url: http://directenglish.test/api/usuarios/delete/1
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){

        //header('Access-Control-Allow-Origin: *');

        try{
            $model = Usuario::find($id);
            if($model){
                $model->estado = 2;
                $model->update();
            }else{
                return response()->json(['errorCode' => 500, 'errorMessage' => 'El usuario no existe'], 500);
            } 

        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json(['success' =>  true], 200);
    }


}