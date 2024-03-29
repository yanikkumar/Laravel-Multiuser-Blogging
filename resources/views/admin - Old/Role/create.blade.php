@extends('admin.layout.master')
    @section('content')

    <div class="content-wrapper">
        <section class="content-header">
        <h1>
            {{ $page_name }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Roles</li>
            <li class="active">Create</li>
        </ol>
        </section>
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <strong class="card-title">{{ $page_name }}</strong>
                    </div>
                    <div class="box-body">
                        <!-- Credit Card -->
                        <div id="">
                            <div class="box-body">
                        @if(count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                            <form method="post" action="{{ url('/admin/roles/store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="display_name" name="display_name" class="control-label mb-1">Display Name</label>
                                    <input id="display_name" name="display_name" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="description" name="description" class="control-label mb-1">Description</label>
                                    <textarea id="description" name="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="permission" name="permission" class="control-label mb-1">Permission</label>
                                    <select id="permission" name="permission[]" class="form-control select2" style="width: 100%;" data-placeholder="Select Permission" multiple="multiple">
                                        @foreach($permission as $permission)
                                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button id="" type="submit" class="btn btn-md btn-info">
                                    <i class="fa fa-save fa-lg"></i>&nbsp;
                                    <span id="">Save</span>
                                </button>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->

        </div><!--/.col-->
    </div><!--/.row-->

    @endsection
