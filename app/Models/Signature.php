<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = [
        'contract_id',
        'signature_id',
        'signature_link_generated_at',
        'signature_link_expiry',
        'signature_link_acessed_at',
        'status',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
