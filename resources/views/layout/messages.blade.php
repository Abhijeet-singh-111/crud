@if($message = Session::get('error'))
<div style=''>
<div class="alert alert-danger alert-block" style=''>
	<button style='font-size:3vw;' type="button" class="close" data-dismiss="alert">×</button>	
		<b style='font-size:1.99vw;'>Error </b>
        <strong style='font-size:1.60vw;'>{{ $message }}</strong>
</div>
</div>
@endif

@if($message = Session::get('success'))
<div style=''>
<div class="alert alert-success alert-block" style=''>
	<button style='font-size:3vw;' type="button" class="close" data-dismiss="alert">×</button>	
		<b style='font-size:1.99vw;'>Success </b>
        <strong style='font-size:1.60vw;'>{{ $message }}</strong>
</div>
</div>
@endif

@if($message = Session::get('info'))
<div style=''>
<div class="alert alert-info alert-block" style=''>
	<button style='font-size:3vw;' type="button" class="close" data-dismiss="alert">×</button>	
		<b style='font-size:1.99vw;'>Info </b>
        <strong style='font-size:1.60vw;'>{{ $message }}</strong>
</div>
</div>
@endif
