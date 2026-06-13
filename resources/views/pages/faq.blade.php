<x-layouts-admin>
    <x-slot:title>FAQ</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'FAQ']]" />
    </div>

    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Frequently Asked Questions</h1>
            <p class="text-gray-500 dark:text-gray-400">Find answers to common questions about our platform.</p>
        </div>

        <x-card class="mb-4">
            <x-input placeholder="Search FAQ..." />
        </x-card>

        @php
            $faqGroups = [
                ['group' => 'Getting Started', 'items' => [
                    ['q' => 'How do I create an account?', 'a' => 'Click the "Sign Up" button in the top right corner and fill in your details. You can sign up with your email or use Google OAuth for a faster experience.'],
                    ['q' => 'What is the onboarding process?', 'a' => 'After signing up, you\'ll complete a quick questionnaire about your project needs. Our guided tour will walk you through the key features and settings.'],
                    ['q' => 'Can I import data from another platform?', 'a' => 'Yes, we support importing data from CSV, JSON, and direct API integrations with popular platforms like Trello, Asana, and Jira.'],
                ]],
                ['group' => 'Account & Billing', 'items' => [
                    ['q' => 'How does billing work?', 'a' => 'We offer monthly and annual billing cycles. Your plan renews automatically, and you can upgrade or downgrade at any time. All changes are prorated.'],
                    ['q' => 'Can I cancel my subscription?', 'a' => 'Yes, you can cancel anytime from your account settings. Your data will remain accessible for 30 days after cancellation.'],
                    ['q' => 'Do you offer refunds?', 'a' => 'We offer a 14-day money-back guarantee on all plans. Contact our support team to process your refund.'],
                ]],
                ['group' => 'Features & Integrations', 'items' => [
                    ['q' => 'What integrations are available?', 'a' => 'We integrate with Slack, GitHub, GitLab, Jira, Trello, Google Drive, Dropbox, and Zapier. New integrations are added regularly based on user feedback.'],
                    ['q' => 'Is there a mobile app?', 'a' => 'Yes, we have native iOS and Android apps available on the App Store and Google Play Store. All features are available on mobile.'],
                    ['q' => 'Can I customize the dashboard?', 'a' => 'Yes, you can customize your dashboard with widgets, charts, and data sources. Create multiple dashboard views for different purposes.'],
                ]],
                ['group' => 'Security & Privacy', 'items' => [
                    ['q' => 'How is my data protected?', 'a' => 'We use AES-256 encryption at rest and TLS 1.3 in transit. All data is stored in SOC 2 compliant data centers. We also offer SSO and 2FA.'],
                    ['q' => 'Do you comply with GDPR?', 'a' => 'Yes, we are fully GDPR compliant. You can request data export or deletion at any time from your account settings.'],
                ]],
            ];
        @endphp

        @foreach ($faqGroups as $group)
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mt-6 mb-3">{{ $group['group'] }}</h2>
            <x-card>
                <div class="divide-y divide-gray-100 dark:divide-gray-800">
                    @foreach ($group['items'] as $faq)
                    <div x-data="{ open: false }" class="py-3 first:pt-0 last:pb-0">
                        <button @click="open = !open" class="flex items-center justify-between w-full text-left gap-4">
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $faq['q'] }}</span>
                            <span class="w-4 h-4 text-gray-400 flex-shrink-0 transition-transform" :class="{ 'rotate-180': open }">
                                <x-heroicon-o-chevron-down class="w-4 h-4" />
                            </span>
                        </button>
                        <p x-show="open" x-collapse class="mt-2 text-sm text-gray-500 dark:text-gray-400 leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                    @endforeach
                </div>
            </x-card>
        @endforeach

        <div class="text-center mt-8 p-6 bg-indigo-50 dark:bg-indigo-900/20 rounded-xl">
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Still have questions?</p>
            <x-button size="sm">Contact Support</x-button>
        </div>
    </div>
</x-layouts-admin>
