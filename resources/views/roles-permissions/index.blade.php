@extends('layouts.dashboard')
@section('page-title', 'Roles And Permissions')

@section('content')

<table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($roles as $role)
          <tr>
              <td>{{$role->id}}</td>
              <td>{{$role->name}}</td>
          </tr>
          @endforeach
      </tbody>
</table>

<table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($permissions as $permission)
          <tr>
              <td>{{$permission->id}}</td>
              <td>{{$permission->name}}</td>
          </tr>
          @endforeach
      </tbody>
</table>

@endsection