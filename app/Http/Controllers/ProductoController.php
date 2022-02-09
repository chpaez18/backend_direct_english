<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Producto;

class ProductoController extends Controller{


    /**
     * GET | Retorna un listado de la tabla productos
     *  Url: http://directenglish.test/api/productos | http://directenglish.test/api/productos/1
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($id = false)
    {
        try{
            
            //verificamos si se envio el parametro id
            if($id){
                $table_data = Producto::find($id);
            }else{
                $table_data = Producto::where('estado', 1)->paginate(10);
            }
            
        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json($table_data, 200);
                                                            
    }

    /**
     * POST | Crea un nuevo registro en la tabla productos
     * Url: http://directenglish.test/api/productos/add
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        try{
            $model = new Producto();
            $model->sku = $request->input('sku');
            $model->nombre = $request->input('nombre');
            $model->cantidad = $request->input('cantidad');
            $model->precio = $request->input('precio');
            $model->descripcion = $request->input('descripcion');
            $model->save();

        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json(['success' =>  true], 200);
    }

    /**
     * PUT | Edita un registro en la tabla productos
     * Url: http://directenglish.test/api/productos/update/1
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        //header('Access-Control-Allow-Origin: *');

        try{
            $model = Producto::find($id);
            if($model){
                $model->update($request->all());
            }else{
                return response()->json(['errorCode' => 500, 'errorMessage' => 'El producto no existe'], 500);
            } 

        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json(['success' =>  true], 200);
    }

    /**
     * PUT | Se hace un borrado logico en la tabla productos, modificando el estado de 1 a 2 
     * Url: http://directenglish.test/api/productos/delete/1
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){

        //header('Access-Control-Allow-Origin: *');

        try{
            $model = Producto::find($id);
            if($model){
                $model->estado = 2;
                $model->update();
            }else{
                return response()->json(['errorCode' => 500, 'errorMessage' => 'El producto no existe'], 500);
            } 

        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json(['success' =>  true], 200);
    }


}