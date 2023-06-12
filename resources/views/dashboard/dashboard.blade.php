@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Portofolio</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_portofolio }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Categories</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_category }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Skills</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_skill }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h4 class="mb-0">Data Web Personal</h4>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <h5 class=" m-3">{{ $about_me['data']['0']['title'] }}</h5>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm"></h6>
                                    <span class="mb-2 text-xs">Sub Title: <span
                                            class="text-dark ms-sm-2">{{ $about_me['data']['0']['sub_title'] }}</span></span>
                                    <span class="mb-2 text-xs">Description: <span
                                            class="text-dark ms-sm-2">{{ $about_me['data']['0']['description'] }}</span></span>
                                    <span class="mb-2 text-xs">Website: <span
                                            class="text-dark ms-sm-2">{{ $about_me['data']['0']['website'] }}</span></span>
                                    <div class="ms-auto text-end mt-3">
                                        <button class="btn btn-info px-3 mb-0" href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#modal-about-{{ $about_me['data']['0']['id'] }}">
                                            <i class="far fa-eye me-2" aria-hidden="true"></i>Detail</button>
                                    </div>
                                </div>
                            </li>
                            <div class="modal fade" id="modal-about-{{ $about_me['data']['0']['id'] }}" tabindex="-1"
                                role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-default">
                                                {{ $about_me['data']['0']['title'] }}</h6>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="exampleFormControlInput1" class="form-label">Title :</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                value="{{ $about_me['data']['0']['title'] }}">
                                            <label for="exampleFormControlInput1" class="form-label">Sub Title :</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $about_me['data']['0']['description'] }}</textarea>
                                            <label for="exampleFormControlInput1" class="form-label">Description :</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $about_me['data']['0']['description'] }}</textarea>
                                            <label for="exampleFormControlInput1" class="form-label">Image :</label>
                                            <input type="file" class="form-control" id="exampleFormControlInput1"
                                                value="{{ $about_me['data']['0']['image'] }}">
                                            <label for="exampleFormControlInput1" class="form-label">Website :</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                value="{{ $about_me['data']['0']['website'] }}">
                                            <label for="exampleFormControlInput1" class="form-label">Phone :</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                value="{{ $about_me['data']['0']['phone'] }}">
                                            <label for="exampleFormControlInput1" class="form-label">City :</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                value="{{ $about_me['data']['0']['city'] }}">
                                            <label for="exampleFormControlInput1" class="form-label">Age :</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                value="{{ $about_me['data']['0']['age'] }}">
                                            <label for="exampleFormControlInput1" class="form-label">Degree :</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                value="{{ $about_me['data']['0']['degree'] }}">
                                            <label for="exampleFormControlInput1" class="form-label">Email :</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                value="{{ $about_me['data']['0']['email'] }}">
                                            <label for="exampleFormControlInput1" class="form-label">Freelance :</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option value="Available">Available</option>
                                                <option value="Not Available">Not Available</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-warning">Save changes</button>
                                            <button type="button" class="btn btn-danger  ml-auto"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="m-3">Resume</h5>
                            @foreach ($resume['data'] as $resume)
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm"></h6>
                                        <span class="mb-2 text-xs">Title: <span
                                                class="text-dark ms-sm-2">{{ $resume['title'] }}</span></span>
                                        <span class="mb-2 text-xs">Sub Title: <span
                                                class="text-dark ms-sm-2">{{ $resume['sub_title'] }}</span></span>
                                        <span class="mb-2 text-xs">Description: <span
                                                class="text-dark ms-sm-2">{{ $resume['description'] }}</span></span>
                                        <div class="ms-auto text-end mt-3">
                                            <button class="btn btn-info px-3 mb-0" href="javascript:;"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-default-{{ $resume['id'] }}">
                                                <i class="far fa-eye me-2" aria-hidden="true"></i>Detail</button>
                                        </div>
                                    </div>
                                </li>

                                <div class="modal fade" id="modal-default-{{ $resume['id'] }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-default">{{ $resume['title'] }}
                                                </h6>
                                                <button type="button" class="btn-close text-dark"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Far far away, behind the word mountains, far from the countries Vokalia
                                                    and Consonantia, there live the blind texts. Separated they live in
                                                    Bookmarksgrove right at the coast of the Semantics, a large language
                                                    ocean.</p>

                                                <p>A small river named Duden flows by their place and supplies it with the
                                                    necessary regelialia. It is a paradisematic country, in which roasted
                                                    parts of sentences fly into your mouth.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-primary">Save
                                                    changes</button>
                                                <button type="button" class="btn btn-link  ml-auto"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
        </footer>
    </div>
@endsection
