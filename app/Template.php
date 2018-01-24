<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;



class Template extends Model
{

    use Selectable;

    use SoftDeletes;

    protected $fillable = ['name', 'content'];

    public function campaigns(){
        return $this->hasMany(Campaign::class);
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
