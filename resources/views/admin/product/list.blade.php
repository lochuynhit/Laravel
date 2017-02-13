@extends('admin.admin')
@section('action','List')
@section('controller','Product')
@section('admin_content')
<!-- Page Content -->

</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0; ?>
        @foreach( $data as $item )
        <?php $stt = $stt+1; ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $item['name_product'] !!}</td>
            <td>{!! number_format($item['price_product']) !!} VND</td>
            <td>
                {!! \Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans() !!}
                
            </td>
            <td>
                <?php  $cate = DB::table('categories')->where('id',$item['cate_id'])->first() ?>
                @if (!empty($cate->name_cate))
                    {!! $cate->name_cate !!}
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('admin.product.getDelete',$item['id']) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.product.getEdit',$item['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<!-- /.row -->

@stop
