@foreach($users as $user)
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <a href="{{ route('profile', $user->id) }}" class="font-weight-bold text-primary text-decoration-none">
                <img src="{{ Storage::url($user->profile->profileImage()) }}" class="rounded-circle" width="80" height="80">
            </a>
            <div class="pl-3" style="font-size: medium">
                <div>
                    <a href="{{ route('profile', $user->id) }}" class="font-weight-bold text-primary text-decoration-none">
                        {{ $user->firstname }} {{ $user->lastname }}
                    </a>
                    <div>
                        <span class="text-secondary">{{ $user->profile->city }}</span>
                    </div>
                </div>
            </div>
        </div>

        @if(auth()->id() != $user->id)
            <friend-button user-id="{{ $user->id }}"></friend-button>
        @endif
    </div>
    <hr>
@endforeach

<div class="text-center pt-2">
    {{ $users->withQueryString()->links() }}
</div>
