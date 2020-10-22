<?php

namespace App\Http\Controllers;

use App\Contatos;
use App\Http\Requests\StoreUpdateContatoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContatoController extends Controller
{

    public function __construct(Request $request, Contatos $projeto)
    {
        //dd($request->prm1);
        $this->request = $request;
        $this->repository = $projeto;
        //$this->middleware("auth")->only(['create','storage']);
        //$this->middleware("auth")->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contatos::paginate(20);

        return view('admin.pages.contatos.index',[
            'contatos' => $contatos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.contatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateContatoRequest $request)
    {
        $data = $request->only('nome', 'link');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $image_path = ($request->file('foto')->store('contatos'));
            $data['imagem'] = $image_path;
        }
        $data['status'] = 'A'; 
        $this->repository->create($data);

        return redirect()->route('contatos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contatos =  $this->repository->find($id);
        if(!$contatos){
            return redirect()->back();
        }
        return view('admin.pages.contatos.show',[
            'contatos' => $contatos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato =  $this->repository->find($id);
        if(!$contato){
            return redirect()->back();
        }

        return view("admin.pages.contatos.edit", [
            'contato' => $contato
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateContatoRequest $request, $id)
    {
        $contato =  $this->repository->find($id);
        if(!$contato){
            return redirect()->back();
        }

        $data = $request->only('nome', 'link');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            if($contato->imagem && Storage::exists($contato->imagem)){
                Storage::delete($contato->imagem);
            }

            $image_path = ($request->file('foto')->store('contatos'));
            $data['imagem'] = $image_path;
        }

        $contato->update($data);
        return redirect()->route('contatos.index');
    }

    public function desactive(Request $request, $id)
    {
        $contato =  $this->repository->find($id);
        if(!$contato){
            return redirect()->back();
        }

        $data["status"] = "I";

        $contato->update($data);
        return redirect()->route('contatos.index');
    }

    public function active(Request $request, $id)
    {
        $contato =  $this->repository->find($id);
        if(!$contato){
            return redirect()->back();
        }

        $data["status"] = "A";

        $contato->update($data);
        return redirect()->route('contatos.index');
    }

    public function search (Request $request){

        $filters = $request->except('_token');

        $contatos = $this->repository->search($request->filter);

        return view('admin.pages.contatos.index',[
            'contatos' => $contatos,
            'filters' => $filters
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
