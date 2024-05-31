@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pools') }}</div>

                @foreach($pools as $pool)
                <div class="card-body">
                    <div class="row mb-3">
                        <form action="{{route('updatePool')}}" method="post" target="_self">
                            <input type="hidden" name="id" value="{{ $pool->id }}">
                            <div>Name</div>
                            <input type="text" class="form-control" name="name" value="{{$pool->name}}" required>
                            <div>Main File</div>
                            <input type="text" class="form-control" name="mainFile" value="{{$pool->mainFile}}" required>
                            <div>Repository name</div>
                            <input type="text" class="form-control" name="Repo" value="{{$pool->Repo}}" required>
                            <button type="submit" class="btn btn-primary">
                                {{ __('update') }}
                            </button>
                        </form>
                    </div>

                    <div class="row mb-3">
                        <form action="{{route('deletePool')}}" method="post" target="_self">
                        <input type="hidden" name="id" value="{{ $pool->id }}">
                        <button type="submit" class="btn btn-primary">
                            {{ __('delete pool') }}
                        </button>
                        </form>
                    </div>
                </div>
                @endforeach

                <div class="card-body">
                    <div class="row mb-3">
                        <form action="{{route('createPool')}}" method="post" target="_self">
                            <input type="text" class="form-control" name="name" placeholder="name" required>
                            <input type="text" class="form-control" name="mainFile" placeholder="mainFile" required>
                            <input type="text" class="form-control" name="Repo" placeholder="Repo" required>
                            <button type="submit" class="btn btn-primary">
                                {{ __('create') }}
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
