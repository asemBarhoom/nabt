<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Page\PageCollection;
use App\Http\Resources\Page\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $pages = Page::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new PageCollection($pages));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        try{
            return Response::respondSuccess(Response::SUCCESS, new PageResource($page));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


}
