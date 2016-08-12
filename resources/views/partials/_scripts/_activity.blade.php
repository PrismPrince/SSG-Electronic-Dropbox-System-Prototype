<script class="removeScript" type="text/javascript">
	var type;
	var id;

	$('.panel .read-more').click(function(e) {
		e.preventDefault();
		$('.a-o').popover('hide');
		$('.activity-modal').modal('show');
		$('.activity-modal .modal-body').empty().append("<img src='{{ url('img/loading.png') }}' class='loader' alt='Loading' />").addClass('text-center');
		type = $(this).data('act-type');
		id = $(this).data('act-id');
	});

	$('.activity-modal').on('shown.bs.modal', function(){
		$.ajax({
			url: '{{ url('ajax') }}/' + type + '/' + id,
			cache: false,
			ifModified: true,
			success: function(json) {
				$('.activity-modal .modal-header > .modal-title').empty().append(json.head);
				$('.activity-modal .modal-body').empty().removeClass('text-center').append(json.body);
				run();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('error');
				console.log('Error: ' + textStatus + ' ' + errorThrown);
			}
		});
	});

	$('.activity-modal').on('hide.bs.modal', function(e){
		$(this).find('.modal-body, .modal-title').empty();
	});
</script>