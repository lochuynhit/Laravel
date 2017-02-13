@extends('admin.admin')
@section('controller','Category')
@section('action','list')
@section('admin_content')
<!-- Page Content -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    @foreach($list_cate as $item)
        <tr class="odd gradeX" align="center">
            <td>{!! $item['id'] !!}</td>
            <td>{!! $item['name_cate'] !!}</td>
            <td>
            @if ($item['parent_id_cate'] == 0)
            {!! "NONE" !!}
            @else
            <?php
                $parent = DB::table('categories')->where('id',$item['parent_id_cate'])->first();
                echo $parent->name_cate;
            ?>
            @endif
            </td>
            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a onclick="return comfirmDelete('Are you sure Delete')" href="{{ URL::route('admin.cate.getDelete',$item['id']) }}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ URL::route('admin.cate.getEdit',$item['id']) }}">Edit</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop  
