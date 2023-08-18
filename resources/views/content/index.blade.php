@extends('master')

@section('title', 'Content CRUD')

@section('content')

    <h1>First time to my blog content.</h1>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Menu</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('/') }}">Main Menu</a>
                    <a class="dropdown-item" href="{{ url('content/create') }}">Create Content</a>
                    <a class="dropdown-item" href="{{ url('vote') }}">Show All Vote</a>
                </div>
            </div>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-primary dropdown-toggle float-end" data-bs-toggle="dropdown">{{ $username }}</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ url('#') }}">Manage Account</a>
                <a class="dropdown-item text-danger" href="{{ url('/logout') }}">Logout</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered" id="tbContent">
        <thead>
            <tr>
                <th style="width: 20px">No.</th>
                <th style="width: 250px">Topic</th>
                <th style="width: 200px">Tags</th>
                <th>Links</th>
                <th style="width: 130px">Create Date</th>
                <th style="width: 75px">Status</th>
                <th style="width: 160px">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td style="text-align: center">{{$contents->firstItem()+$loop->index}}</td>
                    <td>
                        <a href="{{ url('#') }}" class="detail-item"
                        data-topic="[ ID: {{ $content->id }} ] {{ $content->topic }}" data-detail="{{ $content->description }}"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Content ID: {{ $content->id }}">
                        {{ $content->topic }}
                        </a>
                    </td>
                    <td>{{ $content->tags }}</td>
                    <td><a href="{{ $content->links }}" target="_blank">{{ $content->links }}</a></td>
                    <!--<td>{{ $content->created_at->format('d/m/Y H:i') }}</td>-->
                    <td>{{ Carbon\Carbon::parse($content->created_at)->diffForHumans() }}</td>
                    @if ($content->status == 1)
                        <td style="text-align: center" class="text-success">แสดง</td>
                    @else
                        <td style="text-align: center" class="text-danger">ไม่แสดง</td>
                    @endif
                    <td>
                        <div class="p-1">
                            <a href="{{ url("content/{$content->id}/edit") }}" role="button"
                                class="btn btn-sm btn-warning" style="width: 65px">Edit</a>
                            <button type="=button" class="btn btn-sm btn-dark delete-item"
                                data-id="{{ $content->id }}" style="width: 65px">Delete</button>
                        </div>
                        <div class="p-1">
                            @if ($content->status == 1)
                                <button type="=button" class="btn btn-sm btn-danger status-item"
                                data-id="{{ $content->id }}" style="width: 65px">Disable</button>
                            @else
                                <button type="=button" class="btn btn-sm btn-success status-item"
                                data-id="{{ $content->id }}" style="width: 65px">Enable</button>
                            @endif
                            <a href="{{ url("vote/{$content->id}/create") }}" role="button"
                                class="btn btn-sm btn-info" style="width: 65px">Vote</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $contents->links() }}
@endsection

@push('script')
    <script>
        document.querySelector('#tbContent').addEventListener('click', (e) => {
            if (e.target.matches('.delete-item')) {
                console.log(e.target.dataset.id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be delete!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete($url + '/content/' + e.target.dataset.id + '/delete').then((response) => {
                            Swal.fire(
                                'Success!',
                                'Your status has been delete.',
                                'success'
                            );
                            setTimeout(() => {
                                window.location.href = $url + '/content';
                            }, 1500);
                        });
                    }
                });
            }
            else if (e.target.matches('.status-item')) {
                console.log(e.target.dataset.id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be edit status!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete($url + '/content/' + e.target.dataset.id + '/status').then((response) => {
                            Swal.fire(
                                'Success!',
                                'Your status has been edited.',
                                'success'
                            );
                            setTimeout(() => {
                                window.location.href = $url + '/content';
                            }, 1500);
                        });
                    }
                });
            }
            else if(e.target.matches('.detail-item')) {
                Swal.fire({
                    title: e.target.dataset.topic,
                    text: e.target.dataset.detail,
                    icon: 'info',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'close'
                })
            }
        });
    </script>
@endpush
