<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahadan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Event</th>
                <th>Donation Amount Amount</th>
                <th>Target Amount</th>
                <th>Total Amount Raised</th>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
