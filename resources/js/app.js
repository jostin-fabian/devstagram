import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Upload your image here',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Delete file',
    maxFiles: 1,
    uploadMultiple: false,
    init: function () {
        if (document.querySelector('[name="image"]').value.trim()) {
            const imagePublished = {}
            imagePublished.size = 1234;//Not important size
            imagePublished.name = document.querySelector('[name="image"]').value;
            this.options.addedfile.call(this, imagePublished);
            this.options.thumbnail.call(this, imagePublished, `/uploads/${imagePublished.name}`);
            imagePublished.previewElement.classList.add('dz-success', 'dz-complete');

        }
    },

});
dropzone.on('success', function (file, response) {
    console.log(response.image);
    document.querySelector('[name="image"]').value = response.image;

});
dropzone.on("removedfile", function () {
    document.querySelector('[name="image"]').value = "";
});
