<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_user_owner_id',
        'company_cnpj',
        'company_cpf',
        'company_name',
        'company_agency',
        'company_account',
        'company_bank',
        'company_pix',
        'company_city',
        'licenses_avaliable',
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'company_user_owner_id');
    }
}
