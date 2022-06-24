@include('admin.layouts.includes.print_head')

<div class="print_container py-4">
    <div class="d-flex justify-content-center py-4">
        <div class="testimonial shadow htmlContent">
            <div class="title text-center"><span>TRANSFER CERTIFICATE</span></div>
            <p class="tml_desc mt-5">
                This is to certify that <b>{{ $data->name }}</b>
                son/daughter of <b>{{ $data->fathers_name }}</b> and <b>{{ $data->mothers_name }}</b>
                was a <b>{{ $data->class . ' ' . $data->group }}</b>
                student of this college bearing class roll no. <b>{{ $data->roll }}</b>
                in the session of <b>{{ $data->session }}</b> completed his <b>{{ $data->class }}</b> course.
            </p>
            <p class="tml_desc">
                He cleared up all his college dues up to the month of <b>{{ $data->due }}</b>. So far as my knowledge
                goes he/she did not participate in any activities subversive of the state or of college discipline.
                I wish him/her every success in life.
            </p>
            <p class="tml_desc">
                I wish him/her every success in life.
            </p>
            <div class="tml_bottom d-flex justify-content-between">
                <p class="tml_desc">Date: {{ date('d F, Y', strtotime($data->date)) }}</p>
                <p class="tml_desc">Principle</p>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button onclick="shot()" class="btn btn-success btn-lg mt-3"><i class="bi bi-download"></i> Download</button>
    </div>
</div>
