@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pomodoro
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pomodoro, ['route' => ['pomodoros.update', $pomodoro->id], 'method' => 'patch']) !!}

                        @include('pomodoros.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection