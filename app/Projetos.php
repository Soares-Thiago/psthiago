<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    //protected $table = 'projetos';
    protected $fillable = ['nome','descricao','imagem', 'link', 'status'];

    public function search($filter=null){

        $results = $this->where(function($query) use($filter){
            if($filter){
                $query->where('nome', 'LIKE', '%'.$filter.'%' );
            }
        })->paginate();
        return $results;
    }
}
