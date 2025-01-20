<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function index()
    {
        $mensagens = Mensagem::with('product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.mensagens.index', compact('mensagens'));
    }

    public function show($id)
    {
        $mensagem = Mensagem::with('product')->findOrFail($id);
        return view('admin.mensagens.show', compact('mensagem'));
    }

}