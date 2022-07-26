<div id="{{ 'Business' . $item->id . 'modal' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
    <div role="document" class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $item->name }}
                    <small>({{ 'ID: ' . $item->st_id }})</small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="d-flex justify-content-center mx-1 mx-sm-3 mb-0 mt-2 pb-0 border-0">
                <div class="tabs mx-3 active" id="{{ 'mt_bus' . $item->id }}">
                    <h6 class="font-weight-bold">Model Test</h6>
                </div>
                <div class="tabs mx-3" id="{{ 'hy_bus' . $item->id }}">
                    <h6 class="text-muted">Half Yearly</h6>
                </div>
                <div class="tabs mx-3" id="{{ 'fnl_bus' . $item->id }}">
                    <h6 class="text-muted">Final</h6>
                </div>
            </div>
            <div class="line"></div>

            <div class="modal-body">
                <fieldset class="show" id="{{ 'mt_bus' . $item->id . '1' }}">

                    <form
                        action="{{ route('admin.students.exam.mt.update', ['class' => $item->c_class, 'id' => $item->id]) }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Bangla I</label>
                                <input type="text" name="bangla1" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->bangla1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">Bangla II</label>
                                <input type="text" name="bangla2" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->bangla2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">English I</label>
                                <input type="text" name="english1" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->english1 }} @endif">
                            </div>
                            <div class="form-group
                                    col">
                                <label for="">English II</label>
                                <input type="text" name="english2" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->english2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">ICT</label>
                                <input type="text" name="ict" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->ict }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">accounting I</label>
                                <input type="text" name="accounting1" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->accounting1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">accounting II</label>
                                <input type="text" name="accounting2" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->accounting2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">management I</label>
                                <input type="text" name="management1" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->management1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">management II</label>
                                <input type="text" name="management2" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->management2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">fbi I</label>
                                <input type="text" name="fbi1" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->fbi1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">fbi II</label>
                                <input type="text" name="fbi2" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->fbi2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">Economics I</label>
                                <input type="text" name="economics1" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->economics1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">Economics II</label>
                                <input type="text" name="economics2" class="form-control"
                                    value="@if ($mt_mark != null) {{ $mt_mark->economics2 }} @endif">
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-block"><i
                                    class="fas fa-check-circle"></i>
                                Update Model Test Marks</button>
                        </div>
                    </form>
                </fieldset>

                <fieldset id="{{ 'hy_bus' . $item->id . '1' }}">

                    <form
                        action="{{ route('admin.students.exam.hy.update', ['class' => $item->c_class, 'id' => $item->id]) }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Bangla I</label>
                                <input type="text" name="bangla1" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->bangla1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">Bangla II</label>
                                <input type="text" name="bangla2" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->bangla2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">English I</label>
                                <input type="text" name="english1" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->english1 }} @endif">
                            </div>
                            <div class="form-group
                                    col">
                                <label for="">English II</label>
                                <input type="text" name="english2" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->english2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">ICT</label>
                                <input type="text" name="ict" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->ict }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">accounting I</label>
                                <input type="text" name="accounting1" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->accounting1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">accounting II</label>
                                <input type="text" name="accounting2" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->accounting2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">management I</label>
                                <input type="text" name="management1" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->management1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">management II</label>
                                <input type="text" name="management2" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->management2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">fbi I</label>
                                <input type="text" name="fbi1" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->fbi1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">fbi II</label>
                                <input type="text" name="fbi2" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->fbi2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">Economics I</label>
                                <input type="text" name="economics1" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->economics1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">Economics II</label>
                                <input type="text" name="economics2" class="form-control"
                                    value="@if ($hy_mark != null) {{ $hy_mark->economics2 }} @endif">
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-block"><i
                                    class="fas fa-check-circle"></i>
                                Update Half Yearly Marks</button>
                        </div>
                    </form>
                </fieldset>

                <fieldset id="{{ 'fnl_bus' . $item->id . '1' }}">

                    <form
                        action="{{ route('admin.students.exam.fnl.update', ['class' => $item->c_class, 'id' => $item->id]) }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Bangla I</label>
                                <input type="text" name="bangla1" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->bangla1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">Bangla II</label>
                                <input type="text" name="bangla2" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->bangla2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">English I</label>
                                <input type="text" name="english1" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->english1 }} @endif">
                            </div>
                            <div class="form-group
                                    col">
                                <label for="">English II</label>
                                <input type="text" name="english2" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->english2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">ICT</label>
                                <input type="text" name="ict" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->ict }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">accounting I</label>
                                <input type="text" name="accounting1" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->accounting1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">accounting II</label>
                                <input type="text" name="accounting2" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->accounting2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">management I</label>
                                <input type="text" name="management1" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->management1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">management II</label>
                                <input type="text" name="management2" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->management2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">fbi I</label>
                                <input type="text" name="fbi1" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->fbi1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">fbi II</label>
                                <input type="text" name="fbi2" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->fbi2 }} @endif">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">Economics I</label>
                                <input type="text" name="economics1" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->economics1 }} @endif">
                            </div>
                            <div class="form-group col">
                                <label for="">Economics II</label>
                                <input type="text" name="economics2" class="form-control"
                                    value="@if ($fnl_mark != null) {{ $fnl_mark->economics2 }} @endif">
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-block"><i
                                    class="fas fa-check-circle"></i>
                                Update Final Exam Marks</button>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>
