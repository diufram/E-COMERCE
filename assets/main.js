(function(){

    'use strict'

    var file = document.getElementById('files');

    file.addEventListener('change', function() {
        for(var i = 0; i< file.files.length ;i++ ){
            var thumbnail_id = Math.floor(Math.random()*30000)+ '_'+Date.now();
            createThumbnail(file,i,thumbnail_id);
        }

    });

    var createThumbnail = function(file, iterator, thumbnail_id){
        var thumbnail= document.createElement('div');
        thumbnail.classList.add('thumbnail',thumbnail_id);
        thumbnail.dataset.id= thumbnail_id;

        thumbnail.setAttribute('style', `background-image: url(${URL.createObjectURL( file.files[iterator]) })`);
        document.getElementById('preview-images').appendChild(thumbnail);
    }
})();