@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-end mb-3"><a href="{{ route('admin.events.create') }}" class="btn btn-info">Create</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Target Amount</th>
                <th>Amount Raised</th>
                <th>Category</th>
                <th>Benificiary</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->formatAmount($event->target_amount) }}</td>
                    <td>{{ $event->formatAmount($event->amount_raised) }}</td>
                    <td>{{ $event->category->name }}</td>
                    <td>{{ $event->user->name }}</td>
                    <td>{{ $event->approved ? 'Approved' : 'Approval Pending' }}

                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            {{-- <a href="{{ route('admin.events.show', [$event->id]) }}" class="btn btn-info">Show</a> --}}
                            <a href="{{ route('admin.events.edit', [$event->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.events.destroy', $event->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                            <form action="{{ route('admin.events.approve', $event->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if (!$event->approved)
                                    <button class="btn btn-success">Approve</button>
                                @else
                                    <button class="btn btn-secondary">Disapprove</button>
                                @endif
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
