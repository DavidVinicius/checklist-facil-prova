<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionInterestedRequest;
use App\Services\InterestedService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class InterestedController extends Controller
{
    public function subscribe(SubscriptionInterestedRequest $request, $id)
    {
        try {            
            $subscription = (new InterestedService)->subscribe($id, $request->email);
            return response()->json(['subscription' => $subscription], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => $e->getMessage()], 404);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Ocorreu um erro ao tentar fazer a inscrição na lista de interesse desse bolo".$th->getMessage().$th->getFile().$th->getLine()], 500);
        }
    }
    
    public function unsubscribe(SubscriptionInterestedRequest $request, $id)
    {
        try {            
            $was_subscribed = (new InterestedService)->unsubscribe($id, $request->email);
            return response()->json(['unsubscribed' => $was_subscribed], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Ocorreu um erro ao tentar fazer cancelar a inscrição na lista de interesse desse bolo."], 500);
        }
    }
}
