@extends(backpack_view('blank'))
<script src={{ asset('js/jquery.js') }}></script>  
<script src="//cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('mselect/choices.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('mselect/choices.min.css') }}">

@section('content')

<main class="main pt-2">
  @yield('head')
  <div class="row">
      <div class="col-md-12">
          @yield('main_section')
      </div>
  </div>
</main>


<script>
    CKEDITOR.replace('body');
    $('.selectpicker').select2();
    document.addEventListener('DOMContentLoaded', function() {
      var textEmailFilter = new Choices('#choices-text-email-filter', {
        editItems: true,
        addItemFilter: function(value) {
          if (!value) {
            return false;
          }
          const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          const expression = new RegExp(regex.source, 'i');
          return expression.test(value);
        },
      });
    });
</script>

<script type="text/javascript">
  var elems = document.getElementsByClassName('confirmation');
  var confirmIt = function (e) {
      if (!confirm('Are you sure?')) e.preventDefault();
  };
  for (var i = 0, l = elems.length; i < l; i++) {
      elems[i].addEventListener('click', confirmIt, false);
  }
</script>

<script>
    var timeleft = 5;
    var downloadTimer = setInterval(function(){
    if(timeleft <= 0){
        clearInterval(downloadTimer);
        $('#message').hide()

    } else {
    $('#message').show()
    }
    timeleft -= 1;
    }, 500);
</script>

@endsection

