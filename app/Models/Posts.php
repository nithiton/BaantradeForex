<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    //
    use SoftDeletes;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('lasted', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public function getNextId()
    {
        $statement = DB::select("show table status like 'posts'");
        return $statement[0]->Auto_increment;
    }

    public function addViewed(){
        $this->viewed += 1;
        $this->save();
    }

}
