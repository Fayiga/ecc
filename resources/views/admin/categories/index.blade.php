@extends('admin.app')
@section('title') 
{{ $pageTitle }}
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home"></i>
        </span> {{ $subTitle }} </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
        @include('admin.partials.flashmessages')
 
          <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <div class="tile-body">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Name </th>
                                            <th> Slug </th>
                                            <th class="text-center"> Parent </th>
                                            <th class="text-center"> Featured </th>
                                            <th class="text-center"> Menu </th>
                                            <th class="text-center"> Order </th>
                                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            @if ($category->id != 1)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td>{{ $category->parent->name }}</td>
                                                    <td class="text-center">
                                                        @if ($category->featured == 1)
                                                            <span class="badge badge-success">Yes</span>
                                                        @else
                                                            <span class="badge badge-danger">No</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($category->menu == 1)
                                                            <span class="badge badge-success">Yes</span>
                                                        @else
                                                            <span class="badge badge-danger">No</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $category->order }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group" role="group" aria-label="Second group">
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection