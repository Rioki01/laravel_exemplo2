<?php
namespace App\Http\Controllers;
use App\Models\Chamado;
use App\Models\Cliente;
use Illuminate\Http\Request;
class ChamadoController extends Controller
{

    public function index()
    {
        $chamados = Chamado::all();
        return view('chamados.index', compact('chamados'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('chamados.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $chamado = Chamado::create($request->all());
        return redirect()->route('chamados.show', $chamado)->with('success', 'Chamado criado com sucesso!');
    }

    public function show(Chamado $chamado)
    {
    return view('chamados.show', compact('chamado'));
    }

    public function edit(Chamado $chamado)
    {
        $clientes = Cliente::all();
        return view('chamados.edit', compact('chamado', 'clientes'));
    }
    public function update(Request $request, Chamado $chamado)
    {
        $chamado->update($request->all());
        return redirect()->route('chamados.show', $chamado)->with('success', 'Chamado atualizado com sucesso!');
    }
    public function destroy(Chamado $chamado)
    {
        $chamado->delete();
        return redirect()->route('chamados.index')->with('success', 'Chamado excluído com sucesso!');
    }
}