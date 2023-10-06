@extends('layouts.app')

@section('content')
    <div class="container">


            <!-- Mostramos Mensaje-->
            @if(Session::has('mensaje'))
            <div class="alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}


        </div>
        @endif


        <a href="{{url('Alumnos/createAlumnos')}}" class="btn btn-success"> Registrar otro Estudiante</a>
        <br>
        <br>
        <table class="table table table-striped table-hover">

            <thead class="table">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Fotografía</th>
                <th scope="col">Modificar</th>

            </tr>
            </thead>

            <tbody>
            <!-- Asi leemos los datos para que se muestren en la tabla-->
            @foreach($alumnos as $alumno)
                <tr>

                    <td>{{$alumno->id}}</td>
                    <td>{{$alumno->Nombres}}</td>
                    <td>{{$alumno->PrimerApellido}}</td>
                    <td>{{$alumno->SegundoApellido}}</td>
                    <td>{{$alumno->CorreoElectronico}}</td>
                    <td>{{$alumno->Celular}}</td>
                    <td>{{$alumno->Direccion}}</td>
                    <td>
                        <img src="{{ $alumno->Foto }}" alt="Foto del alumno" style="width: 100px; height: 100px;">
                    </td>


                    <!-- Mandamos a traer la info de edit y llenamos los campos-->
                    <td>

                        <a href="{{ url('/Alumnos/'.$alumno->id.'/edit') }}" class="btn btn-warning">
                            Editar
                        </a>


                        <!-- Agreamos el metodo eliminar-->
                        <form action="{{ url('/Alumnos/'.$alumno->id) }}" class="d-inline" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('Deseas borrar a este Alumno?')"
                                   value="Eliminar">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        {!! $alumnos->links() !!}
    </div>
@endsection
