<script setup>
import {ref} from "vue";

// Import FilePond
import vueFilePond, { setOptions } from 'vue-filepond';

// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';

// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

const dataFile = ref({});

setOptions({
    allowReorder: true,
    dropOnPage: true,
    server: {
        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
            const formData = new FormData();

            formData.append(fieldName, file, file.name);

            const request = new XMLHttpRequest();

            request.open('POST', route('upload.process'));

            request.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            request.upload.onprogress = (e) => {
                progress(e.lengthComputable, e.loaded, e.total);
            };

            request.onload = function () {
                if (request.status >= 200 && request.status < 300) {
                    let response = JSON.parse(request.responseText)

                    load(response);

                    dataFile.value[response] = file
                }

                else {
                    error('Error');
                }
            };

            request.send(formData);

            return {
                abort: () => {
                    request.abort();

                    abort();
                },
            };
        },

        revert: (uniqueFileId, load, error) => {
            const formData = new FormData();
            formData.append("key", uniqueFileId);

            delete dataFile.value[uniqueFileId]

            const request = new XMLHttpRequest();

            request.open('POST', route('upload.revert'));

            request.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            request.send(formData);

            // Can call the error method if something is wrong, should exit after
            error('oh my goodness');

            // Should call the load method when done, no parameters required
            load();
        }
    }
})

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);

defineExpose({
    dataFile,
})
</script>

<style scoped>
.filepond--item {
    width: calc(50% - 0.5em) !important;
}
</style>

<template>
    <div class="grey lighten-1 rounded p-1">
        <file-pond
            name="files"
            ref="pond"
            label-idle="Mettez les fichiers ici..."
            :allow-drop="true"
            v-bind="{ ...$attrs }"
        />
    </div>
</template>

