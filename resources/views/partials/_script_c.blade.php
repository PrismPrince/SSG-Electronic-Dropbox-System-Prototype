<script type="text/javascript">
    $(document).ready(function() {
        $('.img-up').hover(function(){
            $(this).tooltip({
                'title': 'Upload a photo/Drag and Drop',
                'placement': 'right',
            });
        });

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();


                reader.onload = function (e) {
                    $('.img-up').css('display', 'none');
                    $('.img-dismiss').css('display', 'block');
                    $('.i-img').css('height', '250px')
                        .css('width', '100%')
                        .css('background',  'url(\'' + e.target.result + '\') no-repeat')
                        .css('background-size', '100%')
                        .css('background-position', '0 0');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img-up').change(function(){
            readURL(this);
        });

        $('.img-dismiss').click(function(){
            $('.img-dismiss').css('display', 'none');
            $('.img-up').css('display', 'block'); // remove input file value
            $('.i-img').css('height', '50px')
                .css('width', '50px')
                .css('background',  'url(\'{{ url('img/plus.png') }}\') no-repeat')
                .css('background-size', '25px')
                .css('background-position', '50%');
        });
    });
</script>