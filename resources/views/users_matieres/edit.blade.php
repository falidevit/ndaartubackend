@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Users Matieres
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($usersMatieres, ['route' => ['usersMatieres.update', $usersMatieres->id], 'method' => 'patch']) !!}

                        @include('users_matieres.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection