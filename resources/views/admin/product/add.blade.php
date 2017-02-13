@extends('admin.admin')
@section('action','add')
@section('controller','Product')
@section('admin_content')
<!-- Page Content -->
<form action="{!! route('admin.product.getAdd') !!}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.block.error')
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="txtParent">
                    <option value="">Please Choose Category</option>
                        <?php cate_parent($parent , 0 , "--" , old('txtParent') ) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName') !!}" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice') !!}" />
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
                <script type="text/javascript">ckeditor('txtIntro')</script>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
                <script type="text/javascript">ckeditor('txtContent')</script>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{!! old('txtKeyword') !!}" />
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription') !!}</textarea>
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="2" type="radio">Invisible
                </label>
            </div>
            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
       
    </div><!-- end .col-lg-7 -->
    <div class="col-lg-5">
        <div id="insertImg"></div>
        <button id="addimg" type="button" class="btn btn-primary" onclick="return addImgDetail();">Add Image</button>
    </div><!-- end .col-lg-5 -->
<form>

@stop