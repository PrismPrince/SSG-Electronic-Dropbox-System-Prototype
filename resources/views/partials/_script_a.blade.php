<script type="text/javascript">
    function run() {
        $('.a-tt').hover(function(){
            $(this).tooltip({
                'placement': 'bottom'
            });
        });

        $('.a-o').popover({
            'placement': 'bottom',
            'trigger': 'click',
            'html': true,
            'container': 'body'
        });

        $('.a-o').on('shown.bs.popover', function() {
            $('.act-edit').click(function(e){
                e.preventDefault();
                $('.activity-modal-edit').modal('show');
            }).removeClass('act-edit');

            $('.act-delete').click(function(e){
                e.preventDefault();
                $('.activity-modal-delete').modal('show');
            }).removeClass('act-delete');
        });

        $('.a-h-d').each(function() {
            return $(this).html(function(i, o){
                $(this).attr('title', moment(o).format("ddd, MMM Do YYYY [at] h:mm a"));
                return "" + moment(o).fromNow();
            });
        }).removeClass('a-h-d');

        $('.a-f-a').each(function() {
            return $(this).html(function(i, o){
                $(this).attr('title', moment(o).format("ddd, MMM Do YYYY [at] h:mm a"));
                return "Ends " + moment(o).fromNow();
            });
        }).removeClass('a-f-a');

        $('.a-f-p').each(function() {
            return $(this).html(function(i, o){
                $(this).attr('title', moment(o).format("ddd, MMM Do YYYY [at] h:mm a"));
                return "Starts " + moment(o).fromNow();
            });
        }).removeClass('a-f-p');

        $('.a-f-e').each(function() {
            return $(this).html(function(i, o){
                $(this).attr('title', moment(o).format("ddd, MMM Do YYYY [at] h:mm a"));
                return "Ended " + moment(o).fromNow();
            });
        }).removeClass('a-f-e');
    }

    $(document).ready(function() {
        run();

        $('.activity-modal-edit').on('shown.bs.modal', function() {});
        $('.activity-modal-delete').on('shown.bs.modal', function() {});

        // auto load contents
        var page = 1;
        loadMore();
        $(document).scroll(function(){
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                if(page < {{ $activities->total() }}) {
                    loadMore();
                } else {
                    $('.more-activities').empty().append('<img src="{{ url('img/eoa.png') }}" class="end-of-act" alt="Loading" />');
                }
            }
        });
        
        function loadMore()
        {
            $('.more-activities').html('<img src="{{ url('img/loading.png') }}" class="loader" alt="Loading" />');
            $.ajax({
                url: '{{ url('ajax/show/activities?page=') }}' + (page++),
                method: 'get',
                success: function(data){
                    $('.removeScript').remove();
                    $('.activities').append(data);
                    run();
                },
            });
        }
    });
</script>