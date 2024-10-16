<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container w-60">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Image</th>
                    <th scope="col">Address</th>
                    <th scope="col">Active</th>
                    <th scope="col">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary">Create</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            <img src="{{ Storage::url($customer->image) }}" width="60" alt="">
                        </td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->is_active ? 'Active' : 'Deactive' }}</td>
                        <td></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $customers->links() }}
    </div>
</body>

</html>
