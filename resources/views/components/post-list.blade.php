@if($posts->isEmpty())
    <div class="py-3">
        <div style="font-size: medium">
            <span class="text-dark">На стене пока нет ни одной записи</span>
        </div>
    </div>
@else
    @foreach($posts as $post)
        <div class="pt-3">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="{{ Storage::url($post->user->profile->profileImage()) }}" class="rounded-circle border" width="60" height="60">
                    </div>
                    <div class="pl-3" style="font-size: medium">
                        <div>
                            <a href="/profile/{{ $post->user->id }}" class="text-primary text-decoration-none font-weight-bold">{{ $post->user->firstname }} {{ $post->user->lastname }}</a>
                        </div>
                        <div>
                            <span class="text-secondary">{{ $post->created_at }}</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    @if(auth()->id() == $post->user_id)
                        <div class="pr-2">
                            <a href="{{ route('posts.edit', $post) }}" class="btn p-0">
                                <img src="{{ asset('storage/buttons/edit.png') }}" width="20">
                            </a>
                        </div>
                    @endif

                    @can('delete', $post)
                        <div>
                            <form action="{{ route('posts.destroy', $post) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn p-0">
                                    <img src="{{ asset('storage/buttons/delete.png') }}" height="20">
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="p-3">
                <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">
                    <div class="pb-1 text-dark">{{ $post->description }}</div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ Storage::url($post->image) }}" class="w-100">
                    </div>
                </a>
            </div>
        </div>
        <hr>
    @endforeach
@endif
