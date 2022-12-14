<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Productos extends Component
{
    public $productos, $descripcion, $cantidad, $id_prod;
    public $modal = false;

    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.productos');
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function limpiarCampos()
    {
        $this->descripcion = "";
        $this->cantidad = "";
        $this->id_prod = "";
    }

    public function guardar()
    {
        Producto::updateOrCreate(['id'=>$this->id_prod],
            [
                'descripcion' => $this->descripcion,
                'cantidad' => $this->cantidad
            ]);

        session()->flash('message',
            $this->id_prod ? '¡Actualización exitosa!' : '¡Alta Exitosa!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        $this->id_prod = $id;
        $this->descripcion = $producto->descripcion;
        $this->cantidad = $producto->cantidad;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Producto::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }
}
