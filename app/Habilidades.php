<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    protected $fillable = ['tipo','nome', 'imagem', 'status'];

    public function search($filter=null){

        $results = $this->where(function($query) use($filter){
            if($filter){
                $query->where('titulo', 'LIKE', '%'.$filter.'%' );
            }
        })->paginate();
        return $results;
    }
}
