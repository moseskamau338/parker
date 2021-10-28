<x-app-layout>
  @include('layouts.includes.breadcrumb', ['crumbs'=>[
        (object)['name' => 'Zones', 'route'=>'zones'],
    ]])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
            <h1 class="text-2xl text-gray-700">Manage <strong>Zones</strong></h1>
            @livewire('zones')
        </div>
    </div>
</x-app-layout>
