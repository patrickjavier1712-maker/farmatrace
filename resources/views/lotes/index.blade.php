@extends('layout')

@section('titulo', 'Inventario de Lotes')

@section('contenido')
    <h2>Gestión de Lotes (CRUD)</h2>
    <a href="{{ route('lotes.create') }}" style="background: #005f73; color: white; padding: 10px; text-decoration: none;">+
        Registrar Nuevo Lote</a>

    <table border="1" width="100%" style="margin-top: 20px; border-collapse: collapse;">
        <thead>
            <tr style="background: #ddd;">
                <th>ID</th>
                <th>Código Lote</th>
                <th>Medicamento</th>
                <th>Stock</th>
                <th>Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lotes as $lote)
                <tr>
                    <td>{{ $lote->id }}</td>
                    <td>{{ $lote->codigo_lote }}</td>
                    <td>{{ $lote->nombre_medicamento }}</td>
                    <td>{{ $lote->stock }}</td>
                    <td>{{ $lote->fecha_vencimiento }}</td>
                    <td>
                        <a href="{{ route('lotes.show', $lote->id) }}">Ver</a> |
                        <a href="{{ route('lotes.edit', $lote->id) }}">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No hay lotes registrados en el sistema.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection