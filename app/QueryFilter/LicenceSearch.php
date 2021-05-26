<?php


namespace App\QueryFilter;


class LicenceSearch extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            return $builder->where('serial_key','like','%'.$q.'%')
                ->orWhere('hard_drive_number','like','%'.$q.'%')
                ->orWhereHas('product', function ($query) use ($q){
                    $query->where('code','like','%'.$q.'%')
                        ->orWhere('name','like','%'.$q.'%');
                });
        }

        return $builder;
    }
}
