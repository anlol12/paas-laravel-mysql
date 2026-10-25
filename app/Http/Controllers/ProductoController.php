<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller {
    private function reglas(): array {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ];
    }

    public function index() {
        return view('productos.index', ['productos' => Producto::latest()->get()]);
    }

    public function create() {
        return view('productos.form', ['producto' => new Producto()]);
    }

    public function store(Request $r) {
        Producto::create($r->validate($this->reglas()));
        return redirect()->route('productos.index')->with('ok', 'Producto creado');
    }

    public function edit(Producto $producto) {
        return view('productos.form', compact('producto'));
    }

    public function update(Request $r, Producto $producto) {
        $producto->update($r->validate($this->reglas()));
        return redirect()->route('productos.index')->with('ok', 'Producto actualizado');
    }

    public function destroy(Producto $producto) {
        $producto->delete();
        return redirect()->route('productos.index')->with('ok', 'Producto eliminado');
    }
}
