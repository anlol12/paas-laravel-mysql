<!DOCTYPE html>
<html lang="es"><head><meta charset="utf-8"><title>Inventario</title>
<style>body{font-family: sans-serif; max-width: 800px; margin:2rem auto}table{width:100%;border-collapse:collapse}td, th{border:1px solid #ccc; padding:6px}.ok{background:#d4edda; padding: 8px}</style>
</head><body>
<h1>Inventario de Productos</h1>
@if(session('ok'))<p class="ok">{{ session('ok') }}</p>@endif
<p><a href="{{ route('productos.create') }}">+ Nuevo producto</a></p>
<table>
<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th>
</tr>
@foreach($productos as $p)
<tr>
<td>{{ $p->id }}</td><td>{{ $p->nombre }}</td><td>$ {{ $p->precio }}</td><td>
{{ $p->stock }}</td>
<td><a href="{{ route('productos.edit', $p) }}">Editar</a>
<form method="POST" action="{{ route('productos.destroy', $p) }}"
style="display: inline">@csrf @method('DELETE')<button>Eliminar</button>
</form></td>
</tr>
@endforeach
</table>
</body></html>
