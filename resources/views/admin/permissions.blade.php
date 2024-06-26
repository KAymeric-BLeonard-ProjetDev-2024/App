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
                <div class="card-header">{{ __('Permissions') }}</div>

                @foreach($users as $user)
                <div class="card-body">

                    {{ __($user->name) }}
                    <div class="row mb-3">
                        <form action="{{route('setadmin')}}" method="post" target="_self">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-primary" name="is_admin" value="{{ !$user->is_admin }}">
                            @if($user->is_admin)
                                {{ __('remove admin') }}
                            @else
                                {{ __('set admin') }}
                            @endif
                        </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
