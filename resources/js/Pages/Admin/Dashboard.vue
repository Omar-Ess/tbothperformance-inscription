<template>
    <Head :title="__('Dashboard')" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-dark-3 border-b border-gray-200">
                    {{ __("Welcome Back!") }}
                    {{ $page.props.auth.user.name }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>
