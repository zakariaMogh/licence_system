<?php


namespace App\QueryFilter;


class ProductSearch extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            return $builder->where('name','like','%'.$q.'%')
                ->orWhere('code','like','%'.$q.'%');
        }

        return $builder;
    }
}
