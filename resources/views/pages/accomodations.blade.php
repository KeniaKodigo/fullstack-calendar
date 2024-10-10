@extends('home')

@section('content')
    <h1 class="title">Gestion de Alojamientos</h1>
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrar Alojamiento</button>

    <section>
        {{-- @php
            print_r($accomodations);
        @endphp --}}
        <div class="container_accomodations">
            @foreach ($accomodations as $item)
                <div class="card">
                    <img src="{{$item->image}}" alt="">
                    <h2>{{$item->name}}</h2>
                    <p><strong>Direccion:</strong> {{$item->address}}</p>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Alojamiento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('saveAccomodation')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="">Alojamiento</label>
                    <input type="text" class="form-control" name="accomodation" value="{{ old('accomodation') }}">
                    @error('accomodation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <label for="">Direccion</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <label for="">Descripcion</label>
                    <textarea name="description" class="form-control" cols="30" rows="5">{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <label for="">Subir Imagen</label>
                    <input type="file" class="form-control" name="image">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Guardar Datos</button>
                </div>
            </form>
        </div>
        </div>
    </div>

@endsection