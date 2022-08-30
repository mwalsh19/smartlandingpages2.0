@extends('layouts.dashboard')
@section('page-title', 'Roles And Permissions')

@section('content')

@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
</div><br />
@endif

@if(session()->get('error'))
<div class="alert alert-danger">
  {{ session()->get('error') }}
</div><br />
@endif

<div class="container-fluid px-4">
  <h1 class="mt-4">Roles & Permissions</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">View</li>
  </ol>

  <div class="container">
    <div class="uper col-md-12">
      <div class="role-permission-box">
        <h1> Roles </h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            @foreach($roles as $role)
            <tr>
              <td>{{$role->id}}</td>
              <td>{{$role->name}}</td>
              <td><a href="{{ route('roles-permissions.edit', $role->id)}}" class="btn btn-primary"><i
                    class="fas fa-eye"></i>&nbsp;View</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('roles-permissions.create') }}">Create</a>
      </div>
    </div>
    <div class="spacing-large"></div>
    <div class="uper col-md-12">
      <div class="role-permission-box">
        <h1> Permissions </h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            @foreach($permissions as $permission)
            <tr>
              <td>{{$permission->id}}</td>
              <td>{{$permission->name}}</td>
              <td>
                <form action="{{ route('roles-permissions.destroy', $permission->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="type" value="permission" />
                  <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>&nbsp;Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('roles-permissions.create') }}">Create</a>
      </div>
    </div>
  </div>

</div>
@endsection