@include('admin.layouts.includes.print_head')

<div class="print_container py-5">
    <div class="d-flex justify-content-center py-4">
        <div class="id-shape shadow htmlContent">
            <div class="photo d-flex justify-content-center">
                @if ($data->photo)
                    <img src="{{ asset('images/students') . '/' . $data->photo }}" alt="">
                @else
                    <img src="{{ asset('images/asset_img/user-icon.png') }}" alt="">
                @endif
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
