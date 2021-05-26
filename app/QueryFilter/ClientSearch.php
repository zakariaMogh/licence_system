<?php


namespace App\QueryFilter;


class ClientSearch extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            return $builder->where('first_name','like','%'.$q.'%')
                ->orWhere('last_name','like','%'.$q.'%')
                ->orWhere('email','like','%'.$q.'%')
                ->orWhere('phone','like','%'.$q.'%')
                ->orWhere('company_name','like','%'.$q.'%')
                ->orWhereHas('licence', function($query) use ($q){
                    $query->where('serial_key','like','%'.$q.'%');
                });
        }

        return $builder;
    }
}
