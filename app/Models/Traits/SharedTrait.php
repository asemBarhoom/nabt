<?php

namespace App\Models\Traits;

use App\Helpers\Constant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait SharedTrait{

    public function scopeFilter($query, $filterName = null){

        $filters = request($filterName??Constant::FILTER, []);
        $filterOperator = request('filter_operator', '=');
        $query->when(is_numeric(request()->input('filters.is_active',null)), function ($q) {
            return $q->where('is_active',(int)request()->input('filters.is_active'));
        });


        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $field => $value) {

                if ($field == 'rating_number')
                    continue;
                elseif ($value == Constant::NULL)
                    $query->whereNull($field);
                elseif ($value == Constant::NOT_NULL)
                    $query->whereNotNull($field);
                elseif($field == Constant::SEARCH)
                    $query->searchFilter($value);
                elseif ($filterOperator == 'like' && !is_array($value))
                    $query->where($field, 'like', '%'.$value.'%');
                elseif($field == Constant::BETWEEN && is_array($value)){
                    $validator = Validator::make($value , [
                        '*.0' => ['required' , 'date'],
                        '*.1' => ['required' , 'date' , 'after_or_equal:*.0']
                    ]);
                    if ($validator->fails()) {
                        throw new ValidationException($validator);
                    }
                    foreach($value as $key => $value){
                        (!empty(array_filter($value)) && is_array($value))?
                            $query->whereBetween($key,$value):null;
                    }
                    continue;
                }
                elseif($field == Constant::BETWEEN_DATES && is_array($value)){
                    $validator = Validator::make($value , [
                        '*.0' => ['required' , 'date'],
                        '*.1' => ['required' , 'date' , 'after:*.0']
                    ]);
                    if ($validator->fails()) {
                        throw new ValidationException($validator);
                    }
                    foreach($value as $key => $value){
                        (!empty(array_filter($value)) && is_array($value))?
                            $query->whereBetween($key,$value):null;
                    }

                    continue;
                }elseif($field == Constant::CREATED_AT){
                    $query->whereDate($field ,$value);
                }

                //range search


                elseif (is_array($value) && isset($field))
                        $query->whereIn($field, $value);
//                elseif (in_array($field, $this->translatable)){
//                    $query->likeInsensitive($field, $value);
//                }
                else
                    !empty($value)?$query->where($field, $value):null;
            }
        }


        return $query;
    }

    public function scopeSearchFilter($query, $value){

        if (is_null($this->translatable)) {
            $this->translatable = [];
        }
        //searching inside: [id, name, description] columns
        $query->where(function($query)use($value){
            if(is_numeric($value)) $query->orWhere(Constant::ID,'like','%'.$value.'%');

            if(is_string($value) && in_array(Constant::NAME, $this->fillable)){
                if(in_array(Constant::NAME, $this->translatable)){
                    $query->likeInsensitive(Constant::NAME, $value);
                }

                else $query->orWhere(Constant::NAME,'like','%'.$value.'%');
            }
            if(is_string($value) && in_array(Constant::FIRST_NAME, $this->fillable)){
                if(!empty($this->translatable) && in_array(Constant::FIRST_NAME, $this->translatable)){
                    $query->likeInsensitive(Constant::FIRST_NAME, $value);
                }

                else $query->orWhere(Constant::FIRST_NAME,'like','%'.$value.'%');
            }

//            if(is_string($value) && in_array(Constant::DESCRIPTION, $this->fillable)){
//                if(in_array(Constant::DESCRIPTION, $this->translatable)){
//                    $query->likeInsensitive(Constant::DESCRIPTION, $value);
//                }
//                else $query->orWhere(Constant::DESCRIPTION,'like','%'.$value.'%');
//            }

        });
    }

    public function scopeLikeInsensitive($query, $field, $value){
        return $query->whereRaw('LOWER(JSON_EXTRACT('.$field.', "$.en", "$.ar")) like "%'.strtolower($value).'%"');
    }

    public function scopeIsActiveFilter($query, $value){
        //searching inside: [id, name, description] columns
        $query->where(function($query)use($value){
            if(is_numeric($value)) $query->orWhere(Constant::IS_ACTIVE,'like','%'.$value.'%');
        });
    }
    public function scopeOrder($query){
        return $query->orderBy(request('order_by', 'updated_at'),request('order_by_direction', 'desc'));
    }


}
