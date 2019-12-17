@extends('layouts.app')
@section('content')
    <h2>All classrooms</h2>
    <body>

        @if(sizeof($classrooms) > 0)
            <table class="table table-striped table-bordered">
                <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Owner</th>
                <th>Edit general information</th>
                <th>Add/delete members</th>
                <th>Add/delete challenges</th>
                </thead>
                <tbody>
                @foreach($classrooms as $classroom)
                    @if($classroom->active == "1")
                    <tr>
                        <td>{{ $classroom->id }}</td>
                        <td>{{ $classroom->classroom_name }}</td>
                        <td>{{ \App\User::find($classroom->classroom_owner)->username }}</td>
                        <td>
                            <a href="{{ route('classroom.edit', $classroom->id) }}" class="btn bg-light btn-outline-dark">Edit</a>
                             </td>
                        <td>
                            <a href="{{ route('classroom.editmembers', $classroom->id) }}" class="btn bg-light btn-outline-dark">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('classroom.editchallenges', $classroom->id) }}" class="btn bg-light btn-outline-dark">Edit</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <h3>No classrooms yet!</h3>
        @endif
        <br>
        @if(Auth::user()->isTeacher(Auth::user()->userrole)==true || Auth::user()->isAdmin(Auth::user()->userrole)==true)
            <a href="{{route('classroom.create')}}" class="btn btn-success">Add new classroom</a>
        @endif

    </body>

@endsection
