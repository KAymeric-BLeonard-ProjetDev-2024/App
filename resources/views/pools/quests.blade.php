@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $quest->name }}</div>


            </div>

            <div class="sideContainer">

            @foreach($exercises as $exo)
            <div>
                <a href="{{route('exercise', ['id' => $exo->id, 'terminal' => "null", "result"=>"null"])}}"
                    class="sideItem"><span>{{ $exo->name }}</span>
                </a>
            </div>
            @endforeach


            </div>

            </div>
        </div>
    </div>
</div>
@endsection