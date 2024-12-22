<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
{

    private $paginationName;

    public function __construct($paginationDate, $name = "page")
    {
        parent::__construct($paginationDate);
        $this->paginationName = $name;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'current_page'      => $this->currentPage(),
            'from'              => $this->firstItem(),
            'last_page'         => $this->lastPage(),
            'per_page'          => $this->perPage(),
            'to'                => $this->lastItem(),
            'total'             => $this->total(),
            'count'             => $this->count(),
            'has_next'          => $this->hasMorePages(),
            'next_page_url'     =>    $this->nextPageUrl(),
            'previous_page_url'   =>    $this->previousPageUrl(),
            'pagination_name' => $this->paginationName,

        ];
    }
}
