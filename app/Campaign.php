<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;



class Campaign extends Model
{
    protected $fillable = ['name', 'description','template', 'bunch', 'recipients','bunch_id', 'template_id'];

    use SoftDeletes;

    public function bunch(){
        return $this->belongsTo(Bunch::class);
    }

    public function template(){
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
