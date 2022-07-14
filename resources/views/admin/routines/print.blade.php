@include('admin.layouts.includes.print_head')

<body>


    <div class="card-header justify-content-between d-flex pt-5">

        <div class="text-right" style="width: 150px;">
            <img class="" src="{{ asset('images/logos/college_logo.png') }}" alt="College Logo"
                style="height: 100px;">
        </div>

        <div class="text-center">
            <h1 class="text-center">Al-Emdad Degree College</h1>
            <h5 class="my-4">Golapgonj, Sylhet</h5>
        </div>
        <div class="text-right" style="width: 150px;">
            <button onclick="window.print()" class="btn btn-primary print_btn"><i class="fas fa-print"></i>
                Print</button>
        </div>

    </div>

    <div class="text-center mt-4">
        <h3 class="">Class Routine: {{ $class }}</h3>
        <h4 class="mt-2">
            @if ($dept == 'sc')
                {{ 'Department of Science' }}
            @elseif ($dept == 'hum')
                {{ 'Department of Humanities' }}
            @elseif ($dept == 'bus')
                {{ 'Department of Business Studies' }}
            @endif
        </h4>
    </div>

    <div class="container-fluid mt-4" style="width: 90%;">
        <div class="table-responsive mt-5">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Day \ Time</th>
                        <th>10:30</th>
                        <th>11:15</th>
                        <th>12:00</th>
                        <th>12:45</th>
                        <th>01:30</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center font-weight-bold">
                                {{ $item->day }}
                            </td>
                            <td>
                                @if ($dept == 'sc')
                                    {{ $item->sc10_30 }}
                                @elseif ($dept == 'hum')
                                    {{ $item->hum10_30 }}
                                @elseif ($dept == 'bus')
                                    {{ $item->bus10_30 }}
                                @endif
                            </td>
                            <td>
                                @if ($dept == 'sc')
                                    {{ $item->sc11_15 }}
                                @elseif ($dept == 'hum')
                                    {{ $item->hum11_15 }}
                                @elseif ($dept == 'bus')
                                    {{ $item->bus11_15 }}
                                @endif
                            </td>
                            <td>
                                @if ($dept == 'sc')
                                    {{ $item->sc12_00 }}
                                @elseif ($dept == 'hum')
                                    {{ $item->hum12_00 }}
                                @elseif ($dept == 'bus')
                                    {{ $item->bus12_00 }}
                                @endif
                            </td>
                            <td>
                                @if ($dept == 'sc')
                                    {{ $item->sc12_45 }}
                                @elseif ($dept == 'hum')
                                    {{ $item->hum12_45 }}
                                @elseif ($dept == 'bus')
                                    {{ $item->bus12_45 }}
                                @endif
                            </td>
                            <td>
                                @if ($dept == 'sc')
                                    {{ $item->sc1_30 }}
                                @elseif ($dept == 'hum')
                                    {{ $item->hum1_30 }}
                                @elseif ($dept == 'bus')
                                    {{ $item->bus1_30 }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @include('admin.layouts.includes.scripts')
</body>
