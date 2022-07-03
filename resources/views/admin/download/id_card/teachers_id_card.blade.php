@include('admin.layouts.includes.print_head')

<div class="print_container py-5">
    <div class="d-flex justify-content-center py-4">
        <div class="id-shape teachers_id_card shadow htmlContent">
            <div class="photo d-flex justify-content-center">
                @if ($data->photo)
                    <img src="{{ asset('images/teachers') . '/' . $data->photo }}" alt="">
                @else
                    <img src="{{ asset('images/asset_img/user-icon.png') }}" alt="">
                @endif
            </div>

            <div class="info p-3 d-flex justify-content-center">
                <table class="table table-sm table-borderless table-striped mt-2">
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td>{{ $data->name }}</td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td>:</td>
                        <td>{{ $data->position }}</td>
                    </tr>
                    <tr>
                        <th>Faculty</th>
                        <td>:</td>
                        <td>{{ $data->department }}</td>
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
