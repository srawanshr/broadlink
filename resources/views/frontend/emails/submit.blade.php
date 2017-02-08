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
						<table id=signupform class="uk-table uk-table-hover" style="overflow-y: auto;padding-left: 10px;text-align: left;margin-top: 200px;">
						<tbody>
							<tr>
								<th class="uk-table-shrink"><label>BLD Partners Type</label></th>
								<td>{{ $btype }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Name</label></th>
								<td>{{ $cname }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Contact Number</label></th>
								<td>{{ $cnum }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Name of company</label></th>
								<td>{{ $compname }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Insvestment so far</label></th>
								<td>{{ $cih }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Turnover per year</label></th>
								<td>{{ $ct }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Your intrested Area/Location</label></th>
								<td>{{ $cia }}</td>
							</tr>
							<tr>
								<th class="uk-table-shrink"><label>Tentative investment for this Project</label></th>
								<td>{{ $ci }}</td>
								</tr>
								<tr>
									<th class="uk-table-shrink"><label>Any ISP/Cable Operator at your Area/Location</label></th>
									<td>{{ $cisp }}</td>
								</tr>
								<tr>
									<th class="uk-table-shrink"><label>Their packages and sevices(if you know)</label></th>
									<td>{{ $cpd }}</td>
								</tr>
								<tr>
									<th class="uk-table-shrink"><label>Comments (if any)</label></th>
									<td>{{ $ccomments }}</td>
								</tr>
							</tbody>
						</table>
</body>
</html>