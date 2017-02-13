@extends('admin.admin')
@section('controller','user')
@section('action','edit')
@section('admin_content')
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="txtUser" value="{!! $data['username'] !!}" disabled />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
        </div>
        <div class="form-group">
            <label>RePassword</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! $data['email'] !!}" />
        </div>
        <div class="form-group">
            <label>User Level</label>
            <label class="radio-inline">
                <input name="rdoLevel" value="1" checked="checked" type="radio">Admin
            </label>
            <label class="radio-inline">
                <input name="rdoLevel" value="2" checked="checked" type="radio">Member
            </label>
        </div>
        <button type="submit" class="btn btn-default">User Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@stop 