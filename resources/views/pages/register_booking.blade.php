@extends('home')

@section('content')
    <h2 class="title">Registro de Reservaciones</h2>
    <div class="d-flex justify-content-center mb-4">
        <div class="w-50 border border-info p-3">
            <form action="{{route('saveBooking')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Reservacion</label>
                    <input type="text" class="form-control" name="booking" value="{{ old('booking') }}">
                    @error('booking')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Fecha de entrada</label>
                    <input type="date" class="form-control" name="in_date" value="{{ old('in_date') }}">
                    @error('in_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Fecha de salida</label>
                    <input type="date" class="form-control" name="out_date" value="{{ old('out_date') }}">
                    @error('out_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Monto total</label>
                    <input type="text" class="form-control" name="total_amount" value="{{ old('total_amount') }}">
                    @error('total_amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Seleccionar Alojamiento</label>
                    <select name="accomodation" class="form-control">
                        <option value="">...</option>
                        @foreach ($accomodations as $item)
                            <option value="{{$item->id}}">{{$item->accomodation}}</option>
                        @endforeach
                    </select>
                    @error('accomodation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="">Seleccionar Usuario</label>
                    <select name="user" class="form-control">
                        <option value="">....</option>
                        @foreach ($users as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @error('user')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <input type="submit" class="btn btn-success my-4" value="Guardar Reservacion">
            </form>
        </div>
    </div>
@endsection