function imagePreview(input_id, img_preview_id) {
    const image = document.querySelector('#'+input_id);
    const imgPreview = document.querySelector('#'+img_preview_id);

    imgPreview.style.display = 'block';
    imgPreview.style.maxHeight = '300px';
    imgPreview.classList.add('border');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
        document.querySelector('#photoProfileButton').classList.remove('d-none');
    }
}