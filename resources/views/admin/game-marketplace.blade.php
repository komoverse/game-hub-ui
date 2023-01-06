@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Marketplace List</h2>
            <a href="{{ url('admin/game/marketplace/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Marketplace</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <table class="table table-sm table-striped" style="word-break: break-all;">
                <thead>
                    <tr>
                        <th style="word-break: normal;">Game ID</th>
                        <th>Marketplace Address</th>
                        <th>NFT Creator Wallet</th>
                        <th>Fee Account</th>
                        <th>Treasury Address</th>
                        <th>Update Authority</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marketplace_list as $marketplace)
                    <tr>
                        <td style="word-break: normal;">
                            {{ $marketplace->game_id }}
                        </td>
                        <td>
                            {{ $marketplace->marketplace_address }}
                        </td>
                        <td>
                            {{ $marketplace->nft_creator_wallet }}
                        </td>
                        <td>
                            {{ $marketplace->fee_account }}
                        </td>
                        <td>
                            {{ $marketplace->treasury_address }}
                        </td>
                        <td>
                            {{ $marketplace->marketplace_update_authority }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
