$(document).ready(function () {

    $('#movie__input-file').on('change',function () {
        $('#movie__wrapper').css('display','none');
        $('#movie__properties').css('display','block');

        var movie = this.files[0];
        var movieId = $(this).data('movie-id');

        var movieName = movie.name.split('.').slice(0, -1).join('.');
        $('#movie__name').val(movieName)
         var formData = new FormData();
        formData.append('movie',movie);
        formData.append('movie_id',movieId);
        formData.append('name',movieName);

        $.ajax({

            url: $(this).data('url'),
            data:formData,
            method:'POST',
            processData: false,
            contentType : false,
            cache:false,

            success:function (movieBeforeProcessing) {
                var interval = setInterval(function () {
                    $.ajax({
                        url:`/dashboard/movies/${movieBeforeProcessing.id}`,
                        method: 'GET',
                        success:function(movieWhileProcessing){
                            $('#movie__progress-status').html('Processing')
                            $('#movie__progress').css('width',movieWhileProcessing.percent+'%');
                            $('#movie__progress').html(movieWhileProcessing.percent+'%');

                            if (movieWhileProcessing.percent=100){
                                clearInterval(interval)
                                $('#movie__progress-status').html('The movie was processed')
                                $('#movie__progress').parent().css('display','none');

                                $('#movie__submit').css('display','block');
                            }
                        },
                    })
                },3000)
            },
            xhr:function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress',function (evt) {
                    if (evt.lengthComputable){
                        var percentComplete = Math.round(evt.loaded/evt.total *100 )+"%";
                        $('#movie__progress').css('width',percentComplete).html(percentComplete)
                    }
                },false);
                return xhr;
            }
        })

    });
});
