@extends('layouts.other')

@section('content')

    <div class="d-flex justify-content-start mb-3">
        <h3>Donations</h3>
    </div>
    @if (auth()->user()->user_type == 2)
        <form action="{{ route('user.donations.index') }}" class="mt-2 mb-3">
            <div class="form-group">
                <label for="event">Event</label>

                <select name="event_id" id="event_id" class="form-control">
                    <option value="">All</option>

                    @foreach (App\Models\Event::all() as $event)
                        <option value="{{ $event->id }}" {{ request()->event_id == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-success">Filter</button>
            </div>
        </form>
    @endif


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Event</th>
                <th>Amount</th>
                <th>Target Amount</th>
                <th>Amount Raised</th>
                <th>Donor</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donations as $donation)
                <tr>
                    <td>{{ $donation->id }}</td>
                    <td>{{ $donation->event->title }}</td>
                    <td>Rs. {{ $donation->amount }}</td>
                    <td>{{ $donation->event->formatAmount($donation->event->target_amount) }}</td>
                    <td>{{ $donation->event->formatAmount($donation->event->amount_raised) }}</td>
                    <td>{{ $donation->donor ? $donation->donor->name : 'Unknwon' }}</td>
                    <td>{{ $donation->updated_at->format('Y M d') }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

@stop
