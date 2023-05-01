<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=x, initial-scale=1.0">
    <title>Ciclo - Laravel9</title>
    <link rel="icon" href="{{ asset('imgs/elephant2.png') }}">
    @vite('resources/js/app.js')
</head>

<body>
    <div class="py-4 px-4">
        <h1 class="text-2xl text-gray-900">Example of Users 🔥</h1>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('users.store') }}" method="POST">

                        @if ($errors->any())
                            <div class="bg-red-100 py-4 px-4 rounded text-red-900 my-4">
                                @foreach ($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif


                        <div class="drop-shadow-md bg-white">
                            <div class="flex border-2 border-gray-200 rounded py-8 px-4 mb-4">

                                <div class="border-2 border-gray-300 rounded mx-2">
                                    <input type="text" name="name" class="px-4 py-2 w-4/5 outline-none" placeholder="Nombre:" value="{{ old('name') }}">
                                </div>

                                <div class="border-2 border-gray-300 rounded mx-2">
                                    <input type="text" name="email" class="px-4 py-2 w-4/5 outline-none" placeholder="Email:" value="{{ old('email') }}">
                                </div>

                                <div class="border-2 border-gray-300 rounded mx-2">
                                    <input type="password" name="password" class="px-4 py-2 w-4/5 outline-none"
                                        placeholder="Contraseña:">
                                </div>

                                <div class="bg-gray-900 mx-2 text-white rounded-lg px-8 py-3 cursor-pointer">
                                    @csrf
                                    <button type="submit" class="">Enviar</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <table class="mb-4 ml-8">
                    <thead>
                        <tr>
                            <th class="px-4">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b-2 border-gray-300">
                                <td class="px-4">{{ $user->id }}</td>
                                <td class="px-4">{{ $user->name }}</td>
                                <td class="px-4">{{ $user->email }}</td>
                                <td class="px-4">
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Eliminar"
                                            class="bg-red-900 text-white rounded-lg px-4 py-2 cursor-pointer  my-2"
                                            onclick="return confirm('¿Desea eliminar... ?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
