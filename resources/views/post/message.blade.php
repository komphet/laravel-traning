@if(session()->exists('message'))

<div style="margin: 5px; border: 2px solid red;">
	{{ session('message') }}
</div>
@endif