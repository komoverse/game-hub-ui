@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Tournament List</h2>
            <a href="{{ url('admin/game/tournament/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Add Tournament</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>Tournament ID</th>
                        <th>Game ID</th>
                        <th>Name</th>
                        <th>Prize Pool</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Participant Limit</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tournaments as $row)
                    <tr>
                        <td>
                            {{ $row->tournament_id }}
                        </td>
                        <td>
                            {{ $row->game_id }}
                        </td>
                        <td>
                            <img src="{{ $row->image_url }}" style="height: 25px" alt="">
                            {{ $row->tournament_name }}
                        </td>
                        <td>
                            {{ $row->prize_pool }}
                        </td>
                        <td>
                            {{ $row->description }}
                        </td>
                        <td>
                            {{ $row->tournament_type }}
                        </td>
                        <td>
                            {{ $row->participant_limit }}
                        </td>
                        <td>
                            {{ $row->start_time }}
                        </td>
                        <td>
                            {{ $row->end_time }}
                        </td>
                        <td>
                            {{-- <a href="{{ url('admin/game/edit').'/'.$row->game_id }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
