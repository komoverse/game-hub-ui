@extends('admin/template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Create Game</h1>
        </div>
    </div>
    <form action="{{ url('admin/game/create') }}" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
        @csrf
            <div class="row">
                <div class="col-12 col-md-4">
                    Game ID <sup>*</sup>
                </div>
                <div class="col-12 col-md-8">
                    <input type="text" required="required" name="game_id" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Game Name <sup>*</sup>
                </div>
                <div class="col-12 col-md-8">
                    <input type="text" required="required" name="game_name" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Genre <sup>*</sup> <i>Comma separated</i>
                </div>
                <div class="col-12 col-md-8">
                    <input type="text" required="required" name="genre" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Logo Image (square) <sup>*</sup>
                </div>
                <div class="col-12 col-md-8">
                    <input type="url" required="required" name="logo_image_url" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Hero Banner Image (2000 x 900) <sup>*</sup>
                </div>
                <div class="col-12 col-md-8">
                    <input type="url" required="required" name="hero_banner_url" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Developer Name <sup>*</sup>
                </div>
                <div class="col-12 col-md-8">
                    <input type="text" required="required" name="developer_name" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Description <sup>*</sup>
                </div>
                <div class="col-12 col-md-12">
                    <textarea required="required" name="description" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12 col-md-4">
                    Website
                </div>
                <div class="col-12 col-md-8">
                    <input type="url" name="web_url" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Twitter
                </div>
                <div class="col-12 col-md-8">
                    <input type="url" name="twitter_url" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Discord
                </div>
                <div class="col-12 col-md-8">
                    <input type="url" name="discord_url" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Facebook
                </div>
                <div class="col-12 col-md-8">
                    <input type="url" name="facebook_url" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Instagram
                </div>
                <div class="col-12 col-md-8">
                    <input type="url" name="instagram_url" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    Trailer Video URL
                </div>
                <div class="col-12 col-md-8">
                    <input type="url" name="trailer_url" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-12 col-md-8">
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-save"></i> Submit
                    </button>
                </div>
            </div> 
        </div>
    </div>
    </form>
</div>
@endsection