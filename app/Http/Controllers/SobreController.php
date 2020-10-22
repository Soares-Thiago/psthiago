<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSobreRequest;
use App\Sobre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SobreController extends Controller
{

    public function __construct(Request $request, Sobre $sobre)
    {
        //dd($request->prm1);
        $this->request = $request;
        $this->repository = $sobre;
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
        $sobre = Sobre::paginate(20);

        return view('admin.pages.sobre.index',[
            'sobre' => $sobre
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sobre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateSobreRequest $request)
    {
        $data = $request->only('titulo', 'mensagem');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $image_path = ($request->file('foto')->store('sobre'));
            $data['imagem'] = $image_path;
        }
        $data['status'] = 'A'; 
        $this->repository->create($data);

        return redirect()->route('sobre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sobre =  $this->repository->find($id);
        if(!$sobre){
            return redirect()->back();
        }
        return view('admin.pages.sobre.show',[
            'sobre' => $sobre
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
        $sobre =  $this->repository->find($id);
        if(!$sobre){
            return redirect()->back();
        }

        return view("admin.pages.sobre.edit", [
            'sobre' => $sobre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateSobreRequest $request, $id)
    {
        $sobre =  $this->repository->find($id);
        if(!$sobre){
            return redirect()->back();
        }

        $data = $request->only('titulo', 'mensagem');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            if($sobre->imagem && Storage::exists($sobre->imagem)){
                Storage::delete($sobre->imagem);
            }

            $image_path = ($request->file('foto')->store('sobre'));
            $data['imagem'] = $image_path;
        }

        $sobre->update($data);
        return redirect()->route('sobre.index');
    }

    public function desactive(Request $request, $id)
    {
        $sobre =  $this->repository->find($id);
        if(!$sobre){
            return redirect()->back();
        }

        $data["status"] = "I";

        $sobre->update($data);
        return redirect()->route('sobre.index');
    }

    public function active(Request $request, $id)
    {
        $sobre =  $this->repository->find($id);
        if(!$sobre){
            return redirect()->back();
        }

        $data["status"] = "A";

        $sobre->update($data);
        return redirect()->route('sobre.index');
    }

    public function search (Request $request){

        $filters = $request->except('_token');

        $sobre = $this->repository->search($request->filter);

        return view('admin.pages.sobre.index',[
            'sobre' => $sobre,
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
