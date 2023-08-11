<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4"> Apply This Position </h3>
    @if (session()->has('message'))
    <div class="uppercase border border-green-600 bg-green-100 text-green-600 p-2 font-bold my-5 rounded-lg">
        {{ session('message') }}
    </div>

    @else

            <form wire:submit.prevent = "postularme" class="w-96 mt-5">
                @csrf

                <p class="mb-4">
                    <x-input-label for="cv" :value="__('Curriculum PDF')" />
                    <input id="cv" type="file" accept=".pdf" class="block mt-1 w-full" wire:model="cv" />
                </p>

                @error('cv')
                    <livewire:mostrar-alerta :message="$message">
                @enderror

                <x-primary-button class="w-full justify-center my-5">
                    Apply
                </x-primary-button>
            </form>
    @endif
 
  
</div>
