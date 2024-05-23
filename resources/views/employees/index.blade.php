<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="py-12">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="table-responsive-sm table-responsive-md">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="table-responsive-sm table-responsive-md">
                        <h1 class="text-4xl text-center font-bold text-purple-700 mb-6">Información sobre Empleados</h2>
                            <a type="button" href="{{ route('employee.create') }}" style="float: right;" class="bg-indigo-600 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M7.5 1a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM8 7V4h1v3h3v1H9v3H8V8H5V7h3z" />
                                </svg>
                            </a>
                            <table class="table table-dark table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Fecha De Creacion</th>
                                        <th scope="col">Aciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                    <tr>
                                        <td scope="row">{{$employee->first_name}}</td>
                                        <td scope="row">{{$employee->last_name}}</td>
                                        <td scope="row">{{$employee->email}}</td>
                                        <td scope="row">{{$employee->phone}}</td>
                                        <td scope="row">{{$employee->position}}</td>
                                        <td scope="row">{{$employee->created_at}}</td>
                                        <td scope="row">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>

                    {!! $employees->links() !!}
                </div>
            </div>
        </div>
</body>

</html>