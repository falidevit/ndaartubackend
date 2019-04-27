@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Etablissements
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($etablissements, ['route' => ['etablissements.update', $etablissements->id], 'method' => 'patch']) !!}

                        @include('etablissements.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection