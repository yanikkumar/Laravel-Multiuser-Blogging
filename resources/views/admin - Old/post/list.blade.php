@extends('admin.layout.master')

@section('content')


    <div class="content-wrapper">
        <section class="content-header">
        <h1>
            {{ $page_name }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Posts</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="box-header">
                        <h3 class="box-title">{{ $page_name }}</h3>
                        @permission(['Post Add', 'All'])
                        <a href="{{ url('/admin/post/create') }}" class="btn btn-sm btn-primary pull-right">Create</a>
                        @endpermission
                    </div>
                    <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dt-responsive" width="100%">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Total Views</th>
                    <th>Status</th>
                    <th>Hot News</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $i=>$row)
                    <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        @if(file_exists(public_path('/storage/post/').$row->thumb_image))
                        <img src="{{ asset('/storage/post') }}/{{ $row->thumb_image }}" class="img img-responsive" />
                        @endif
                    </td>

                    <td>{{ $row->title }}</td>
                    <td>{{ $row->creator->name }}</td>
                    
                    @if($row->view_count >= 1000)
                        @php
                        $in_K = $row->view_count / 1000
                        @endphp
                    <td>{{ $in_K }}k <br>
                        @if( $row->view_count === $top_viewed) 
                        <small class="label pull-right bg-purple pull-left">Top <i class="fa fa-eye"></i></small>
                        @endif
                    </td>
                    @else
                    <td>{{ $row->view_count }}
                        @if( $row->view_count === $top_viewed) <small class="label pull-right bg-purple">Top <i class="fa fa-eye"></i></small> @endif
                    </td>
                    @endif

                    <td>
                    @permission(['Publish Post', 'All'])
                        <form method="post" action="{{ url('/admin/post/status/'.$row->id) }}" style="display:inline">
                        @method('PUT')
                        @csrf
                        @if($row->status === 1)
                        <button type="submit" class="btn btn-xs btn-success">
                            <i class="fa fa-check-circle"></i> Published
                        </button>
                        @else
                        <button type="submit" class="btn btn-xs btn-danger">
                            <i class="fa fa-times-circle"></i> Unpublished
                        </button>
                        @endif
                        </form>
                    @else
                        @if($row->status === 1)
                        <button class="btn btn-xs btn-success" disabled>
                            <i class="fa fa-check-circle "></i> Published
                        </button>
                        @else
                        <button class="btn btn-xs btn-danger" disabled>
                            <i class="fa fa-times-circle"></i> Unpublished
                        </button>
                        @endif
                    @endpermission
                    </td>

                    <td>
                    @permission(['Publish Post', 'All'])
                        <form method="post" action="{{ url('/admin/post/hot/news/'.$row->id) }}" style="display:inline">
                        @method('PUT')
                        @csrf
                        @if($row->hot_news === 1)
                        <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Yes</button>
                        @else
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> No</button>
                        @endif
                        </form>
                    @else
                        @if($row->hot_news === 1)
                        <button class="btn btn-xs btn-success" disabled>
                            <i class="fa fa-check-circle "></i> Yes
                        </button>
                        @else
                        <button class="btn btn-xs btn-danger" disabled>
                            <i class="fa fa-times-circle"></i> No
                        </button>
                        @endif
                    @endpermission
                    </td>
                    </td>

                    <td>
                        @permission(['Post Add', 'All'])
                        <a href="{{ url('/admin/comment/'.$row->id) }}" class="btn btn-xs btn-info"><i class="fa fa-comments-o"></i></a>
                        @endpermission
                        @permission(['Post Add', 'All'])
                        <a href="{{ url('/admin/post/edit/'.$row->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                        @endpermission
                        @permission(['Post Delete', 'All'])
                        <form method="post" action="{{ url('/admin/post/delete/'.$row->id) }}" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        @else
                        <button class="btn btn-xs btn-danger" disabled><i class="fa fa-trash"></i></button>
                        @endpermission
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </section>
    </div>


    {{-- Data Table JS --}}

    <script>
    $(function () {
        $('#example1').DataTable({
            responsive: true
        })
        $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>

    {{-- Data Table JS Ends --}}

@endsection
