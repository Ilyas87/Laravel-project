<form action="{{ route('search') }}">
    <div class="input-group">
        <input type="text"
               class="form-control px-2 form-control-alt bg-light @error('q') is-invalid @enderror"
               name="q"
               aria-hidden="true"
               placeholder="@error('q'){{ $message }}@enderror">
    </div>
</form>
