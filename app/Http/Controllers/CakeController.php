<?php

namespace App\Http\Controllers;


use App\Http\Requests\CakeCreationRequest;
use App\Http\Requests\CakeUpdateRequest;
use App\Services\CakeService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CakeController extends Controller
{
    public function getCakes()
    {
        return (new CakeService)->getActiveCakes();
    }

    public function getCake($id)
    {
        try {
            $cake = (new CakeService)->getCake($id);

            return response()->json(["cake" => $cake], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(["status" => "erro", "message" => "Bolo não encontrado"], 404);
        } catch (\Throwable $th) {        
            
            Log::channel("cakes")->error("Erro na tentativa de obtenção do bolo", [
                "id" => $id,
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);

            return response()->json(["status" => "erro", "message" => "Bolo não encontrado"], 500);
        }
    }

    public function create(CakeCreationRequest $request)
    {
        try {
            $cake = (new CakeService)->createCake($request->cake);

            return response()->json(["cake" => $cake], 201);
        } catch (\Throwable $th) {

            Log::channel("cakes")->error("Erro na tentativa de criação do bolo", [
                "data" => $request->all(),
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);

            return response()->json(["status" => "erro", 'message' => "Ocorreu um erro ao tentar salvar o bolo"], 500);
        }
    }
    
    public function update(CakeUpdateRequest $request, $id)
    {
        try {
            $cake = (new CakeService)->updateCake($id, $request->cake);
            return response()->json(["cake" => $cake], 200);

        } catch (\Throwable $th) {
            
            Log::channel("cakes")->error("Erro na tentativa de atualização do bolo", [
                "id" => $id,
                "data" => $request->all(),
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);

            return response()->json(["status" => "erro", 'message' => "Ocorreu um erro ao tentar atualizar o bolo"], 500);
        }
    }
    
    public function destroy($id)
    {
        try {
            $cake = (new CakeService)->destroyCake($id);

            return response()->json(200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["status" => "erro", "message" => "Bolo não encontrado"], 404);
        } catch (\Throwable $th) {
            
            Log::channel("cakes")->error("Erro na tentativa de exclusão do bolo", [
                "id" => $id,                
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);

            return response()->json(["status" => "erro", 'message' => "Ocorreu um erro ao tentar deletar o bolo"], 500);
        }
    }
}
