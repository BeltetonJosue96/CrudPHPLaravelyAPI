@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- No sirve para enviar a traves del boton toda la info a nuestro controlador -->
        <form action="{{ url('/Alumnos') }}" method="post" enctype="multipart/form-data">

            <!-- Control de seguridad-->
        @csrf

        <!-- Asi llamamos a edit.blade a esta parte-->
            @include('Alumnos.createForm',['modo'=>'Registrar'])<!--['modo'=>'editar'] nos sirve para modifcar el boton del form a Editar-->
        </form>
    </div>
@endsection
