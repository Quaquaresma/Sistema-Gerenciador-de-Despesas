<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Models\Despesa;

class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {   
        $despesas = Despesa::where('user_id', auth()->id());

        if (request()->filled('search') && request()->filled('coluna')) {
            $despesas = $despesas->where(request()->input('coluna'), 'Like', '%' . request()->input('search') . '%');
        }

        if (request()->filled('atributo') && request()->filled('ordem')) {
            $despesas = $despesas->orderBy(request()->input('atributo'), request()->input('ordem'));
        }

        return view('despesas.index', [
            'despesas' => $despesas->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('despesas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|max:191',
            'valor' => 'required|numeric|gt:0',
            'data' => 'required|date_format:Y-m-d|before:tomorrow'
        ]);

        $despesa = new Despesa();

        $despesa->descricao = strip_tags($request->input('descricao'));
        $despesa->data = strip_tags($request->input('data'));
        $despesa->user_id = $request->user()->id;
        $despesa->valor = strip_tags($request->input('valor'));

        $despesa->save();

        MailController::basic_email();

        return redirect()->route('despesas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $despesa = Despesa::find($id);

        return view('despesas.show', [
            'despesa' => $despesa
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
        //
        $despesa = Despesa::findOrFail($id);

        return view('despesas.edit', [
            'despesa' => $despesa
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
        $request->validate([
            'descricao' => 'required|max:191',
            'valor' => 'required|numeric|gt:0',
            'data' => 'required|date_format:Y-m-d|before:tomorrow'
        ]);

        $despesa = Despesa::findOrFail($id);

        $despesa->descricao = strip_tags($request->input('descricao'));
        $despesa->data = strip_tags($request->input('data'));
        $despesa->valor = strip_tags($request->input('valor'));

        $despesa->save();

        return redirect()->route('despesas.show', $despesa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $despesa = Despesa::find($id);
        $despesa->delete();

        return redirect()->route('despesas.index');
    }
}
