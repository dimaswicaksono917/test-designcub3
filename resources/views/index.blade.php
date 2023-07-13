@extends('layout.master')
@section('section')
    {{-- soal 1 --}}
    <section id="soal1" class="small-section">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="soal-1">
                        <h1>Soal no 1</h1>
                        <img src="{{ asset('assets/image/map.png') }}" alt="">
                        <p>Buatlah 4 level dropdown mulai dari provinsi, kota/kabupaten, kecamatan, dan
                            kelurahan menggunakan html, css dan javascript sederhana. Setiap dropdown harus
                            melakukan pengambilan data yang ada pada database dengan menggunakan Laravel.</p>
                    </div>
                </div>
                <div class="col-6">
                    <form id="locationForm" action="{{ route('submitLocation') }}" method="POST">
                        @csrf
                        <div class="dropdown">
                            <label for="province">Province:</label>
                            <select class="form-select" id="province" name="province">
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="dropdown">
                            <label for="regency">Regency:</label>
                            <select class="form-select" id="regency" name="regency">
                                <option value="">Select Regency</option>
                            </select>
                        </div>

                        <div class="dropdown">
                            <label for="district">District:</label>
                            <select class="form-select" id="district" name="district">
                                <option value="">Select District</option>
                            </select>
                        </div>

                        <div class="dropdown">
                            <label for="village">Village:</label>
                            <select class="form-select" id="village" name="village">
                                <option value="">Select Village</option>
                            </select>
                        </div>

                        <button class="btn-orange mt-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- end soal 1 --}}
    {{-- soal 2 --}}
    <section id="soal2" class="small-section">
        <div>
            <div class="soal-2 container text-center mb-5">
                <h1>Soal 2</h1>
                <p>buat rute lain untuk membuat form sederhana yang
                    berisi email subscription.</p>
            </div>
            <div class="parallax-form " style="background-image: url('assets/image/map.png');">
                <form method="POST" action="{{ route('subscriptions.store') }}">
                    @csrf
                    <h1 class="mb-3">Email Subscription</h1>
                    <input type="email" name="email" placeholder="Email Address">
                    <button type="submit">Subscribe</button>

                    @if ($errors->any())
                    <div class="error mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="success mt-3">
                        {{ session('success') }}
                    </div>
                @endif


                </form>
            </div>

        </div>
    </section>
    {{-- end soal 2 --}}
@endsection
