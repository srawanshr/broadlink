@extends('emails.layout')

@section('title', 'Service Inquiry')

@section('intro')
Broadlink has received a new service inquiry with the following details:<br>
<br>
Full Name: {{ $data['name'] }}<br>
Email: {{ $data['email'] }}<br>
Subject: {{ $data['subject'] }}<br>
Message: {{ $data['msg'] }}<br>
<br>
Location Details<br>
Longitude: {{ $data['longitude'] }}<br>
Latitude: {{ $data['latitude'] }}<br>
<br>
@stop

@section('outro')
    Please take necessary actions.<br>
@stop
