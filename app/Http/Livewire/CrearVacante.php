<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;



class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;  //para subir imagenes

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'nullable|image|max:1024'

    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        //almacenar la imagen

       $imagen =  $this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/', '', $imagen);


        //crear la vacante 
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id'=> $datos['salario'],
            'categoria_id'=>$datos['categoria'],
            'empresa'=>$datos['empresa'],
            'ultimo_dia'=>$datos['ultimo_dia'],
            'descripcion'=>$datos['descripcion'],
            'imagen'=>$nombre_imagen,
            'user_id'=>auth()->user()->id,
        ]);
        //crear un mensaje
        session()->flash('message', 'The vacancy has Been Posted');


        //redireccionar el ususario 

        return redirect()->route('vacantes.index');
    }

    public function render()
    {

        //consultar base de datos 
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
