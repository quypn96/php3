@extends('layouts.main-admin')
@section('title', 'Danh sách danh mục')
@section('pagename', 'Danh mục')
@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Danh sách Danh mục</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
      <tr>
          <th style="width: 10px">#</th>
          <th>Name</th>
          <th>Slug</th>
          <th>Amount Post</th>
          <th>
            <a href="{{ route('cate.add') }}" class="btn btn-xs btn-success">Thêm Danh mục</a>
          </th>
        </tr>
        @foreach ($cates as $c)
          <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>
              {{$c->slug_category}}
            </td>
            <td>
            	{{ $c->posts_count }}
            </td>
            <td>
              <a href="{{ route('cate.edit', ['id'=> $c->id]) }}" class="btn btn-xs btn-primary">Sửa</a>
              <a href="javascript:void(0);" linkurl="{{ route('cate.delete',[ 'id' =>$c->id ]) }}" class="btn btn-xs btn-danger btn-remove">Xoá</a>
            </td>
          </tr>
        @endforeach
        
      </tbody>
      </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix text-center">
      <ul class="pagination pagination-sm no-margin pull-right ">
        
      </ul>
    </div>
  </div>
@endsection
@section('js')
  <script type="text/javascript">
  $(document).ready(function(){
      $('.btn-remove').on('click', function(){
        var conf = confirm('Bạn có chắc chắn muốn xoá danh mục này hay không ?');
        if(conf){
          window.location.href = $(this).attr('linkurl');
        }
      });
    });
  </script>
@endsection