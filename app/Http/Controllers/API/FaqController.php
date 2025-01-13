<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Faq\FaqCollection;
use App\Http\Resources\Faq\FaqInfoResource;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index(Request $request)
    {
        try{
            $faqs = Faq::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new FaqCollection($faqs));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }




    public function show(Faq $faq)
    {
        try{
            return Response::respondSuccess(Response::SUCCESS, new FaqInfoResource($faq));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }



}
