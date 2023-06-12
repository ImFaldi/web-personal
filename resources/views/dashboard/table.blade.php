@extends('layouts.dashboard')

@section('title', 'Table')

@section('table', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="row mx-0">
                        <div class="card-header pb-0 col-6">
                            <h6>Skill table</h6>
                        </div>
                        <div class="card-header pb-0 col-6">
                            <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal"data-bs-target="#add-modal">
                                <i class="fas fa-plus font-weight-bold text-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Perecentage
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skill['data'] as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-xs">{{ $item['name'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center">
                                                <span class="me-2 text-xs">{{ $item['percentage'] }}%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            aria-valuenow="{{ $item['percentage'] }}" aria-valuemin="0"
                                                            aria-valuemax="100" style="width: {{ $item['percentage'] }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-right">
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-modal">
                                                <i class="fas fa-edit font-weight-bold text-sm"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-modal">
                                                <i class="fas fa-trash font-weight-bold text-sm"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="row mx-0">
                        <div class="card-header pb-0 col-6">
                            <h6>Category table</h6>
                        </div>
                        <div class="card-header pb-0 col-6">
                            <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#add-modal">
                                <i class="fas fa-plus font-weight-bold text-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category['data'] as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-xs">{{ $item['name'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-right">
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-modal">
                                                <i class="fas fa-edit font-weight-bold text-sm"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-modal">
                                                <i class="fas fa-trash font-weight-bold text-sm"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="row mx-0">
                        <div class="card-header pb-0 col-6">
                            <h6>Portofolio table</h6>
                        </div>
                        <div class="card-header pb-0 col-6">
                            <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#add-modal">
                                <i class="fas fa-plus font-weight-bold text-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Description</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Image</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Link</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portofolio['data'] as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-xs">{{ $item['title'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{-- kata-kata yang terlalu panjang akan di potong --}}
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ Str::limit($item['description'], 30, '...') }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="{{ $item['image'] }}" class="avatar avatar-xl me-3">
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ $item['link'] }}" target="_blank"
                                                class="text-secondary font-weight-bold text-xs">
                                                {{ $item['link'] }}
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            @foreach ($category['data'] as $category)
                                                @if ($category['id'] == $item['category_id'])
                                                    <span class="text-secondary font-weight-bold text-xs">
                                                        {{ $category['name'] }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-modal">
                                                <i class="fas fa-edit font-weight-bold text-sm"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-modal">
                                                <i class="fas fa-trash font-weight-bold text-sm"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer pt-3  ">
    </footer>
@endsection
