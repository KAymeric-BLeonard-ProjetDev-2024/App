@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $exercise->name }}</div>


            </div>

            <div style="display: flex;">
                <div class="sideContainer">

                    @foreach($exercises as $exo)
                    <div>
                        <a href="{{route('exercise', ['id' => $exo->id, "terminal" => "null", "result"=>"null"])}}"
                            class="sideItem"><span>{{ $exo->name }}</span>
                        </a>
                    </div>
                    @endforeach


                </div>

            </div>

            <h3 class="title">Instructions</h3>
            <p>{{ $exercise->instructions }}</p>
            <h3 class="title">Expected function</h3>
            <p>{{ $exercise->path }}/{{ $exercise->file }}</p>
        </div>

        <div style="width: 50%;">
            <div class="title">Test panel</div>
            @if($result == "1")
                <h3 class="title">Test Réussi !!!</h3>
            @elseif($result == "0")
                <h3 class="title">Test Echoué !!!</h3>
            @endif
            <div>
                <form action="{{ route('test', ['id' => $exercise->id, "terminal" => "null", "result"=>"null"]) }}" method="get">
                    <button type="submit" id="run">
                        <div class="justifyCenter-01 alignCenter-01"><span class="mr2-01 fSans-01">→</span>Run
                            {{ $exercise->name }} test</div>
                    </button>
                </form>
            </div>
            <div>
                <div class="terminal">
                <div class="terminalText">
                    {{ $terminal }}    
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection