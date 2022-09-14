@extends('layouts.app')

@section('content')
{{-- MEMBER LIST --}}
<section id="member-list" class="py-5 bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>Member List</h1>
                <hr class="w-25 mx-auto">
                <p class="lead">Semua ini adalah member yang terdaftar pada website blog atau profile manager!</p>

                {{-- FLASH MESSAGE --}}
                @if (session()->has('pesan')) 
                    @if (session()->get('pesan') == 'update')
                        <div class="alert alert-success alert-dismissible w-50 mx-auto fade show">
                            Data <b>{{session()->get('nama')}}</b> berhasil di update
                            <button type="button" class="btn-close" data-bs-dismiss="alert">
                            </button>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        {{-- LOOPING FOR RENDERING USERS --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            @forelse ($users as $user)
                <div class="col mt-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('img/gambar'.$user->background_profil.'.jpg') }}">
                        <div class="card-body">
                            <img src="{{ asset('storage/uploads/'.$user->gambar_profil) }}" class="rounded-circle img-thumbnail">
                            <h5 class="card-title">{{ $user->nama }}</h5>
                            <p class="card-text">{{ $user->bio_profil ?? '. . .' }}</p>
                            <ul class="fa-ul text-start">
                                <li class="mb-2">
                                    <span class="fa-li"><i class="far fa-clock"></i></span>
                                    Join in {{ date('F Y', strtotime($user->created_at)) }}
                                </li>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-briefcase"></i></span>
                                    {{$user->pekerjaan ?? '. . .'}}
                                </li>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-home"></i></span>
                                    {{$user->kota ?? '. . .'}}
                                </li>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-birthday-cake"></i></span>
                                    {{ date_diff(date_create($user->tanggal_lahir ),date_create('now'))->y }} tahun
                                </li>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-envelope"></i></span>
                                    {{ $user->email }}
                                </li>
                            </ul>
                            @can('update', $user)
                                <div class="btn-action">
                                    <a href="{{ url('/users/'.$user->id.'/edit')}}"
                                    class="btn btn-primary d-inline-block">Edit</a>
                                    <button class="btn btn-danger btn-hapus"
                                    data-id="{{$user->id}}" data-bs-toggle="modal"
                                    data-bs-target="#DeleteModal">Hapus</button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            @empty
                <p>Tidak ada data. . .</p>
            @endforelse
        </div>
    </div>
</section>

{{-- Modal for confirm delete --}}
<div class="modal fade" id="DeleteModal" role="dialog">
    <div class="modal-dialog">
        <form action="" id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Konfirmasi</h4>
                    <button type="button" class="button-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus user ini ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Ya, Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
