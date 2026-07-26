@extends('layouts.landing')

@section('title', 'Privacy Policy')

@section('content')

    <!-- Content -->
    <main class="pt-40 pb-20 max-w-3xl mx-auto px-6">
        <div class="mb-12">
            <h1 class="font-outfit text-4xl md:text-5xl font-medium text-brand-dark dark:text-white mb-4">@lang('landing.privacy_title')</h1>
            <p class="text-brand-slate dark:text-slate-300 font-light">@lang('landing.privacy_updated')</p>
        </div>

        <div class="space-y-8 text-brand-slate dark:text-slate-300 font-light leading-relaxed">
            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-3">@lang('landing.privacy_1_title')</h2>
                <p>@lang('landing.privacy_1_desc')</p>
            </section>

            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-3">@lang('landing.privacy_2_title')</h2>
                <p>@lang('landing.privacy_2_desc')</p>
            </section>

            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-3">@lang('landing.privacy_3_title')</h2>
                <p>@lang('landing.privacy_3_desc')</p>
            </section>

            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-3">@lang('landing.privacy_4_title')</h2>
                <p>@lang('landing.privacy_4_desc') <a
                        href="mailto:privacy@flowral.com" class="text-brand-orange hover:underline">privacy@flowral.com</a>.
                </p>
            </section>
        </div>
    </main>

@endsection