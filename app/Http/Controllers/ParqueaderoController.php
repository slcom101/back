<?php

namespace App\Http\Controllers;
use App\Models\Parqueadero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ParqueaderoController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $parqueadero = DB::table('parqueadero')
                 ->select(DB::raw('CONCAT(UPPER(LEFT(marca, 1)), LOWER(SUBSTRING(marca, 2))) as marca, count(id) as vehiculos'))
                 ->where('')
                 ->groupBy('marca')
                 ->get();


            return response()->json(['status'=>'ok','data'=>Parqueadero::all()], 200);
        }


        // public function getAllParqueadero() {
        //         $parqueadero = Parqueadero::all();
        //         return $parqueadero;
        // }

        public function getListParqueadero() {
                $parqueadero = DB::table('parqueaderos')
                 ->select(DB::raw('CONCAT(UPPER(LEFT(marca, 1)), LOWER(SUBSTRING(marca, 2))) as marca, count(id) as vehiculos'))
                 ->groupBy('marca')
                 ->get();


            return response()->json(['status'=>'ok','data'=>$parqueadero], 200);
        }
        
        

        public function createParqueadero(Request $request) {
           $validator = Validator::make($request->all(), [
                'cedula' => 'required|string',
                'nombre' => 'required|string',
                'apellido' => 'required|string',
                'placa' => 'required|string',
                'marca' => 'required|string',
                'tipo' => 'required|string',               
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->toArray(), 422);
            }  
            else{
                $parqueadero = new Parqueadero;
                $parqueadero->cedula = $request->cedula;
                $parqueadero->nombre = $request->nombre;
                $parqueadero->apellido = $request->apellido;
                $parqueadero->placa = $request->placa;
                $parqueadero->marca = $request->marca;
                $parqueadero->tipo = $request->tipo;
                $parqueadero->save();

               return response()->json([
                    "message" => "Propietario y Vehiculo Registrado"
                ], 201);
            }
      }

        public function getParqueadero($id) {
          if(Parqueadero::where('id', $id)->exists()) {
            $parqueadero = Parqueadero::find($id);

            return response()->json([
              "message" => "Registro Encontrado"
            ], 202);
          } else {
            return response()->json([
              "message" => "Registro No Encontrado"
            ], 404);
          }
        }
        

        public function updateParqueadero(Request $request, $id) {
          $parqueadero = Parqueadero::findOrFail($request->id);

            $parqueadero->nombre = $request->nombre;
            $parqueadero->apellido = $request->apellido;
            $parqueadero->placa = $request->placa;
            $parqueadero->marca = $request->marca;
            $parqueadero->tipo = $request->tipo;

            $parqueadero->save();

            return $parqueadero;
        }

        public function deleteParqueadero ($id) {
          if(Parqueadero::where('id', $id)->exists()) {
            $parqueadero = Parqueadero::find($id);
            $parqueadero->delete();

            return response()->json([
              "message" => "Registro Borrado"
            ], 202);
          } else {
            return response()->json([
              "message" => "Registro No Encontrado"
            ], 404);
          }
        }
}
