<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    public function regency() {
        return $this->belongsTo('App\Models\Entity\Regency', 'regency_id');
    }

    public function district() {
        return $this->belongsTo('App\Models\Entity\District', 'district_id');
    }

    public function documents() {
        return $this->hasMany('App\Models\Entity\MemberDocument', 'member_id', 'id');
    }

}
