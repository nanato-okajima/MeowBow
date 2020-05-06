@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @foreach ($users as $user)
          <div class="card">
            <div class="card-header p-3 w-100 d-flex">
              <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50">
              <div class="ml-2 d-flex flex-column">
                <p class="mb-0">{{ $user->name }}</p>
                <a href="{{ route('users.show', ['user' => $user]) }}" class="text-secondary">{{ $user->screen_name }}</a>
              </div>
              @if (auth()->user()->isFollowed($user->id))
                <div class="px-2">
                  <span class="px-1 bg-secondary text-light">フォローされています</span>
                </div>
              @endif
              <div class="d-flex justify-content-end flex-grow-1">
                @if (auth()->user()->isFollowing($user->id))
                  <form action="{{ route('unfollow', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">フォロー解除</button>
                  </form>
                @else
                  <form action="{{ route('follow', ['user' => $user]) }}" method="POST">
                    @csrf

                    <button class="btn btn-primary">フォローする</button>
                  </form>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="my-4 d-flex justify-content-center">
      {{ $users->links() }}
    </div>
  </div>
@endsection
