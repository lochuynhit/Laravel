@extends('admin.admin')
@section('controller','user')
@section('action','List')
@section('admin_content')
<!-- Page Content -->
</div>
<!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Username</th>
                <th>Level</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0?>
            @foreach($data as $item)
            <?php $i=$i+1?>
            <tr class="odd gradeX" align="center">
                <td>{!!$i!!}</td>
                <td>{!! $item['username'] !!}</td>
                <td>
                    @if($item['level']==1)
                        {!! "Admin" !!}
                        @else
                            {!! "Member" !!}
                    @endif
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('admin.user.getDelete',$item['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.user.getEdit',$item['id']) !!}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    

@stop   
