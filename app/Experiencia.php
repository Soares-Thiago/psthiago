<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $table = "experiencia";
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
