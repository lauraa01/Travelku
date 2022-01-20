@extends('layouts.master')

@section('title', 'Manage User')

@section('content')
<div class="container" style="height: 60vh">
    <div class="manage-user">
        <table class="table">
            <thead>
                <tr>
                    <td>User ID</td>
                    <td>Username</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $data)
                    <tr>
                        @if ($data->role != 'admin')
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td><a class="btn btn-primary" href="manage/delete{{ $data->id }}">Delete</a></td>
                        @endif
                    </tr>
                    @empty
                    <td colspan="2">
                        No user found ...
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
