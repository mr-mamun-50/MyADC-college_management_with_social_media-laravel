<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th>Day \ Time</th>
                <th>10:30</th>
                <th>11:15</th>
                <th>12:00</th>
                <th>12:45</th>
                <th>01:30</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table_body">

            @foreach ($data as $item)
                <tr>
                    <th class="text-center">{{ $item->day }}</th>
                    <td>{{ $item->hum10_30 }}</td>
                    <td>{{ $item->hum11_15 }}</td>
                    <td>{{ $item->hum12_00 }}</td>
                    <td>{{ $item->hum12_45 }}</td>
                    <td>{{ $item->hum1_30 }}</td>
                    <td class="d-flex justify-content-center">

                        <!-- Button trigger modal -->
                        <button class="btn btn-info px-1 py-0" type="button" data-toggle="modal"
                            data-target="{{ '#staticBackdropHUM' . $item->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </td>
                </tr>

                <!-- Modal for edit routine -->
                <div class="modal fade" id="{{ 'staticBackdropHUM' . $item->id }}" data-backdrop="static"
                    data-keyboard="false" tabindex="-1"
                    aria-labelledby="{{ 'staticBackdropHUM' . $item->id . 'Label' }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="{{ 'staticBackdropHUM' . $item->id . 'Label' }}">
                                    {{ $item->day }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('routines_xi.update', $item->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="dept" value="humanities">

                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="day">Day</label>
                                        <input type="text" name="day" class="form-control"
                                            value="{{ $item->day }}" disabled>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="hum10_30">10:30</label>
                                            <input type="text" name="hum10_30" class="form-control"
                                                value="{{ $item->hum10_30 }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="hum11_15">11:15</label>
                                            <input type="text" name="hum11_15" class="form-control"
                                                value="{{ $item->hum11_15 }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="hum12_00">12:00</label>
                                            <input type="text" name="hum12_00" class="form-control"
                                                value="{{ $item->hum12_00 }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="hum12_45">12:45</label>
                                            <input type="text" name="hum12_45" class="form-control"
                                                value="{{ $item->hum12_45 }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="hum1_30">1:30</label>
                                            <input type="text" name="hum1_30" class="form-control"
                                                value="{{ $item->hum1_30 }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <a href="{{ route('routines_xi.show', 'hum') }}" class="btn btn-success" target="blank"><i
                class="bi bi-printer"></i> Print</a>
    </div>
</div>
