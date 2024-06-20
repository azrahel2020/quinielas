function previewImage2(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var imagePreview = document.getElementById('imagePreviewEdit');
        imagePreview.src = reader.result;
        imagePreview.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
