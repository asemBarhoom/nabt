<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Resources\SystemAdmin\SystemAdminCollection;
use App\Models\SystemAdmin;
use Illuminate\Http\Request;

class SystemAdminController
{
    public function index(Request $request)
    {
        try{
            $systemAdmins = SystemAdmin::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new SystemAdminCollection($systemAdmins));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
