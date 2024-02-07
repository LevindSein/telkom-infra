@extends('Template.index')

@section('content-body')
<div class="row mb-4 mt-4">
    <div class="col-6 text-center">
        <h3>Flowchart Studi Kasus Rumah Sakit</h3>
        <img src="{{asset('images/flowchart_no_3.png')}}" />
    </div>
    <div class="col-6 text-center">
        <h3>ER Diagram</h3>
        <img src="{{asset('images/ER_diagram.png')}}" />
    </div>
</div>
@endsection

@section('content-js')
@endsection
