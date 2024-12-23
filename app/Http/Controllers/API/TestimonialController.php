<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Testimonial\TestimonialCollection;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $testimonials = Testimonial::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new TestimonialCollection($testimonials));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
