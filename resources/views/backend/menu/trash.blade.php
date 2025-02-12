@extends('layout.admin')
@section('title','Thùng rác menu')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thùng rác menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.menu.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:30px;">#</th>
                                <th>Tên menu</th>
                                <th>Liên kết</th>
                                <th>Vị trí</th>
                                <th class="text-center" style="width:200px;">Chức năng</th>
                                <th class="text-center" style="width:30px;">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                            <tr>

                                <td class="text-center">
                                    <input type="checkbox" id="checkId" value="1" name="checkId[]">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->link }}</td>
                                <td>{{ $item->position }}</td>
                                <td class="text-center">
                                    @php
                                        $args=['id'=>$item->id]
                                    @endphp
                                     <a href="{{ route('admin.menu.show',$args) }}" class="btn btn-sm btn-info">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.menu.restore',$args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.menu.destroy',$args) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    {{ $item->id }}
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
@endsection