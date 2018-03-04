<!DOCTYPE html>
<html>
<head>
	<title>Send Email</title>
</head>
<body>
  <h2>Customer info:</h2>
  <h4>Name: {{ $data['Name'] }}</h4>
  <h4>Email: {{ $data['Email'] }}</h4>
  <h4>Telephone: {{ $data['Telephone'] }}</h4>
  <h4>Subject: {{ $data['Subject'] }}</h4>
	<p>
    {{ $data['Message'] }}
  </p>
</body>
</html>
