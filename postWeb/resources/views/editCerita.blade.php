@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>Tulis Cerita Baru</h2>
            <form action="{{ route('simpanCerita')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul_label">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Masukkan Judul">
                </div>
                <div class="form-group">
                    <label for="cerita_label">Cerita</label>
                    <textarea class="form-control" name="story" rows="20" placeholder="Tulis Ceritamu"></textarea>
                </div>
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
