@extends('master')

@section('title', 'Show All Vote')

@section('content')

    <h1>Show All Vote</h1>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active text-dark" data-bs-toggle="tab" href="#home">
            Total <span class="badge bg-dark">{{ $sumvote->count() }}</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-primary" data-bs-toggle="tab" href="#menu1">
            Like <span class="badge bg-primary">{{ $countlikevote }}</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" data-bs-toggle="tab" href="#menu2">
            Dislike <span class="badge bg-danger">{{ $countdislikevote }}</span></a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
            <h3>Total</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Vote</th>
                        <th>Contents ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($votes as $vote)
                        <tr>
                            <td>{{$votes->firstItem()+$loop->index}}</td>
                            @if ($vote->vote == 1)
                                <td class="text-primary">Like</td>
                            @else
                                <td class="text-danger">Dislike</td>
                            @endif
                            <td>{{$vote->contents_id}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    {{ $votes->links() }}
                </div>
                <div class="col">
                    <a href="{{ url('/content') }}" role="button" class="btn btn-sm btn-danger float-end">Back</a>
                </div>
            </div>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
            <h3>Like</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Vote</th>
                        <th>Contents ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($likevote as $vote)
                        <tr>
                            <td>{{$votes->firstItem()+$loop->index}}</td>
                            @if ($vote->vote == 1)
                                <td class="text-primary">Like</td>
                            @else
                                <td class="text-danger">Dislike</td>
                            @endif
                            <td>{{$vote->contents_id}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    <a href="{{ url('/content') }}" role="button" class="btn btn-sm btn-danger float-end">Back</a>
                </div>
            </div>
        </div>
        <div id="menu2" class="container tab-pane fade"><br>
            <h3>Dislike</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Vote</th>
                        <th>Contents ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dislikevote as $vote)
                        <tr>
                            <td>{{$votes->firstItem()+$loop->index}}</td>
                            @if ($vote->vote == 1)
                                <td class="text-primary">Like</td>
                            @else
                                <td class="text-danger">Dislike</td>
                            @endif
                            <td>{{$vote->contents_id}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    <a href="{{ url('/content') }}" role="button" class="btn btn-sm btn-danger float-end">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
