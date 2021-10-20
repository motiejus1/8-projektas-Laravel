<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function companyType() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
