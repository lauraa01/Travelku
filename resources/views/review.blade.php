@extends('layouts.master')

@section('title', 'Review')

@section('content')
<div class="row">
    <div class="container" style="padding-top: 2%; padding-bottom: 3%">

        <h4 style="text-align: center; padding-bottom: 1%;">What people say</h4>
        <p style="text-align: center; padding-bottom: 1%;">Say something about our services!</p>

        <div class="review">

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
            </div>
            @endif

            @if (Auth::user()->role != 'admin')
                <form action="/review/proses" method="POST" enctype="multipart/form-data" style="padding-left: 5%">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <b>File Gambar</b><br/>
                        <input type="file" name="file">
                    </div>

                    <br>
                    <div class="form-group" style="padding-bottom: 3%">
                        <b>Description</b> <br>
                        <textarea class="form-control" name="description" cols="30" style="padding: 0.5% 2%;"></textarea>
                    </div>

                    <input type="submit" value="Upload" class="btn btn-primary" style="background-color:green; color: white; padding: 0.5% 1%; margin-left:44%; margin-bottom: 2%">
                </form>
            @endif

            <h4 class="my-5" style="text-align: center;">Data</h4>

            <table class="table" style="padding: 2%;">
                <thead>
                    <tr>
                        <th width="1%">File</th>
                        <th>Description</th>
                        @if (Auth::user()->role == 'admin')
                            <th width="1%">OPSI</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($gambar as $g)
                    <tr>
                        <td><img width="400vw" src="{{ url('/images/'.$g->file) }}"></td>
                        <td style="text-align: center; width: 1rem">{{$g->description}}</td>
                        @if (Auth::user()->role == 'admin')
                            <td><a class="btn btn-danger" href="review/delete{{ $g->id }}">HAPUS</a></td>
                        @endif
                    </tr>

                    @empty
                    <td colspan="2">
                        No data...
                    </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
