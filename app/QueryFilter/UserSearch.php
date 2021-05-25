<?php


namespace App\QueryFilter;


class UserSearch extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            return $builder->where('name','like','%'.$q.'%')
                ->orWhere('email','like','%'.$q.'%');
        }

        return $builder;
    }
}
