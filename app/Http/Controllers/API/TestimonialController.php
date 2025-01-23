<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Testimonial\TestimonialCollection;
use App\Models\Testimonial;

use App\Http\Requests\API\Testimonial\StoreTestimonialRequest;
use App\Http\Resources\Testimonial\TestimonialResource;

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

    public function store(StoreTestimonialRequest $request)
    {
        try {
            $user = auth()->guard('api')->user();

            $testimonial = new Testimonial();
            $testimonial->body = $request->body;
            $testimonial->rating = $request->rating;
            $testimonial->testimonialsable_id = $request->testimonialsable_id;
            $testimonial->testimonialsable_type = $request->testimonialsable_type;
            $testimonial->status = false;
            $testimonial->user_id = $user->id;

            $testimonial->save();

            return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, new TestimonialResource($testimonial));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
