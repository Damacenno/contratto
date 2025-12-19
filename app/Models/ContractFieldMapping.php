<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractFieldMapping extends Model
{
    protected $fillable = [
        'contract_type_id',
        'page_number',
        'field_name',
        'display_name',
        'prefix',
        'x',
        'y',
        'font_size',
        'color',
    ];

    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }
}
