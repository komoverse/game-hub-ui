@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Insight List</h2>
            <a href="{{ url('admin/game/insight/update') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Update Insight</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>Game ID</th>
                        <th>Discord Member</th>
                        <th>Discord Active</th>
                        <th>Telegram Member</th>
                        <th>Telegram Active</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insights as $insight)
                    <tr>
                        <td>
                            {{ $insight->game_id }}
                        </td>
                        <td>
                            {{ $insight->discord_member }}
                        </td>
                        <td>
                            {{ $insight->discord_active }}
                        </td>
                        <td>
                            {{ $insight->telegram_member }}
                        </td>
                        <td>
                            {{ $insight->telegram_active }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
