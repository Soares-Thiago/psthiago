<?php

namespace App\Http\Controllers;

use App\Habilidades;
use App\Http\Requests\StoreUpdateHabilidadeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HabilidadeController extends Controller
{
    public function __construct(Request $request, Habilidades $habilidades)
    {
        //dd($request->prm1);
        $this->request = $request;
        $this->repository = $habilidades;
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
        $habilidades = Habilidades::paginate(20);

        return view('admin.pages.habilidades.index',[
            'habilidades' => $habilidades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.habilidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateHabilidadeRequest $request)
    {
        $data = $request->only('tipo','nome');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $image_path = ($request->file('foto')->store('habilidades'));
            $data['imagem'] = $image_path;
        }
        $data['status'] = 'A'; 
        $this->repository->create($data);

        return redirect()->route('habilidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habilidades =  $this->repository->find($id);
        if(!$habilidades){
            return redirect()->back();
        }
        return view('admin.pages.habilidades.show',[
            'habilidades' => $habilidades
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
        $habilidade =  $this->repository->find($id);
        if(!$habilidade){
            return redirect()->back();
        }

        return view("admin.pages.habilidades.edit", [
            'habilidade' => $habilidade
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $habilidade =  $this->repository->find($id);
        if(!$habilidade){
            return redirect()->back();
        }

        $data = $request->only('tipo','nome', 'link');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            if($habilidade->imagem && Storage::exists($habilidade->imagem)){
                Storage::delete($habilidade->imagem);
            }

            $image_path = ($request->file('foto')->store('habilidades'));
            $data['imagem'] = $image_path;
        }

        $habilidade->update($data);
        return redirect()->route('habilidades.index');
    }

    public function desactive(Request $request, $id)
    {
        $habilidade =  $this->repository->find($id);
        if(!$habilidade){
            return redirect()->back();
        }

        $data["status"] = "I";

        $habilidade->update($data);
        return redirect()->route('habilidades.index');
    }

    public function active(Request $request, $id)
    {
        $habilidade =  $this->repository->find($id);
        if(!$habilidade){
            return redirect()->back();
        }

        $data["status"] = "A";

        $habilidade->update($data);
        return redirect()->route('habilidades.index');
    }

    public function search (Request $request){

        $filters = $request->except('_token');

        $habilidades = $this->repository->search($request->filter);

        return view('admin.pages.habilidades.index',[
            'habilidades' => $habilidades,
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
