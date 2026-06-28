@extends('layouts.landing')

@section('title', 'Privacy Policy')

@section('content')

    <!-- Content -->
    <main class="pt-40 pb-20 max-w-3xl mx-auto px-6">
        <div class="mb-12">
            <h1 class="font-outfit text-4xl md:text-5xl font-medium text-brand-dark mb-4">Privacy Policy</h1>
            <p class="text-brand-slate font-light">Last updated: June 2026</p>
        </div>

        <div class="space-y-8 text-brand-slate font-light leading-relaxed">
            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark mb-3">1. Information We Collect</h2>
                <p>We only collect the information necessary to provide you with our services. This includes your name,
                    email address, and the content you actively create within your workspaces (projects, tasks, and
                    notes). We believe your data belongs to you.</p>
            </section>

            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark mb-3">2. How We Use Your Data</h2>
                <p>Your data is used exclusively to deliver the Flowral application experience. We do not sell, rent, or
                    trade your personal information to third parties. Our AI features (when enabled) process data
                    temporarily to provide summaries and suggestions, but do not train on your private content.</p>
            </section>

            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark mb-3">3. Data Security</h2>
                <p>We implement bank-grade security measures to protect your information. All data transmitted between
                    your browser and our servers is encrypted using industry-standard protocols.</p>
            </section>

            <section>
                <h2 class="font-outfit text-2xl font-medium text-brand-dark mb-3">4. Contact Us</h2>
                <p>If you have any questions regarding this Privacy Policy, please contact us at <a
                        href="mailto:privacy@flowral.com" class="text-brand-orange hover:underline">privacy@flowral.com</a>.
                </p>
            </section>
        </div>
    </main>

@endsection