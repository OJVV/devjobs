<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold uppercase text-3xl text-white my-3">
            {{$vacante->titulo}}
        </h3>


        <div class="md:grid md:grid-cols-2 bg-gray-700 p-4 my-10">
            <p class="text-xs font-bold uppercase text-white my-3" >Company: 
                <span>{{$vacante->empresa}}</span>
            </p>

            <p class="text-xs font-bold uppercase text-white my-3" >Last day: 
                <span>{{$vacante->ultimo_dia->toFormattedDateString()}}</span>
            </p>

            <p class="text-xs font-bold uppercase text-white my-3" >Category: 
                <span>{{$vacante->categoria->categoria}}</span>
            </p>

            <p class="text-xs font-bold uppercase text-white my-3" >Salary: 
                <span>{{$vacante->salario->salario}}</span>
            </p>
        </div>
    </div>


    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/' . $vacante->imagen )}}" alt="{{'Vacancy Image' . $vacante->titulo}}">
        </div>


        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Description: </h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest
    <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
        <p>
            Apply Vacancy? <a class="font-bold text-indigo-600"href="{{route('register')}}"> Create Account and Apply this vacancy and more</a>
        </p>
    </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
    <livewire:postular-vacante :vacante="$vacante"/>
    @endcannot

   
    
</div>
