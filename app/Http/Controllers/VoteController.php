<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Models\Vote;
use App\Models\Content;

class VoteController extends Controller
{
    public function index()
    {
        $votes = Vote::paginate(8);
        $sumvote = Vote::All();
        $countlikevote = $sumvote->where('vote', 1)->count();
        $countdislikevote = $sumvote->where('vote', 0)->count();
        $likevote = $sumvote->where('vote', 1);
        $dislikevote = $sumvote->where('vote', 0);
        return view('vote.index', compact('votes','countlikevote','countdislikevote','sumvote','likevote','dislikevote'));
    }

    public function create($id)
    {
        $votes = new Vote;
        $contents = Content::findOrFail($id);
        return view('vote.form', compact('contents'));
    }

    public function store(VoteRequest $request, $id)
    {
        $votes = new Vote;
        $this->save($votes, $request, $id);
        return redirect('/content');
    }

    private function save($data, $value, $id)
    {
        $data->vote = $value->vote;
        $data->contents_id = $id;
        $data->save();
    }
}
