<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahadan</title>
    @vite('resources/sass/app.scss')
    @stack('after_styles')
</head>

<body>
    <div class="py-2 px-2">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Contact Query Request
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                                <tr>
                                    <th>{{ $data['name'] }}</th>
                                    <th>{{ $data['phone'] }}</th>
                                    <th>{{ $data['subject'] }}</th>
                                    <th>{{ $data['message'] }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @vite('resources/js/app.js')
    @stack('after_scripts')
</body>

</html>
