CKEDITOR.editorConfig = function (config) {


    config.contentsLangDirection = 'rtl';

    config.language = 'fa';


    config.allowedContent = true;
    config.toolbar = [
        { items: ['Templates', 'clipboard', 'Cut', 'Paste', 'Redo', 'Undo', 'Find', '-', 'basicstyles', 'cleanup', 'Link', 'Unlink', 'Iframe', 'Anchor', 'Image', 'Smiley', 'Flash', 'Table', 'SpecialChar', 'Syntaxhighlight', 'HorizontalRule', 'PageBreak', 'ShowBlocks', '-', 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'Blockquote', 'Maximize', 'Preview'] },
        { items: ['Format', 'Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript', '-', 'NumberedList', 'BulletedList', 'Indent', 'Outdent', '-', 'JustifyBlock', 'JustifyRight', 'JustifyCenter', 'JustifyLeft', 'BidiRtl', 'BidiLtr', 'TextColor', 'BGColor', 'Source'] }
    ];

};