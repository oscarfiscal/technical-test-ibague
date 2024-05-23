<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modulo Editar') }}
        </h2>
    </x-slot>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="bg-gray-200 px-6 py-4 text-center">
                <h1 class="text-4xl text-center font-bold text-purple-700 mb-6 text-gray-800">Editar Empleado</h2>
                </div>


                <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre:</label>
                            <input value="{{ $employee->first_name }}" name="first_name" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " type="text" />
                            @if ($errors->has('first_name'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('first_name') }}</p>
                            @endif
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido:</label>
                            <input value="{{ $employee->last_name }}" name="last_name" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " type="text" />
                            @if ($errors->has('last_name'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('last_name') }}</p>
                            @endif
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">email:</label>
                            <input value="{{ $employee->email }}" name="email" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " type="email" />
                            @if ($errors->has('email'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Phone:</label>
                            <input value="{{ $employee->phone }}" name="phone" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " type="number" />
                            @if ($errors->has('phone'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cargo:</label>
                            <input value="{{ $employee->position }}" name="position" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " type="text" />
                            @if ($errors->has('position'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('position') }}</p>
                            @endif
                        </div>

                        <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Selecciona el Departamento:</label>
                                <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " id="Departamento" name="departament_id">
                                    <option value="" disabled selected>Selecciona un Departamento</option>
                                    @foreach ($departaments as $departament)
                                    <option value="{{ $departament->id }}" {{ $employee->departament->id == $departament->id ? 'selected' : '' }}>{{ $departament->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>

                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <a href="{{ route('employee.index') }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit" style="background:blue;" class='w-auto rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
                    </div>
            </div>
            </form>

        </div>
    </div>
    </div>
</body>

</html>
</x-app-layout>