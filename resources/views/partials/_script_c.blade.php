<script type="text/javascript">
    $(document).ready(function() {
        $(".c-i.nav > li > a").click(function() {
     
            $(".create-idea").empty().append("<img src='{{ url('img/loading.png') }}' class='loader' alt='Loading' />").addClass('text-center');
            $(".c-i.nav > li").removeClass('active');
            $(this).parent().addClass('active');

            $.ajax({
                url: $(this).data('href'),
                dataType: 'html',
                timeout: 15000,
                success: function(data) {
                    $(".create-idea").empty().removeClass('text-center').append(data);
                }
            });
        });

        $('.create-idea').load("{{ url('ajax/create/post') }}", function(responseTxt, statusTxt, xhr){
            $(this).empty().append(responseTxt);
        });
    });
</script>