@extends('layouts.app')

@section('content')

<div class="card card-purple bg-light text-dark container my-5 justify-content-center">
    <div class="card-header">
        <h1>Usuarios</h1>
    </div>
    <div class="card-body">
        <h5><strong>Número de usuarios: </strong>{{ $users->count() }}</h5>
        @if ($users->count() < 4)

            <h6 class="text-danger">Pocos usuarios</h6>

        @elseif ($users->count()>=4 && $users->count()<=7)

            <h6 class="text-warning">Usuarios moderados</h6>

        @else

            <h6 class="text-primary">Muchos usuarios</h6>

        @endif

        <div class="py-3">
            <table class="table table-striped table-hover table-warning">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            @switch($user->gender)
                                @case('male')
                                    Masculino
                                @break
                                @case('female')
                                    Femenino
                                @break
                                @default
                                    busca
                            @endswitch
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->birthdate}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div class="card card-purple bg-light text-dark container my-5 justify-content-center">
        <div class="card-header">
            <h3>Categorias</h3>
        </div>
        <div class="card-body">
            <h5><strong>Número de categorias: </strong>{{ $categories->count() }} </h5>

            @if ($categories->count() < 2)

                <h6 class="text-danger">Pocas categorias</h6>

            @elseif($categories->count()>=3 && $categories->count()<=3)

                <h6 class="text-warning">Categorias moderadas</h6>

            @else

                <h6 class="text-primary">Hay muchas categorias</h6>

            @endif

            <div class="py-3 justify-content-center">
                <table class="table table-bordered table-hover table-warning">
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                        @empty
                            <h5 class="text-secondary">No hay categorias</h5>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <div class="card card-purple bg-light text-dark container my-5 justify-content-center">
        <div class="card-header">
            <h3>Juegos</h3>
        </div>
        <div class="card-body">
            <h5><strong>Número de juegos: </strong>{{ $games->count() }} </h5>
            @if ($games->count() < 3)
                <h6 class="text-danger">Pocos juegos</h6>
            @elseif($games->count()>=3 && $games->count()<=5)
                <h6 class="text-warning">Hay juegos moderados</h6>
            @else
                <h6 class="text-primary">Muchos juegos</h6>
            @endif
            <div class="py-3 justify-content-center">
                <table class="table table-bordered table-hover table-warning">
                    @php
                        $i = 0
                    @endphp
                    @while ($i< $games->count())
                        @php
                            $game = $games->get($i)
                        @endphp
                        <tr>
                            <td>{{$game->name}}</td>
                        </tr>
                        @php
                            $i++
                        @endphp
                    @endwhile
                </table>
            </div>
        </div>
    </div>

@endsection
