{{-- Left side list --}}
<div class="list-group list-group-light mb-4">
    <a href="{{ route('notice.view') }}" class="list-group-item list-group-item-action px-3 border-0">
        <i class="bi bi-megaphone-fill fa-lg text-primary me-3"></i> Official notices</a>

    <a href="{{ route('routines') }}" class="list-group-item list-group-item-action px-3 border-0">
        <i class="fas fa-clock fa-lg text-info me-3"></i> Class routines</a>

    <a href="{{ route('videos') }}" class="list-group-item list-group-item-action px-3 border-0">
        <i class="fas fa-video fa-lg text-danger me-3"></i> Videos</a>

    <a href="#" class="list-group-item list-group-item-action px-3 border-0">
        <i class="fas fa-chalkboard-teacher fa-lg text-success me-3"></i>Teachers information</a>

    <a href="#" class="list-group-item list-group-item-action px-3 border-0">
        <i class="fas fa-user-friends fa-lg text-warning me-3"></i> Student information</a>
</div>

<div class="card text-start">
    <div class="card-body">
        <h4 class="card-title text-center">Admission</h4>
        <hr>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, beatae.</p>

        <a href="{{ route('admission.procedure') }}" class="btn btn-primary bg-gradient btn-block">Admission
            Procedure</a>
    </div>
</div>
