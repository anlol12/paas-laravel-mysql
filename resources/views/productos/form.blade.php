<!DOCTYPE html>
<html lang="es"><head><meta charset="utf-8"><title>Producto</title>
<style>body{font-family:sans-serif;max-width: 500px;margin:2rem auto}input, textarea{width:100%}</style>
</head><body>
<h1>{{ $producto->exists ? 'Editar' : 'Nuevo' }} producto</h1>
@if($errors->any())<ul>@foreach ($errors->all() as $e)<li>{{ $e }}
</li>@endforeach</ul>@endif
<form method="POST" action="{{ $producto->exists ? route('productos.update',
$producto) : route('productos.store') }}">
@csrf
@if($producto->exists) @method('PUT') @endif
<p>Nombre<br><input name="nombre" value="{{ old('nombre', $producto->nombre)
}}"></p>
<p>Descripción<br><textarea name="descripcion">{{ old('descripcion',
$producto->descripcion) }}</textarea></p>
<p>Precio<br><input name="precio" value="{{ old('precio', $producto->precio)
}}"></p>
<p>Stock<br><input name="stock" value="{{ old('stock', $producto->stock ?? 0)
}}"></p>
<button>Guardar</button> <a href="{{ route('productos.index')
}}">Cancelar</a>
</form>
</body></html>
