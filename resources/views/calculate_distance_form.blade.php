<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Distance</title>
</head>
<body>
    <h1>Calculate Distance</h1>
    <form action="/calculate-distance" method="post">
        @csrf
        <label for="lat1">Latitude 1:</label>
        <input type="text" name="lat1" id="lat1" required>
        <br>
        <label for="lon1">Longitude 1:</label>
        <input type="text" name="lon1" id="lon1" required>
        <br>
        <label for="lat2">Latitude 2:</label>
        <input type="text" name="lat2" id="lat2" required>
        <br>
        <label for="lon2">Longitude 2:</label>
        <input type="text" name="lon2" id="lon2" required>
        <br>
        <button type="submit">Calculate Distance</button>
    </form>
</body>
</html>
