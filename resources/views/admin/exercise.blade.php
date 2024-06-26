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
                <div class="card-header">{{ __('Exercices') }}</div>

                @foreach($exercices as $exercice)
                <div class="card-body">
                    <div class="row mb-3">
                        <form action="{{route('updateExercice')}}" method="post" target="_self">
                            <input type="hidden" name="id" value="{{ $exercice->id }}">
                            <div>Name</div>
                            <input type="text" class="form-control" name="name" value="{{$exercice->name}}" required>
                            <div>Instructions</div>
                            <input type="text" class="form-control" name="instructions" value="{{$exercice->instructions}}" required>
                            <div>File</div>
                            <input type="text" class="form-control" name="file" value="{{$exercice->file}}" required>
                            <div>Path</div>
                            <input type="text" class="form-control" name="path" value="{{$exercice->path}}">
                            <div>Test Script</div>
                            <input type="text" class="form-control" name="testScript" value="{{$exercice->testScript}}">

                            <label>which pool and quest does this quest belong to</label>
                            <select class="form-control" name="quest" label="test">
                                @foreach($quests as $quest)
                                    @if($quest->id == $exercice->quest)
                                        <option value="{{$quest->id}}" selected>{{$quest->Pool->name}} {{$quest->name}}</option>
                                    @endif
                                @endforeach
                                @foreach($quests as $quest)
                                        <option value="{{$quest->id}}" selected>{{$quest->Pool->name}} {{$quest->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">
                                {{ __('update') }}
                            </button>
                        </form>
                    </div>

                    <div class="row mb-3">
                        <form action="{{route('deleteExercice')}}" method="post" target="_self">
                        <input type="hidden" name="id" value="{{ $exercice->id }}">
                        <button type="submit" class="btn btn-primary">
                            {{ __('delete exercice') }}
                        </button>
                        </form>
                    </div>
                </div>
                @endforeach

                <div class="card-body">
                    <div class="row mb-3">
                        <form action="{{route('createExercice')}}" method="post" target="_self">
                            <div>Name</div>
                            <input type="text" class="form-control" name="name" required>
                            <div>Instructions</div>
                            <input type="text" class="form-control" name="instructions" required>
                            <div>File</div>
                            <input type="text" class="form-control" name="file" required>
                            <div>Path</div>
                            <input type="text" class="form-control" name="path">
                            <div>Test Script</div>
                            <input type="text" class="form-control" name="testScript">
                            <label>which pool and quest does this quest belong to</label>
                            <select class="form-control" name="quest" label="test">
                                @foreach($quests as $quest)
                                        <option value="{{$quest->id}}" selected>{{$quest->Pool->name}} {{$quest->name}}</option>
                                @endforeach
                            </select>
                            </input>
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
