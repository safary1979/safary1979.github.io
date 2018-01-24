<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Subscriber extends Model
{
    use SoftDeletes;

    protected $fillable = ['email', 'f_name', 'l_name','bunch_id'];

    public function bunch(){
        return $this->belongsTo(Bunch::class);
    }

    public function scopeOwned($query)
    {
        return $query->where('created_by', Auth::user()->id);
    }

    public static function boot()
    {
        parent::boot();
        static::updating(function ($table) {
            $table->updated_by = Auth::user()->id;
        });
        static::creating(function ($table) {
            $table->created_by = Auth::user()->id;
            $table->updated_by = Auth::user()->id;
        });
    }

}
