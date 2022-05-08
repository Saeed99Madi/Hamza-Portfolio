@if(Session::get('msg'))
        <?php
          $msgClass = 'alert-info';
          $msg = Session::get('msg');
          $first2Letters = strtolower(substr($msg,0,2));
          if($first2Letters=='s:'){
            $msg = substr($msg,2);
            $msgClass = 'alert-success';
          }
          else if($first2Letters=='w:'){
            $msg = substr($msg,2);
            $msgClass = 'alert-warning';
          }
          else if($first2Letters=='e:'){
            $msg = substr($msg,2);
            $msgClass = 'alert-danger';
          }
          else if($first2Letters=='i:'){
            $msg = substr($msg,2);
            $msgClass = 'alert-info';
          }
        ?>
        <div class="alert {{$msgClass}} alert-dismissible fade show" role="alert">
          {{$msg}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
