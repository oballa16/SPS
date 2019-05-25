@extends('inc.layout')

@section('title')
    SPS >> Patrols
@stop

@section('content')
    <div id="mapid" style="margin-top: 30px"></div>
    <script>
        var mymap = L.map('mapid').setView([41.324192, 19.813119], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

        var marker = L.marker([41.318465, 19.807256]).addTo(mymap);
        var marker1 = L.marker([41.320505, 19.818053]).addTo(mymap);
        var marker2 = L.marker([41.316696, 19.819384]).addTo(mymap);
        marker.bindPopup("<b>Patrol Number 1</b><br>Leading Officer: Silvio Talelli.").openPopup();
        marker2.bindPopup("<b>Patrol Number 2</b><br>Leading Officer: Renato Muho.").openPopup();
        marker1.bindPopup("<b>Patrol Number 3</b><br>Leading Officer: Kejdi Vrapi.").openPopup();
    </script>
@stop
