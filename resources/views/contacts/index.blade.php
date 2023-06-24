{{-- @dd($contacts) --}}
@extends('layouts.main')

@section('title', 'Contact App | All Contacts')

@section('contacts')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Contacts</h2>
                                <div class="ml-auto">
                                    <a href="{{ route('user.create') }}" class="btn btn-success"><i
                                            class="fa fa-plus-circle"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            @include('contacts._filter', ['companies' => $companies])


                            {{-- @if (count($contacts)) --}}

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @foreach ($contacts as $id => $contact) --}}

                                    @forelse ($contacts as $index => $contact)
                                        @includeIf('contacts._contact', [
                                            'contact' => $contact,
                                            'index' => $index,
                                        ])
                                    @empty
                                        @includeIf('contacts._empty')
                                    @endforelse

                                    {{-- @endforeach --}}

                                </tbody>
                            </table>

                            {{-- @else
                                <p>no data found</p>

                            @endif --}}

                            {{-- <nav class="mt-4">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav> --}}
                            {{-- {{ $contacts->appends(['orderBy' => 'name'])->links() }}  //for static value pass --}}
                            {{-- {{ $contacts->appends(request()->only('orderBy', 'q'))->links() }} //for dynamic value pass --}}
                            @if ($contacts->total() > $contacts->perPage())
                                <ul class="pagination">
                                    {{ $contacts->withQueryString()->links() }} {{-- for any number of dynamic query --}}
                                </ul>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
