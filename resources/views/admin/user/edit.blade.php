@extends('admin.layout.master')
    @section('header')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('static/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <style type="text/css">
    .table_list {
      list-style: none;
      padding: 4px;
      margin-left: -30px;
    }
  </style>
  <title>Edit User - Tumbas.id</title>
    @endsection
    @section('body')
  <div class="row">
    <div class="col-md-12">
       <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
                    <form class="form-horizontal" method="POST" action="{{ url('admin/user/update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                value="{{ $user->name }}"
                                required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="username"
                                value="{{ $user->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="phone"
                                value="{{ $user->phone }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea class="form-control"
                                name="address" required autofocus>{{ $user->address }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select name="gender" class="form-control">
                                    @if($user->gender == "L")
                                        <option value="L" selected="selected">Laki-laki</option>
                                        <option value="P">Peremuan</option>
                                    @else
                                    <option value="L">Laki-laki</option>
                                    <option value="P" selected="selected">Peremuan</option>
                                    @endif
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Birth day</label>

                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control"
                                name="birthday" value="{{ $user->birthday }}" required autofocus>

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                    @if($user->role == "admin")
                                        <option value="admin" selected="selected">Admin</option>
                                        <option value="member">Member</option>
                                         <option value="supplier">Supplier</option>
                                    @elseif($user->role == "supplier")
                                         <option value="admin">Admin</option>
                                    <option value="member">Member</option>
                                    <option value="supplier" selected="selected">Supplier</option>
                                    @else
                                         <option value="admin">Admin</option>
                                    <option value="member" selected="selected">Member</option>
                                    <option value="supplier">Supplier</option>
                                    @endif

                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
    <!-- /.box-body -->
    </div>
    </div>
  </div>

          <!-- /.box -->
    @endsection
    @section('footer')
          <!-- DataTables -->
  <script src="{{ asset('static/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('static/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    @endsection
@show
