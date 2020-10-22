<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateExperienciaRequest;
use App\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienciaController extends Controller
{

    public function __construct(Request $request, experiencia $experiencia)
    {
        //dd($request->prm1);
        $this->request = $request;
        $this->repository = $experiencia;
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
        $experiencia = experiencia::paginate(20);

        return view('admin.pages.experiencia.index',[
            'experiencia' => $experiencia
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.experiencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateExperienciaRequest $request)
    {
        $data = $request->only('titulo', 'mensagem');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $image_path = ($request->file('foto')->store('experiencia'));
            $data['imagem'] = $image_path;
        }
        $data['status'] = 'A'; 
        $this->repository->create($data);

        return redirect()->route('experiencia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experiencia =  $this->repository->find($id);
        if(!$experiencia){
            return redirect()->back();
        }
        return view('admin.pages.experiencia.show',[
            'experiencia' => $experiencia
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
        $experiencia =  $this->repository->find($id);
        if(!$experiencia){
            return redirect()->back();
        }

        return view("admin.pages.experiencia.edit", [
            'experiencia' => $experiencia
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateExperienciaRequest $request, $id)
    {
        $experiencia =  $this->repository->find($id);
        if(!$experiencia){
            return redirect()->back();
        }

        $data = $request->only('titulo', 'mensagem');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            if($experiencia->imagem && Storage::exists($experiencia->imagem)){
                Storage::delete($experiencia->imagem);
            }

            $image_path = ($request->file('foto')->store('experiencia'));
            $data['imagem'] = $image_path;
        }

        $experiencia->update($data);
        return redirect()->route('experiencia.index');
    }

    public function desactive(Request $request, $id)
    {
        $experiencia =  $this->repository->find($id);
        if(!$experiencia){
            return redirect()->back();
        }

        $data["status"] = "I";

        $experiencia->update($data);
        return redirect()->route('experiencia.index');
    }

    public function active(Request $request, $id)
    {
        $experiencia =  $this->repository->find($id);
        if(!$experiencia){
            return redirect()->back();
        }

        $data["status"] = "A";

        $experiencia->update($data);
        return redirect()->route('experiencia.index');
    }

    public function search (Request $request){

        $filters = $request->except('_token');

        $experiencia = $this->repository->search($request->filter);

        return view('admin.pages.experiencia.index',[
            'experiencia' => $experiencia,
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
