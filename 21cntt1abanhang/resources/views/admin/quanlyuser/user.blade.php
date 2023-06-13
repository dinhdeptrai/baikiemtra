@extends('admin.category.layouts.master')

@section('content1')
    <body>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Level</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @isset($users)
                    @php
                        $i=1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $i }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->level }}</td>
                            <td>
                                <a href="{{ route('admin.getUserEdit', $user->id) }}" class="btn btn-outline-secondary" role="button">
                                    <i class="fas fa-cog fa-spin fa-lg"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.getUserDelete', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i += 1;
                        @endphp
                    @endforeach
                @endisset
            </tbody>
        </table>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </body>
@endsection
