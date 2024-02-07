@extends('Template.index')

@section('content-body')
<div class="row mb-4 mt-4">
    <div class="col-6">
        <h4>Hasil A</h4>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th class="text-center">Area</th>
                    <th class="text-center">Vendor</th>
                    <th class="text-center">Jumlah Task</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasilA as $v)
                <tr>
                    <td>{{$v->area}}</td>
                    <td class="text-center">{{$v->vendor}}</td>
                    <td class="text-center">{{$v->jumlah_task}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-6">
        <h4>Hasil C</h4>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th class="text-center">Area</th>
                    <th class="text-center">All Task</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasilC as $v)
                <tr>
                    <td>{{$v->area}}</td>
                    <td class="text-center">{{$v->all_task}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row mb-4 mt-4">
    <div class="col-12">
        <h4>Hasil B</h4>
        @php
            $dataDecode = json_decode($hasilB, true)[0];
            $keys = array_keys($dataDecode);
            $categories = [];
            $values = [];
        @endphp
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th class="text-center" rowspan="2">Area</th>
                    <th class="text-center" colspan="{{count($dataDecode)- 1}}">Vendor</th>
                </tr>
                <tr>
                @for ($i = 1; $i < count($keys); $i++)
                @php
                    $categories[] = $keys[$i];
                @endphp
                    <th class="text-center">{{$keys[$i]}}</th>
                @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($hasilB as $item)
                @php
                    $values[$item['Area']] = [];
                @endphp
                    <tr>
                        <td>{{$item['Area']}}</td>
                        @for ($i = 1; $i < count($keys); $i++)
                        @php
                            $values[$item['Area']][] = $item[$keys[$i]]
                        @endphp
                        <td class="text-center">{{$item[$keys[$i]]}}</td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row mb-4 mt-4">
    <div class="col-6">
        <div id="bar-chart" style="width: 100%;"></div>
    </div>
    <div class="col-6">
        <div id="pie-chart" style="width:100%; height:400px;"></div>
    </div>
</div>
@endsection

@section('content-js')
<script>
    var data = {!! json_encode($pieChart) !!};

    var seriesData = [];
    data.forEach(function(item) {
        seriesData.push({name: item.area, y: item.all_task});
    });

    Highcharts.chart('pie-chart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Pie Chart from Hasil C'
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y} ({point.percentage:.1f}%)</b>'
        },
        series: [{
            name: 'Tasks',
            colorByPoint: true,
            data: seriesData
        }]
    });

    var categories = {!! json_encode($categories) !!};
    var series = {!! json_encode($values) !!};

    Highcharts.chart('bar-chart', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Bar Chart from Hasil B',
            align: 'left'
        },
        xAxis: {
            categories: categories,
            gridLineWidth: 1,
            lineWidth: 0
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            },
            gridLineWidth: 0
        },
        credits: {
            enabled: false
        },
        series: Object.keys(series).map(function(key) {
            return {
                name: key,
                data: series[key]
            };
        })
    });
</script>

@endsection
