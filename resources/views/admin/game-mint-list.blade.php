@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Mint List</h2>
            <a href="{{ url('admin/game/mints/add') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Add Mint Schedule</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Game ID</th>
                        <th>Phase</th>
                        <th>Price</th>
                        <th>Supply</th>
                        <th>Mint URL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mints as $mint)
                    <tr>
                        <td>
                            {{ $mint->mint_start_date }}
                        </td>
                        <td>
                            {{ $mint->mint_end_date }}
                        </td>
                        <td>
                            {{ $mint->game_id }}
                        </td>
                        <td>
                            {{ $mint->phase_name }}
                        </td>
                        <td>
                            {{ $mint->mint_price }}
                        </td>
                        <td>
                            {{ $mint->supply }}
                        </td>
                        <td>
                            {{ $mint->mint_page_url }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
