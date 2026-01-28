<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Access\Authorizable;

class Contract extends Model
{
protected $fillable = [
    'contract_number',
    'contract_type_id',
    'contract_company_owner_id',
    'contract_status_id',
    'client_name',
    'payment_total',
    'regret_period',
    'payment_initial',
    'payment_final',
    'start_date',
    'end_date',
    'contract_file_url',
    'is_signed',
    'access_level',
];
    public function status()
    {
        return $this->belongsTo(ContractStatus::class, 'contract_status_id');
    }

    public function type()
    {
        return $this->belongsTo(ContractType::class, 'contract_type_id');
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'contract_company_owner_id');
    }

    public function signature()
    {
        return $this->hasOne(Signature::class, 'contract_id');
    }
}
