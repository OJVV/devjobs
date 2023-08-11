<div>
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante )
    <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between items-center">
       <div class="space-y-3">
        <a href="{{ route('vacantes.show', $vacante->id )}}" class="font-bold text-xl ">
            {{ $vacante->titulo }}
        </a>

        <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
        <p class ="text-sm text-gray-500">Last Day: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
       </div>


       <div class="flex flex-col md:flex-row gab-3 items-stretch mt-5 md:mt-0">
        <a 
        href="{{route('candidatos.index', $vacante)}}" class="bg-slate-900 py-2 px-4 text-white text-xs rounded-lg font-bold uppercase  text-center m-2">

        {{$vacante->candidatos->count()}}
        Candidates
        </a>

        <a 
        href="{{ route('vacantes.edit', $vacante->id)}}" class="bg-blue-900 py-2 px-4 text-white text-xs rounded-lg font-bold uppercase text-center m-2">
        Edit
        </a>

        <button
        wire:click="$emit('mostrarAlerta', {{ $vacante->id}} )" class="bg-red-600 py-2 px-4  text-white text-xs rounded-lg font-bold uppercase text-center m-2">
        Delete
    </button>
       </div>
    </div>

    @empty
    <p class="p-3 text-center text-sm text-gray-600">
        No Vacancies
    </p>
   @endforelse

   
</div>

<div class="mt-10">
    {{$vacantes->links()}}
    
</div>

</div>

@push('scripts')


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


   <script>
    Livewire.on('mostrarAlerta', vacanteId => {
       
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    //ELIMINAR LA VACANTE
        Livewire.emit('eliminarVacante', vacanteId)
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

    });

       
   </script>

@endpush

