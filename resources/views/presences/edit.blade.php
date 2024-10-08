@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Presences
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($presences, ['route' => ['presences.update', $presences->id], 'method' => 'patch']) !!}

                        @include('presences.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection