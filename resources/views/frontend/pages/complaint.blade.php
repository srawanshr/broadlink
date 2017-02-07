@extends('frontend.layouts.master')

@section('title', 'Broadlink :: '.$page->title)

@section('body')
@include('frontend.partials.banner', ['title' => $page->title, 'images' => $page->banners ])

<section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
	<div class="uk-container uk-container-center bl-margin-top-ve uk-block-default bl-padding-2-tb bl-card">
		<div class="uk-block-default uk-margin-large-bottom">
			<form method="POST" action="/complaint">
				<div align="center">
					<table class="uk-table uk-table-hover" style="overflow-y: auto;text-align: left;padding-left: 10px;">
						<tbody>
							<tr>
								<th><label>Name:</label></th>
								<td><input type="text" name="name"></td>
							</tr>
							<tr>
								<th><label>Contact Number:</label></th>
								<td><input type="text" name="contact"></td>
							</tr>
							<tr>
								<th><label>Address:</label></th>
								<td><input type="text" name="address"></td>
							</tr>
							<tr>
								<th><label>Your messaage:</label></th>
								<td><textarea name="name" rows="3" cols="25" maxlength="500" placeholder="Do not type more than 500 characters" required></textarea></td>
							</tr>
						</tbody>
					</table><br><br>
					<input type="submit" name="submit" value="Submit">
					<input type="reset" name="reset" value="Cancel">
				</div>
			</form>
		</div>
	</div>
</section>
@stop