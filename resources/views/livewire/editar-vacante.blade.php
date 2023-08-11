
<form class="md:w-1/2 space-Y-5" wire:submit.prevent='editarVacante'>
    <div>
       <x-input-label for="titulo" :value="__('Title')" />
       <x-text-input 
       id="titulo" 
       class="block mt-1 w-full" 
       type="text" 
       wire:model="titulo" 
       :value="old('titulo')" 
       placeholder="Job Title"
       />

       @error('titulo')
          <livewire:mostrar-alerta :message="$message" />
       @enderror
   </div>

   <div>
       <x-input-label for="salario" :value="__('Salary')" />
       <select 
           wire:model="salario" 
           id="salario"
           class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
           >
       <option value="">-->Select<--</option>

       @foreach ($salarios as $salario)
       <option value="{{$salario->id}}">{{ $salario->salario}}</option>
       @endforeach
       </select>
       @error('salario')
       <livewire:mostrar-alerta :message="$message" />
    @enderror
   </div>

   <div>
       <x-input-label for="categoria" :value="__('Categories')" />
       <select 
           wire:model="categoria" 
           id="categoria"
           class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
           >

           <option value="">-->Select<--</option>

       @foreach ($categorias as $categoria)
       <option value="{{$categoria->id}}">{{ $categoria->categoria}}</option>
       @endforeach
       </select>

       
       @error('categoria')
       <livewire:mostrar-alerta :message="$message" />
    @enderror
   </div>


   <div>
       <x-input-label for="empresa" :value="__('Company')" />
       <x-text-input 
       id="empresa" 
       class="block mt-1 w-full" 
       type="text" 
       wire:model="empresa" 
       :value="old('empresa')" 
       placeholder="Company: Uber, Shopify"
       />

       @error('empresa')
          <livewire:mostrar-alerta :message="$message" />
       @enderror
   </div>


   <div>
       <x-input-label for="ultimo_dia" :value="__('Last Day')" />
       <x-text-input 
       id="ultimo_dia" 
       class="block mt-1 w-full" 
       type="date" 
       wire:model="ultimo_dia" 
       :value="old('ultimo_dia')" 
   
       />

       @error('ultimo_dia')
          <livewire:mostrar-alerta :message="$message" />
       @enderror
   </div>

   <div>
       <x-input-label for="descripcion" :value="__('Description')" />
       <textarea 
       wire:model="descripcion" 
       id="descripcion"
       class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72"></textarea>
       @error('descripcion')
          <livewire:mostrar-alerta :message="$message" />
       @enderror
   </div>


   <div>
       <x-input-label for="imagen" :value="__('Image')" />
       <x-text-input 
       id="imagen" 
       class="block mt-1 w-full" 
       type="file" 
       wire:model="imagen_nueva"
       accept="image/*" 
   
       />

       <div class="my-5 w-80">
        <x-input-label :value="__('Actual Image')" />

        <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{'Imagen Vacante' . $titulo}}">
       </div>
       
       <div class="my-5 w-80"> 
        @if ($imagen_nueva) 
              New Image: 
            <img src="{{ $imagen_nueva->temporaryUrl()}}" > 
          @endif 
       </div> 
      @error('imagen_nueva')
         <livewire:mostrar-alerta :message="$message" /> 
      @enderror 
  </div> 

   <x-primary-button class="w-full justify-center my-5">
      Save
   </x-primary-button>
</form>


