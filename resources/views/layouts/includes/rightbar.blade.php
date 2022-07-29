<div class="mb-4">
    <img class="img-fluid" src="{{ asset('images/asset_img/' . $rightbarImage) }}" alt="">
</div>

<div class="card">
    <div class="card-header fw-bold">
        People You May Know
    </div>
    <div class="card-body px-2">
        <table class="myPeoplesTable table table-hover table-sm" style="width:100%">
            <thead>
                <tr>
                    <td></td>
                </tr>
            </thead>
            <tbody>

                @foreach ($peoples as $people)
                    <tr>
                        <td class="d-flex justify-content-between align-items-center px-2">
                            <a href="{{ route('user.profile', $people->id) }}">
                                <div class="d-flex align-items-center">
                                    <img src="@if ($people->user_image) {{ asset('images/users') . '/' . $people->user_image }} @else {{ asset('images/asset_img/user-icon.png') }} @endif"
                                        alt="" class="rounded-circle" style="width: 40px; height:40px">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 text-dark">{{ $people->name }}</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/messenger' . '/' . $people->id) }}">
                                <span
                                    class="bg-light rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                    style="height: 35px; width:35px">
                                    <i class="bi bi-chat-right-text pt-1 fa-lg text-primary"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
