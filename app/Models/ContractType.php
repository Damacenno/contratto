<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    protected $fillable = ['name', 'contract_template_id', 'version', 'is_last'];

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'contract_type_id');
    }
}
