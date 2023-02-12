<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    post: Object,
});

const form = useForm({
    _method: 'PUT',
    payload: props.post.payload,
});

const update = (id) => {
    form.put(route('post.update', {id: id})); /* eslint no-undef: "off", curly: "error" */
};
</script>

<template>
    <FormSection @submitted="editPost">
        <template #title>
            Post
        </template>

        <template #description>
            Edit Post
        </template>

        <template #form>
            <!-- Payload -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="payload" value="Payload" />
                <TextInput
id="payload" v-model="form.payload" type="text" class="mt-1 block w-full"
                    autocomplete="name" />
                <InputError :message="form.errors.payload" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </ActionMessage>

            <PrimaryButton
:class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                @click="update(post.id)">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
