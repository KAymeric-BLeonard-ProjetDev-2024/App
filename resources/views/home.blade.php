@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="display:flex;">
                <form action="{{route('permissions')}}" method="get" target="_self">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Permissions') }}
                    </button>
                </form>

                <form action="{{route('poolsAdmin')}}" method="get" target="_self">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Pools panel') }}
                    </button>
                </form>

                <form action="{{route('questsAdmin')}}" method="get" target="_self">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Quest panel') }}
                    </button>
                </form>

                <form action="{{route('exercicesAdmin')}}" method="get" target="_self">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Exercise panel') }}
                    </button>
                </form>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Pools') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach($pools as $pool)
                    <div class="Container">
                        <a href="{{route('pool', ['id' => $pool->id])}}"
                            class="item">
                            {{$pool->name}}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection