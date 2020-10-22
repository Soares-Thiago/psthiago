<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sobre extends Model
{
    protected $table = "sobre";
    protected $fillable = ['titulo','mensagem','imagem', 'status'];

    public function search($filter=null){

        $results = $this->where(function($query) use($filter){
            if($filter){
                $query->where('titulo', 'LIKE', '%'.$filter.'%' );
            }
        })->paginate();
        return $results;
    }
}
