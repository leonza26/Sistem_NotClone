@extends('layouts.landing')

@section('title', 'Terms of Service')

@section('content')

    <!-- Content -->
    <main class="pt-40 pb-20 max-w-3xl mx-auto px-6">
            <div class="mb-12">
                <h1 class="font-outfit text-4xl md:text-5xl font-medium text-brand-dark dark:text-white mb-4">@lang('landing.terms_title')</h1>
            <p class="text-brand-slate dark:text-slate-300 font-light">@lang('landing.terms_effective')</p>
        </div>

        <div class="space-y-8 text-brand-slate dark:text-slate-300 font-light leading-relaxed">
            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-3">@lang('landing.terms_1_title')</h2>
                <p>@lang('landing.terms_1_desc')</p>
            </section>

            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-3">@lang('landing.terms_2_title')</h2>
                <p>@lang('landing.terms_2_desc')</p>
            </section>

            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-3">@lang('landing.terms_3_title')</h2>
                <p>@lang('landing.terms_3_desc')</p>
            </section>

            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-3">@lang('landing.terms_4_title')</h2>
                <p>@lang('landing.terms_4_desc')</p>
            </section>
        </div>
    </main>

@endsection