<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request) {
        ['q' => $query] = $request->validated();

        $builder = User::query();
        $this->applyLikeCondition($builder, 'firstname', $query);
        $this->applyLikeCondition($builder, 'lastname', $query);

        $users = $builder->latest()->SimplePaginate(6);

        return view('search', [
            'users' => $users,
        ]);
    }

    protected function applyLikeCondition(Builder $builder, $key, $text) {
        $builder
            ->orWhere($key, 'like', "%$text")
            ->orWhere($key, 'like', "$text%")
            ->orWhere($key, 'like', "%$text%");
    }
}
