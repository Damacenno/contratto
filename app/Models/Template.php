<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = ['html_content'];

    public function ContractType()
    {
        return $this->hasMany(ContractType::class, 'contract_template_id');
    }
}
