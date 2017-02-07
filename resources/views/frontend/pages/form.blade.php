@section('content')
<form method="POST" action="/forms">
<div align="center"> 
<table id=signupform class="uk-table uk-table-hover" style="overflow-y: auto;padding-left: 10px;text-align: left;">
<tbody>
	<tr>
		<th><label>BLD Partners Type</label></th>
		<td><select name="bldtype" required>
	<option value="BLD:L1">BLD:L1</option>
	<option value="BLD:L2">BLD:L2</option>
	<option value="POS">POS</option></td>
	</tr>
	<tr>
		<th><label>Name</label></th>
		<td><input type="text" name="name" required></td>
	</tr>
	<tr>
		<th><label>Contact Number</label></th>
		<td><input type="text" name="number" required></td>
	</tr>
	<tr>
		<th><label>Email</label></th>
		<td><input type="email" name="email1" required></td>
	</tr>
	<tr>
		<th><label>Name of company</label></th>
		<td><input type="text" name="company_name"></td>
	</tr>
	<tr>
		<th><label>Insvestment so far</label></th>
		<td><input type="text" name="investment_history"></td>
	</tr>
	<tr>
		<th><label>Turnover per year</label></th>
		<td><input type="text" name="turnover"></td>
	</tr>
	<tr>
		<th><label>Your intrested Area/Location</label></th>
		<td><input type="text" name="intrested_area" required></td>
	</tr>
	<tr>
		<th><label>Tentative investment for this Project</label></th>
		<td><select name="investment">
			<option value="1 Lakh to 5 Lakh">1 Lakh to 5 Lakh</option>
			<option value="5 Lakh to 10 Lakh">5 Lakh to 10 Lakh</option>
			<option value="10 Lakh to 25 Lakh">10 Lakh to 25 Lakh</option>
			<option value="25 Lakh to 50 Lakh">25 Lakh to 50 Lakh</option>
			<option value="50 Lakh to 75 Lakh">50 Lakh to 75 Lakh</option>
			<option value="75 Lakh to 1 Crore">75 Lakh to 1 Crore</option>
			<option value="1 Crore to 2 Crore">1 Crore to 2 Crore</option>
			<option value="2 Crore to 5 Crore">2 Crore to 5 Crore</option>
			<option value="above 5 Crore">above 5 Crore</option></select></td>
	</tr>
	<tr>
		<th><label>Any ISP/Cable Operator at your Area/Location</label></th>
		<td><input type="text" name="isp_query" required></td>
	</tr>
	<tr>
		<th><label>Their packages and sevices(if you know)</label></th>
		<td><input type="text" name="package_detail"></td>
	</tr>
	<tr>
		<th><label>Comments (if any)</label></th>
		<td><textarea name="comments" rows="3" cols="25" maxlength="300" placeholder="Do not write more than 300 characters"></textarea></td>
	</tr>
</tbody>
</table><br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset" name="reset" value="Cancel">
</div>
</form>
@stop