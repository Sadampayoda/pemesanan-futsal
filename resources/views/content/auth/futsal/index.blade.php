@extends('components.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Futsal All</h2>
        </div>
        <div class="col d-flex justify-content-end">
            {{ $data->links() }}
        </div>
    </div>
    @if (auth()->user()->level == 'users')
        <div class="row d-flex justify-content-center">
            @foreach ($data as $item)
                <div class="col-5 p-3">
                    <div class="card" style="width: 25rem;">
                        <img src="{{ asset('assets/img/login.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <a href="#" class="btn btn-success">Jadwal & pesan</a>
                            <a href="{{$item->link}}" class="btn btn-dark">Lihat lokasi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if (auth()->user()->level == 'futsal')

    @endif
@endsection
