<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Page\AboutUsResource;
use App\Http\Resources\Page\ContactUsResource;
use App\Http\Resources\Page\HomePageAboutUsSectionSectionResource;
use App\Http\Resources\Page\StepsSectionResource;
use App\Http\Resources\Page\HomePageHeroSectionResource;
use App\Http\Resources\Page\PageCollection;
use App\Http\Resources\Page\PageInfoResource;
use App\Http\Resources\Page\PageResource;
use App\Models\Page;
use App\Models\Setting;
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
            $pages = Page::filter()->order()->get();
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
            return Response::respondSuccess(Response::SUCCESS, new PageInfoResource($page));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function aboutUs()
    {
        $setting = Setting::first();
        try{
            return Response::respondSuccess(Response::SUCCESS, new AboutUsResource($setting));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function contactUs()
    {
        $setting = Setting::first();
        try{
            return Response::respondSuccess(Response::SUCCESS, new ContactUsResource($setting));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function heroSection()
    {
        $setting = Setting::first();
        try{
            return Response::respondSuccess(Response::SUCCESS, new HomePageHeroSectionResource($setting));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
    public function AboutUsSection()
    {
        $setting = Setting::first();
        try{
            return Response::respondSuccess(Response::SUCCESS, new HomePageAboutUsSectionSectionResource($setting));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function StepsSection()
    {
        $setting = Setting::first();
        try{
            return Response::respondSuccess(Response::SUCCESS, new StepsSectionResource($setting));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


}
