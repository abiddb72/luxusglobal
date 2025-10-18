<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageQuery extends Model
{
    protected $fillable = [
        'package_id','name','email','phone','address','date',
        'no_of_person','destination_address','message','status'
    ];
    

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
