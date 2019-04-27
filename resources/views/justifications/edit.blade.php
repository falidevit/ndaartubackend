@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Justifications
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($justifications, ['route' => ['justifications.update', $justifications->id], 'method' => 'patch']) !!}

                        @include('justifications.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection