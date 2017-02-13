@extends('admin.admin')
@section('controller','Category')
@section('action','edit')
@section('admin_content')

<!-- Page Content -->

<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.block.error')
    <form action="" method="POST">
        <div class="form-group">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <label>Category Parent</label>
            <select class="form-control" name="txtParent">
                <option value="0">Please Choose Category</option>
                <?php cate_parent($parent ,0 ,'--' , $data['parent_id_cate']);?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! old('txtCateName',isset($data) ? $data['name_cate'] : NULL) !!}" />
        </div>
        <div class="form-group">
            <label>Category Alias</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{!! old('txtOrder',isset($data) ? $data['alias_cate'] : NULL) !!}" />
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{!! old('txtKeyword',isset($data) ? $data['keyword_cate'] : NULL) !!}"/>
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtdescription">{!! old('txtdescription',isset($data) ? $data['description_cate'] : NULL) !!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@stop