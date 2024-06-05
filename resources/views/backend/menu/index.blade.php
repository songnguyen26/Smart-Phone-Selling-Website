@extends('layout.admin')
@section('title','Quản lý sản phẩm')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý menu</h1>
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
                    <a class="btn btn-sm btn-danger" href="menu_trash.html">
                        <i class="fas fa-trash"></i> Thùng rác
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="#" method="post">
                        <div class="accordion" id="accordionExample">
                            <div class="card p-3">
                                <label for="postion">Vị trí</label>
                                <select name="postion" id="postion" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingCategory">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapseCategory" aria-expanded="true"
                                        aria-controls="collapseCategory">
                                        Danh mục
                                    </a>
                                </div>
                                <div id="collapseCategory" class="collapse"
                                    aria-labelledby="headingCategory" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="" id="categoryId">
                                            <label class="form-check-label" for="categoryId">
                                              Default checkbox
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="createCategory" class="btn btn-success">Thêm menu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingBrand">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapseBrand" aria-expanded="true"
                                        aria-controls="collapseBrand">
                                        Thuong hiệu
                                    </a>
                                </div>
                                <div id="collapseBrand" class="collapse"
                                    aria-labelledby="headingBrand" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="" id="brandId">
                                            <label class="form-check-label" for="brandId">
                                              Default checkbox
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="createBrand" class="btn btn-success">Thêm menu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingTopic">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapseTopic" aria-expanded="true"
                                        aria-controls="collapseTopic">
                                       Chủ đề
                                    </a>
                                </div>
                                <div id="collapseTopic" class="collapse"
                                    aria-labelledby="headingTopic" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="" id="topicId">
                                            <label class="form-check-label" for="topicId">
                                              Default checkbox
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="createTopic" class="btn btn-success">Thêm menu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingPage">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapsePage" aria-expanded="true"
                                        aria-controls="collapsePage">
                                        Trang đơn
                                    </a>
                                </div>
                                <div id="collapsePage" class="collapse"
                                    aria-labelledby="headingPage" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="" id="pageId">
                                            <label class="form-check-label" for="pageId">
                                              Default checkbox
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="createPage" class="btn btn-success">Thêm menu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingCustom">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapseCustom" aria-expanded="true"
                                        aria-controls="collapseCustom">
                                        Tùy liên kết
                                    </a>
                                </div>
                                <div id="collapseCustom" class="collapse"
                                    aria-labelledby="headingCustom" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="name">Tên menu</label>
                                            <input type="text" value="" name="name" id="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="link">Liên kết</label>
                                            <input type="text" value="" name="link" id="link" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="createCustom" class="btn btn-success">Thêm menu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card p-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
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
                                    <a href="{{ route('admin.menu.status',$args) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>

                                    <a href="{{ route('admin.menu.show',$args) }}" class="btn btn-sm btn-info">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.menu.edit',$args) }}" class="btn btn-sm btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.menu.delete',$args) }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
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