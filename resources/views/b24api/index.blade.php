<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<title>AI приложение</title>
</head>


<body class="bg-gray-50 p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">AI приложение</h1>
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Тест</h2>
    </div>
    <script src="//api.bitrix24.com/api/v1/"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            BX24.init(function () {
                console.log('bx24.js initialized', BX24.isAdmin());
            });
        });
    </script>
</body>
</html>