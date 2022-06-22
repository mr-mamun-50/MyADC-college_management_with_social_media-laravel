@include('admin.layouts.includes.print_head')

{{-- {{ dd($data) }} --}}

<div class="print_container py-5" onload="autoClick()">
    <div class="d-flex justify-content-center py-4">
        <div class="id-shape shadow " id="htmlContent">
            <div class="photo d-flex justify-content-center">
                <img src="{{ asset('public/images/students') . '/' . $data->photo }}" alt="">
            </div>

            <div class="info p-3 d-flex justify-content-center">
                <table class="table table-sm table-borderless table-striped">
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td>{{ $data->name }}</td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td>:</td>
                        <td>{{ $data->st_id }}</td>
                    </tr>
                    <tr>
                        <th>Group</th>
                        <td>:</td>
                        <td>{{ $data->department }}</td>
                    </tr>
                    <tr>
                        <th>Session</th>
                        <td>:</td>
                        <td>{{ $data->session }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>:</td>
                        <td>{{ $data->phone }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div id="result"></div>
    <div class="text-center">
        <button onclick="shot()" class="btn btn-success"><i class="bi bi-download"></i> Download</button>
    </div>
</div>
