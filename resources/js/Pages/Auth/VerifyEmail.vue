<script setup>
import { computed } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route("verification.send"));
};

const verificationLinkSent = computed(
    () => props.status === "verification-link-sent"
);
</script>

<template>
    <Head :title="{{__('Email Verification')}}" />

    <div class="mb-4 text-sm text-gray-600">
        {{
            __(
                "Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another."
            )
        }}
    </div>

    <div
        class="mb-4 font-medium text-sm text-green-600"
        v-if="verificationLinkSent"
    >
        {{
            __(
                "A new verification link has been sent to the email address you provided during registration."
            )
        }}
    </div>

    <form @submit.prevent="submit">
        <div class="mt-4 flex items-center justify-between">
            <button :disabled="form.processing" class="btn btn-primary">
                {{ __("Resend Verification Email") }}
            </button>
            <Link
                :href="route('logout')"
                method="post"
                as="button"
                class="underline text-sm text-gray-600 hover:text-gray-900"
                >{{ __("Log Out") }}</Link
            >
        </div>
    </form>
</template>
