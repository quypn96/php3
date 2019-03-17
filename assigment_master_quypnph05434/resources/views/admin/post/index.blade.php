@extends('layouts.main-admin')
@section('title', 'Danh sách bài viết')
@section('pagename', 'Bài viết')
@section('content')
@php
  $category_id = isset($_GET['category_id'])?$_GET['category_id']: ""; 
  $status = isset($_GET['status'])?$_GET['status']: ""; 
  $title = isset($_GET['title'])?$_GET['title']: ""; 

  $statusList= [
      "Hủy đăng" => '-1',
      "Nháp" => '0',
      "Active" => '1',
  ];
@endphp
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Lọc bài viết</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <form action="{{ route('post.list') }}" method="get" accept-charset="utf-8">
          
          <div class="col-md-12">
            <div class="form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input type="text" name="title" value="{{$title}}" class="form-control">
                    </td>
                    <td>
                      <select name="category_id" class="form-control">
                          <option value="">Tất cả</option>
                          
                        @foreach ($cates as $item)
                          <option 
                            @if($item->id == $category_id)
                            selected
                            @endif
                            value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="status" class="form-control">
                        <option value="">Tất cả</option>
                        @foreach ($statusList as $key=>$value)
                          <option 
                            @if($value == $status)
                            selected
                            @endif
                            value="{{$value}}">{{$key}}</option>
                        @endforeach
                        {{-- <option value="-1">Hủy đăng</option>
                        <option value="0">Nháp</option>
                        <option value="1">Active</option> --}}
                      </select>
                    </td>
                    <td>
                      <button type="submit" class="btn btn-success">Duyệt</button>
                    </td>
                    </tr>   
                </tbody>
              </table>
            </div>
          </div>
        </form>
      </div>
      <div class="box-header with-border">
        <h3 class="box-title">Danh sách bài viết</h3>
      </div>  
      <table class="table table-bordered" id="myTable">

        <tbody>
      <tr>
          <th style="width: 10px">#</th>
          <th>Tiêu đề</th>
          <th>Danh mục</th>
          <th>Ảnh</th>
          <th>Trạng thái</th>
          
          <th>
            <a href="{{ route('post.add') }}" class="btn btn-xs btn-success">Thêm bài viết</a>
          </th>
          <th>
            <select id="selectAll">
              <option value=""></option>
              <option value="1">Bỏ chọn</option>
              <option value="2">Chọn tất cả</option>
              
            </select>
            <button id="removeall" class="btn btn-xs btn-danger " >Xóa </button><br>
            
          </th>
        </tr>
        @foreach ($posts as $p)
          <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->title}}</td>
            <td>
              {{$p->category->name}}
            </td>
            <td>
              <img src="{{asset($p->image)}}" width="100">
            </td>
            <td>{{ $p->status }}</td>
            
            <td>
              <a href="{{ route('post.edit', ['id'=> $p->id]) }}" class="btn btn-xs btn-primary">Sửa</a>
              <a href="javascript:void(0);" linkurl="{{ route('post.delete',[ 'id' =>$p->id ]) }}" class="btn btn-xs btn-danger btn-remove">Xoá</a>
            </td>
            <td>
              <input type="checkbox" class="form-check-input cb" name="listId" value="{{$p->id}}">
            </td>
          </tr>
        @endforeach
        
      </tbody>
      </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix text-center">
      <ul class="pagination pagination-sm no-margin pull-right ">
        {{ $posts->links() }}
      </ul>
    </div>
  </div>
@endsection
@section('js')
  <script type="text/javascript">
  $(document).ready(function(){
      $('.btn-remove').on('click', function(){
        var conf = confirm('Bạn có chắc chắn muốn xoá bài viết này hay không ?');
        if(conf){
          window.location.href = $(this).attr('linkurl');
        }
      });    
  });
    
  </script>
  <script>
      $(document).ready(function() {
        $('#selectAll').on('change',function(){
          if (this.value ==2) {
            $('.cb').prop('checked', true);
          }else if(this.value==1){
            $('.cb').prop('checked', false);
          }
        });

        $('#removeall').click(function() {
            var list = [];
            $('#myTable input:checked').each(function() {
                list.push(this.value);
            });
            console.log(list);
            if (list ==null || list =="") {
              var c = confirm('Bạn chưa chọn bài viết nào')
            }else{
              var confirmA = confirm('Bạn có chắc chắn muốn xoá các bài viết đã chọn?');
              
              if(confirmA){
                 window.location.href = "bai-viet/xoalist?listId="+list;
              } 
            }

        });
    });
    // document.getElementById("removeall").addEventListener('click',onclickRemoveAll);
    // function onclickRemoveAll(){
    //   var listId = document.getElementsByName('listId');
    //   var list = [];
    //   console.log(listId.length);
      
    //   for(var i=0, i < listId.length, i++){
    //     if (listId[i].checked==true) {
    //         list.push(listId[i].value);
    //     }
    //   }
    //   console.log(list);
      
    //   var confirmA = confirm('Bạn có chắc chắn muốn xoá các bài viết đã chọn không ?');
    //     if(confirmA){
    //       window.location.href = $(this).attr('linkurl');
    //     }
    // }
  </script>
@endsection