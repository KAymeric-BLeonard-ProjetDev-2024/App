@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
