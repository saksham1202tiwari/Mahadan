@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-start mb-3">
        <h3>Donations</h3>
    </div>
    <div class="d-flex align-items-center justify-content-between">
        <form action="{{ route('admin.donations.index') }}" class="mt-2 mb-3">
            <div class="form-group">
                <label for="event">Event</label>

                <select name="event_id" id="event_id" class="form-control">
                    <option value="">All</option>
                    @foreach (App\Models\Event::all() as $event)
                        <option value="{{ $event->id }}"{{ request()->event_id == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-success">Filter</button>
            </div>
        </form>

        <form action="{{ route('admin.donations.export') }}" class="mt-2 mb-3" method="POST">
            @csrf
            <input type="hidden" name="event_id" value="{{ request()->event_id ?? '' }}">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Export PDF</button>
            </div>
        </form>
    </div>


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
