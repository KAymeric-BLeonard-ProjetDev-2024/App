@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Quests') }}</div>

                @foreach($quests as $quest)
                <div class="card-body">
                    <div class="row mb-3">
                        <form action="{{route('updateQuest')}}" method="post" target="_self">
                            <input type="hidden" name="id" value="{{ $quest->id }}">
                            <div>Name</div>
                            <input type="text" class="form-control" name="name" value="{{$quest->name}}" required>
                            <label>which pool does this quest belong to</label>
                            <select class="form-control" name="pool" label="test">
                                <option value="{{$quest->pool}}">{{$quest->Pool->name}}</option>
                                @foreach($pools as $pool)
                                    <option value="{{$pool->id}}">{{$pool->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">
                                {{ __('update') }}
                            </button>
                        </form>
                    </div>

                    <div class="row mb-3">
                        <form action="{{route('deleteQuest')}}" method="post" target="_self">
                        <input type="hidden" name="id" value="{{ $quest->id }}">
                        <button type="submit" class="btn btn-primary">
                            {{ __('delete quest') }}
                        </button>
                        </form>
                    </div>
                </div>
                @endforeach

                <div class="card-body">
                    <div class="row mb-3">
                        <form action="{{route('createQuest')}}" method="post" target="_self">
                            <div>Name</div>
                            <input type="text" class="form-control" name="name" placeholder="Quest Name" required>
                            <label>which pool does this quest belong to</label>
                            <select class="form-control" name="pool" label="test">
                                @foreach($pools as $pool)
                                    <option value="{{$pool->id}}">{{$pool->name}}</option>
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
