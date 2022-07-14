@include('admin.layouts.includes.print_head')

<body>


    <div class="card-header">
        <div class="justify-content-between d-flex pt-5">
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
    </div>

    <div class="text-center mt-4">
        <h3 class="">Notice</h3>
    </div>

    <div class="container-fluid mt-5" style="width: 90%;">

        <p class="blockquote"><b>Subject: {{ $notice->subject }}</b></p>

        <p class="blockquote text-justify my-4" style="font-size: 20px"><?php echo $notice->description; ?></p>

        <div class="blockquote text-right mt-5">
            <p class="mb-0"><b>{{ $notice->author }}</b></p>
            <p class="">{{ $notice->author_designation }}</p>
        </div>

    </div>


    @include('admin.layouts.includes.scripts')
</body>
