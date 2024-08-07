<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <h1>Simple Calculator App</h1>

    <form action="/calcresult" method="POST">
        @csrf
        <input type="number" name="first_number" placeholder="First Number" required>
        <select name="operation" id="operation" required>
            <option value="add">Add</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
        </select>
        <input type="number" name="second_number" placeholder="Second Number" required>
        <button type="submit">Submit</button>
    </form>

    @if (isset($results))
        <h2>Result: {{ $results }}</h2>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>