<?php

namespace App\Http\Controllers;

use App\Projetos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjetoController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Projetos $projeto)
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
        $projetos = Projetos::paginate(20);

        return view('admin.pages.projetos.index',[
            'projetos' => $projetos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.projetos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('nome', 'descricao', 'link');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $image_path = ($request->file('foto')->store('projetos'));
            $data['imagem'] = $image_path;
        }
        $data['status'] = 'A'; 
        $this->repository->create($data);

        return redirect()->route('projetos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projetos =  $this->repository->find($id);
        if(!$projetos){
            return redirect()->back();
        }
        return view('admin.pages.projetos.show',[
            'projetos' => $projetos
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
        $projeto =  $this->repository->find($id);
        if(!$projeto){
            return redirect()->back();
        }

        return view("admin.pages.projetos.edit", [
            'projeto' => $projeto
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
        $projeto =  $this->repository->find($id);
        if(!$projeto){
            return redirect()->back();
        }

        $data = $request->only('nome', 'descricao', 'link');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            if($projeto->imagem && Storage::exists($projeto->imagem)){
                Storage::delete($projeto->imagem);
            }

            $image_path = ($request->file('foto')->store('projetos'));
            $data['imagem'] = $image_path;
        }

        $projeto->update($data);
        return redirect()->route('projetos.index');
    }

    public function desactive(Request $request, $id)
    {
        $product =  $this->repository->find($id);
        if(!$product){
            return redirect()->back();
        }

        $data["status"] = "I";

        $product->update($data);
        return redirect()->route('projetos.index');
    }

    public function active(Request $request, $id)
    {
        $product =  $this->repository->find($id);
        if(!$product){
            return redirect()->back();
        }

        $data["status"] = "A";

        $product->update($data);
        return redirect()->route('projetos.index');
    }

    public function search (Request $request){

        $filters = $request->except('_token');

        $projetos = $this->repository->search($request->filter);

        return view('admin.pages.projetos.index',[
            'projetos' => $projetos,
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
