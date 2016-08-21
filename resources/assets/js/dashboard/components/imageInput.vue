<template>
    <i v-show="! imageSrc" class="icon fa fa-picture-o"></i>
    <img v-show="imageSrc" class="avatar img-circle img-thumbnail" width="200" height="200" alt="avatar" :src="imageSrc">
    <h6>Upload a different photo...</h6>
    <input @change="previewThumbnail" type="file" name="{{ imageName }}" class="text-center center-block well well-sm">
</template>

<script>
export default {

    props: [ 'imageSrc' ,'imageName'],

    methods: {
        previewThumbnail: function(event) {
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var vm = this;

                reader.onload = function(e) {
                    vm.imageSrc = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }
};
</script>