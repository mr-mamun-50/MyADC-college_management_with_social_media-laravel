@include('admin.layouts.includes.print_head')

<div class="print_container py-4">
    <div class="d-flex justify-content-center py-4">
        <div class="testimonial shadow htmlContent">
            <div class="title text-center"><span>TESTIMONIAL</span></div>
            <p class="tml_desc mt-5">
                This is certified that <b>{{ $data->name }}</b>
                Son / Daughter of <b>{{ $data->fathers_name }}</b> and <b>{{ $data->mothers_name }}</b>
                was a student of this college during the academic session <b>{{ $data->session }}</b>.
                He passed the HSC examination of the Board of Intermediate and Secondary Education, Sylhet in bearing
                Roll Golap-1, No. <b>{{ $data->roll }}</b> and Registration no. <b>{{ $data->reg }}</b>
                of the session <b>{{ $data->session }}</b>
                in <b>{{ $data->group }}</b> group and secured GPA <b>{{ $data->gpa }}</b> in scale of GPA 5.00.
            </p>
            <p class="tml_desc">
                To the best of my knowledge, he bears a good moral character. So far as I know, he did not take part in
                any activities subversive of the state or the college discipline. I wish him every success in life.
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
