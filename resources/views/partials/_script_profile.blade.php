<script type="text/javascript">
    $(document).ready(function(){
        $('.open-modal').click(function(){
            var upload = $(this).data('upload');
            $('.form-upload').attr('action', '{{ url('images') }}/' + upload + '/{{ $user->id }}');
            $('.modal.upload').modal('show');
            if (upload == 'cover') $('.i-upload').val(3);
            else $('.i-upload').val(1);
        });
    });

    $(function () {
        $('.modal.upload').on('shown.bs.modal', function () {
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var ratio = $('.i-upload').val();

                        $('.i-u')
                            .attr('src', e.target.result)
                            .css('display', 'block')
                            .cropper({
                                viewMode: 3,
                                dragMode: 'move',
                                autoCropArea: 1,
                                aspectRatio: ratio,
                                restore: false,
                                guides: false,
                                cropBoxMovable: true,
                                cropBoxResizable: true,
                                crop: function(e) {
                                    $('.modal-body > .i-x').val(e.x);
                                    $('.modal-body > .i-y').val(e.y);
                                    $('.modal-body > .i-w').val(e.width);
                                    $('.modal-body > .i-h').val(e.height);
                                }
                            });
                        $('.u-box').css('display', 'none');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('.u-up').change(function(){
                readURL(this);
            });
        }).on('hidden.bs.modal', function () {
            $('.i-u').attr('src', '').css('display', 'none').cropper('destroy');
            $('.u-up').val('');
            $('.u-box').css('display', 'block');
            $('.modal-body > .i-x').val('');
            $('.modal-body > .i-y').val('');
            $('.modal-body > .i-w').val('');
            $('.modal-body > .i-h').val('');
        });
    });
</script>