<?php

namespace App\Http\Controllers\API;

use App\Helpers\General;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Invoice\InvoiceCollection;
use App\Http\Resources\Invoice\InvoiceInfoResource;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterRequest $request)
    {
        try {
            $user = auth()->id();
            $invoices = Invoice::query()->where('user_id', $user)->with(['booking','user'])->filter()->order()->paginate(
                $request->header('perpage')
            );
            return Response::respondSuccess(Response::SUCCESS, new InvoiceCollection($invoices));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        try {
            if ($invoice->user_id == auth()->id()) {
                return Response::respondSuccess(Response::SUCCESS, new InvoiceInfoResource($invoice));
            } else {
                return Response::respondError(Response::NOT_AUTHORIZED, 403);
            }
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

}
