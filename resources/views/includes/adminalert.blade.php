<div class="alert alert-success" id="alert" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">{{ $message }}</h4>
</div>
<?php Session::forget('success');?>