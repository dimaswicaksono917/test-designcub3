@extends('layout.master')

@section('section')
    <section class="page-wrap small-section">
        <div class="page-content">
                <div class="container">

                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible"> <i class="fas fa-check"></i>
                            {{ Session::get('message') }}

                        </div>
                    @endif

                    @if (Session::has('message_error'))
                        <div class="alert alert-warning alert-dismissible"> <i class="fas fa-ban"></i>
                            {{ Session::get('message_error') }}
                        </div>
                    @endif

                    <h1 class="mb-5">Subscription List</h1>
                    <table id="myTable" class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>IP</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription->id }}</td>
                                    <td>{{ $subscription->email }}</td>
                                    <td>{{ $subscription->ip }}</td>
                                    <td>{{ $subscription->created_at }}</td>
                                    <td>
                                        <form action="{{ route('subscriptions.destroy', $subscription->id) }}"
                                            method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Yakin untuk menghapus data ?')">
                                                <i class="fa fa-btn fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
@endsection
