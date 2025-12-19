<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractStatus extends Model
{
    protected $fillable = ['name'];

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'contract_status_id');
    }
}
