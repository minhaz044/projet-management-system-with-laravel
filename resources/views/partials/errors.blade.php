
  @if(session()->has('errors'))

  <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Errors:</strong> {{ session()->get('errors') }}
  </div>

  @endif