<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test PT. Desain Tiga Selaras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-orange">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="#">
                Designcub3
              </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="justify-content-end collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{route('landing')}}#soal1">Soal 1</a>
                    <a class="nav-link" href="{{route('landing')}}#soal2">Soal 2</a>
                    <a class="nav-link" href="{{route('subscriptions.index')}}">Subscription</a>
                </div>
            </div>
        </div>
    </nav>
    {{-- end navbar --}}

    @yield('section')
    {{-- footer --}}
    <footer class="footer bg-orange p-4 text-center fw-semibold text-white">
        <span>copyright dimas wicaksono</span>
    </footer>
    {{-- end footer --}}

    {{-- end footer --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('getRegencies') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#province').empty();
                    $('#province').append('<option value="">Select Province</option>');
                    $.each(data, function(key, value) {
                        $('#province').append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                }
            });

            $('#province').change(function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: "{{ route('getRegencies') }}",
                        type: "GET",
                        data: {
                            province_id: provinceId
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#regency').empty();
                            $('#regency').append('<option value="">Select Regency</option>');
                            $.each(data, function(key, value) {
                                $('#regency').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#regency').empty();
                    $('#regency').append('<option value="">Select Regency</option>');
                    $('#district').empty();
                    $('#district').append('<option value="">Select District</option>');
                    $('#village').empty();
                    $('#village').append('<option value="">Select Village</option>');
                }
            });

            $('#regency').change(function() {
                var regencyId = $(this).val();
                if (regencyId) {
                    $.ajax({
                        url: "{{ route('getDistricts') }}",
                        type: "GET",
                        data: {
                            regency_id: regencyId
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#district').empty();
                            $('#district').append('<option value="">Select District</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district').empty();
                    $('#district').append('<option value="">Select District</option>');
                    $('#village').empty();
                    $('#village').append('<option value="">Select Village</option>');
                }
            });

            $('#district').change(function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: "{{ route('getVillages') }}",
                        type: "GET",
                        data: {
                            district_id: districtId
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#village').empty();
                            $('#village').append('<option value="">Select Village</option>');
                            $.each(data, function(key, value) {
                                $('#village').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#village').empty();
                    $('#village').append('<option value="">Select Village</option>');
                }
            });
            $('#locationForm').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    dataType: "json",
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Selected Village',
                            text: data.name
                        });
                    },
                    error: function(xhr, status, error) {
                        var response = xhr.responseJSON;
                        if (response && response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.error
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred. Please try again later.'
                            });
                        }
                    }
                });
            });


        });
    </script>
        <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(function() {
                $('#myTable').DataTable({
                    "order": []
                });
            });
        </script>
</body>

</html>
