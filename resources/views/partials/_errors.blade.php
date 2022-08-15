@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
    @foreach ($errors->all() as $error)
      <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
      <span class="alert-inner--text"><strong>Danger!</strong> {{ $error }}</span>
      <br>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
@endif
