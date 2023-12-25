<script src="https://cdn.tiny.cloud/1/0fh3tmvc7ou55z7q5fsrku4lak03u4jryuk5q9zwwldcmwpr/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
<?php $a = str_replace('.', '', $getStatePath()); ?>

<script>
    var tinyInstance{{$a}};

    tinymce.init({
        selector: '.tiny{{$a}}',
        // plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        plugins: ' anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',

        toolbar: 'forecolor backcolor undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',

        language: 'zh_TW',

        colorpicker_cols: 10,

        colorpicker_callback: function (color, instance) {
            instance.execCommand('ForeColor', false, color);
        },

        tinycomments_mode: 'embedded',

        tinycomments_author: 'Author name',
        mergetags_list: [
            {value: 'First.Name', title: 'First Name'},
            {value: 'Email', title: 'Email'},
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),

        setup: function (editor) {
            tinyInstance{{$a}} = editor;

            $(document).on('click', 'button[type="submit"]', function () {
            @this.set('{{ $getStatePath() }}', tinyInstance{{$a}}.getContent())
                ;
                setTimeout(function () {
                    location.reload();
                }, 500);
            });
        }
    });
</script>
<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div

        x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }"
        x-init="
        $watch('state', value => {
            if (tinyInstance) {
                tinyInstance.setContent(value);
            }
        });
    ">
        {{--        <input type="text" class="hidden tiny-DB " x-model="state" >--}}
        <textarea class="tiny{{$a}}" x-ref="tiny" x-model="state" wire:model.lazy="{{ $getStatePath() }}" ></textarea>
    </div>
</x-dynamic-component>

