@if($friends->isEmpty())
    <div style="font-size: medium">
        У вас пока нет друзей.
    </div>
@else
    <div class="row">
        @foreach($friends as $friend)
            <div class="px-4 py-2">
                <div>
                    <a href="{{ route('profile', $friend->user_id) }}" class="text-decoration-none">
                        <img src="{{ Storage::url($friend->profileImage()) }}" class="border rounded-circle" width="159.6" height="159.6">
                    </a>
                </div>
                <div class="text-center pt-1" style="font-size: medium;">
                    <a href="{{ route('profile', $friend->user_id) }}" class="text-decoration-none">
                        {{ $friend->user->firstname }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <hr>
    <div class="text-center pt-2">
        {{ $friends->withQueryString()->links() }}
    </div>
@endif
