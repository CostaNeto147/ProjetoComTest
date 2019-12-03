<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetoRequest;
use App\Projeto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = Projeto::all();
        return view('projeto.index', compact('projetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projeto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetoRequest $request)
    {
        if(Auth::check()) {
            $usuario = Auth::user();

            if($usuario->papel == User::GERENTE_COMERCIAL){
                // dd($request->all());



                $projeto = Projeto::create($request->validated());
                return redirect()->route('projetos',[$projeto->id]);
                //return response('Ok', Response::HTTP_CREATED);
            }
        }
        return response('you shall not pass', Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $projeto = Projeto::where('id', $id)->first();
        return view('projeto.edit', compact('projeto'));
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
        //
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
