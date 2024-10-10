@extends('home')

@section('content')
    <h1 class="title">Gestion de Reservaciones</h1>
    <section>
        <form action="{{route('bookingsAccomodation')}}" method="GET">
            <label for="" class="fw-bold">Selecciona un alojamiento</label>
            <select name="accomodations" class="form-control">
                @foreach ($accomodations as $item)
                    <option value="{{$item->id}}" {{ isset($selected_accomodation) && $selected_accomodation == $item->id ? 'selected' : '' }}>
                        {{$item->name}}
                    </option>
                @endforeach
            </select>
            <input type="submit" class="btn btn-primary mt-2 mb-4" value="Buscar Reservaciones">
        </form>
        <div>
            {{-- @php
                print_r($bookings)
            @endphp --}}
            <table class="table">
                <thead>
                    <th>Reservacion</th>
                    <th>Monto Total</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Alojamiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @if (count($bookings) > 0)
                        @foreach ($bookings as $item)
                        @php 
                            $style = ($item->status == 'CONFIRMED') ? 'text-success fw-bold' : 'text-danger fw-bold'; // Si no encuentra un estado, usa una cadena vacía
                            $disabled = ($item->status != 'CONFIRMED') ? 'disabled' : ''; 
                        @endphp
                            <tr>
                                <td>{{$item->booking}}</td>
                                <td>{{$item->total_amount}}</td>
                                <td>{{$item->check_in_date}}</td>
                                <td>{{$item->check_out_date}}</td>
                                <td>{{$item->accomodation_id}}</td>
                                <td class="{{$style}}">{{$item->status}}</td>
                                <td>
                                    <form action="{{route('statusBooking', $item->id )}}" id="form-cancelar-{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button {{$disabled}} type="button" class="btn btn-danger" onclick="cancelBooking({{ $item->id}})">Cancelar Reserva</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center text-danger">No hay reservaciones</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
<script>
    function cancelBooking(reservaId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
                });
                document.getElementById('form-cancelar-' + reservaId).submit();
            }
            });
    }
</script>