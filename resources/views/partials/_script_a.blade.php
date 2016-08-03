<script type="text/javascript">
    $(document).ready(function() {
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

        $('.a-h-d').each(function() {
            return $(this).html(function(i, o){
                $(this).attr('title', moment(o).format("ddd, MMM Do YYYY [at] h:mm a"));
                return moment(o).fromNow();
            });
        });

        $('.a-f-a').each(function() {
            return $(this).html(function(i, o){
                $(this).attr('title', moment(o).format("ddd, MMM Do YYYY [at] h:mm a"));
                return "Ends " + moment(o).fromNow();
            });
        });

        $('.a-f-p').each(function() {
            return $(this).html(function(i, o){
                $(this).attr('title', moment(o).format("ddd, MMM Do YYYY [at] h:mm a"));
                return "Starts " + moment(o).fromNow();
            });
        });

        $('.a-f-e').each(function() {
            return $(this).html(function(i, o){
                $(this).attr('title', moment(o).format("ddd, MMM Do YYYY [at] h:mm a"));
                return "Ended " + moment(o).fromNow();
            });
        });
    });
</script>