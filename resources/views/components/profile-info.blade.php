<div class="card-header d-flex justify-content-between align-items-center" style="font-size: x-large">
    <strong>{{ $user->firstname }} {{ $user->lastname }}</strong>
</div>
<div class="card-body" style="font-size: medium">
    @auth
        <div class="d-flex pb-4" >
            <div class="col-md-4 px-0" style="color: #828282">
                <span>День рождение:</span>
            </div>
            <div class="col-md-8 px-0">
                <span>{{ $user->birthday }}</span>
            </div>
        </div>
    @endauth
    <div class="pb-4 d-flex">
        <div class="col-md-4 px-0" style="color: #828282">
            <span>Город:</span>
        </div>
        <div class="col-md-8 px-0">
            <span>{{ $user->profile->city ?? 'Информация отсутствует' }}</span>
        </div>
    </div>
    <div class="d-flex">
        <div class="col-md-4 px-0" style="color: #828282">
            <span>Образование:</span>
        </div>
        <div class="col-md-8 px-0">
            <span>{{ $user->profile->education ?? 'Информация отсутствует' }}</span>
        </div>
    </div>
    @auth
        <div class="pt-4 d-flex">
            <div class="col-md-4 px-0" style="color: #828282">
                <span>Личная информация:</span>
            </div>
            <div class="col-md-8 px-0">
                <span>{{ $user->profile->personal_information ?? 'Информация отсутствует' }}</span>
            </div>
        </div>
    @endauth
</div>
