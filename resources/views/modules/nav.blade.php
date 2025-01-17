<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Panel de Control</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}"><i class="bi bi-house-door-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/accomodations')}}"><i class="bi bi-file-earmark-medical-fill"></i> Alojamientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/bookings')}}"><i class="bi bi-journal-medical"></i> Reservaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/form_booking')}}"><i class="bi bi-journal-medical"></i> Registrar Reserva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('/calendario')}}"><i class="bi bi-calendar-week-fill"></i> Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" target="__blank" href="{{url('/reporte')}}"><i class="bi bi-filetype-pdf"></i> Reporte</a>
                </li>
            </ul>
        </div>
    </div>
</nav>