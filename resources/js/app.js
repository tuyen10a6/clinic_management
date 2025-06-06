require('./bootstrap');
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import "select2"

document.addEventListener('DOMContentLoaded', function () {
    const editorElements = document.querySelectorAll('.editor');

    editorElements.forEach(editorElement => {
        ClassicEditor
            .create(editorElement)
            .catch(error => {
                console.error('CKEditor error:', error);
            });
    });
});

