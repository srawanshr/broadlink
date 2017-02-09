<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Broadlink</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
	<table class="uk-table uk-table-hover" style="overflow-y: auto;text-align: left;padding-left: 10px;margin-top: 200px;">
						<tbody>
							<tr>
								<th class="uk-table-shrink"><label>Name:</label></th>
								<td>{{ $custname }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Contact Number:</label></th>
								<td>{{ $contact_number }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Address:</label></th>
								<td>{{ $custadd }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Your messaage:</label></th>
								<td>{{ $complaint_message }}</textarea></td>
							</tr>
						</tbody>
					</table>
</body>
</html>