@extends('layouts.main-admin')
@section('title', 'Danh sách users')
@section('pagename', 'List Users')
@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Danh sách users</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
      <tr>
          <th style="width: 10px">#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Ảnh đại diện</th>
          <th>
            <a href="{{ route('user.add') }}" class="btn btn-xs btn-success">Thêm user</a>
          </th>
        </tr>
        @foreach ($users as $u)
          <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>
            	<img src="{{asset($u->image)}}" width="100">
            </td>
            <td>
              <a href="{{ route('user.edit', ['id'=> $u->id]) }}" class="btn btn-xs btn-primary">Sửa</a>
              <a href="javascript:void(0);" linkurl="{{ route('user.delete',[ 'id' =>$u->id ]) }}" class="btn btn-xs btn-danger btn-remove">Xoá</a>
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
        var conf = confirm('Bạn có chắc chắn muốn xoá tài khoản này k ?');
        if(conf){
          window.location.href = $(this).attr('linkurl');
        }
      });
    });
  </script>
@endsection