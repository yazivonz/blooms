@extends('layouts.design') 

<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Users') }}
    </h2>
</x-slot>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users CRUD</h2>
        </div>
        <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-success" href="{{ route('create_user') }}"> Create New User</a>

        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>User Type</th>
        <th>Status</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($users as $user)
    <tr>
        <td>{{ $loop->iteration }}</td> 
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->usertype }}</td>
        <td>{{ $user->status }}</td>
        <td>
            @if ($user->status == 'active')
                <a href="{{ route('users.deactivate', $user->id) }}" class="btn btn-warning">Deactivate</a>
            @else
                <a href="{{ route('users.activate', $user->id) }}" class="btn btn-success">Activate</a>
            @endif
        </td>
    </tr>
    @endforeach
</table>

{!! $users->links() !!}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</x-app-layout>