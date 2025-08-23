@extends('layouts.main')

@section('content')
<!-- Page content -->
<main class="grow">

    <!-- Hero -->
    <section class="relative">

        <!-- Stripes illustration -->
        <div class="absolute left-1/2 transform -translate-x-1/2 top-0 pointer-events-none -z-10" aria-hidden="true">
            <img class="max-w-none" src="/simple-html/images/stripes.svg" width="768" height="432" alt="Stripes" />
        </div>

        <!-- Circles -->
        <div class="absolute left-1/2 -translate-x-1/2 -top-32 ml-[580px] pointer-events-none" aria-hidden="true">
            <div
                class="w-80 h-80 rounded-full bg-linear-to-tr from-blue-500 opacity-50 blur-[160px] will-change-[filter]">
            </div>
        </div>
        <div class="absolute left-1/2 -translate-x-1/2 top-[420px] ml-[380px] pointer-events-none" aria-hidden="true">
            <div
                class="w-80 h-80 rounded-full bg-linear-to-tr from-blue-500 to-gray-900 opacity-50 blur-[160px] will-change-[filter]">
            </div>
        </div>
        <div class="absolute left-1/2 -translate-x-1/2 top-[640px] -ml-[300px] pointer-events-none" aria-hidden="true">
            <div
                class="w-80 h-80 rounded-full bg-linear-to-tr from-blue-500 to-gray-900 opacity-50 blur-[160px] will-change-[filter]">
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <!-- Hero content -->
            <div class="pt-28 pb-12 md:pt-40 md:pb-20">

                <!-- Section header -->
                <div class="text-center pb-12 md:pb-16">

                    <h1 class="text-5xl md:text-6xl font-bold mb-6 border-y [border-image:linear-gradient(to_right,transparent,--theme(--color-slate-300/.8),transparent)1]">
                        <span class="rotating-text" data-texts="Transactional Emails,X.com Tweets,LinkedIn Posts,Email Campaigns">Transactional Emails</span>
                        <br class="max-lg:hidden" />
                        Simplified with AI. <?= User::first()->email ?>
                    </h1>
                    <div class="max-w-3xl mx-auto">
                        <p class="text-lg text-gray-700 mb-8">Create, schedule, and send all your messages from one platform. Whether it's emails, tweets, or LinkedIn updates, our AI handles the timing, targeting, and optimization.</p>
                        <div
                            class="relative before:absolute before:inset-0 before:border-y before:[border-image:linear-gradient(to_right,transparent,--theme(--color-slate-300/.8),transparent)1]">
                            <div class="relative max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center">
                                <a class="btn w-full sm:w-auto sm:mb-0 mb-3 text-gray-200 bg-gray-800 hover:bg-gray-900 shadow-sm"
                                    href="<?= $userData ? '/a/' . $userData->aCode . '/dashboard' : '/login' ?>">
                                    <span class="relative inline-flex items-center">
                                        <?= $userData ? 'Dashboard' : 'Join now for Free' ?><span
                                            class="tracking-normal text-gray-300 group-hover:translate-x-0.5 transition-transform ml-1">-&gt;</span>
                                    </span>
                                </a>
                                <a class="btn text-gray-800 bg-white hover:bg-gray-50 shadow-sm w-full sm:w-auto sm:ml-4"
                                    href="#0">API Documentation</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero image -->
                <div class="max-w-3xl mx-auto">
                    <div
                        class="relative aspect-video bg-gray-900 rounded-2xl px-5 py-3 shadow-xl before:absolute before:-inset-5 before:border-y before:[border-image:linear-gradient(to_right,transparent,--theme(--color-slate-300/.8),transparent)1] before:pointer-events-none after:absolute after:-inset-5 after:border-x after:[border-image:linear-gradient(to_bottom,transparent,--theme(--color-slate-300/.8),transparent)1] after:-z-10">
                        <div
                            class="relative flex items-center justify-between before:block before:w-[41px] before:h-[9px] before:[background-image:radial-gradient(circle_at_4.5px_4.5px,var(--color-gray-600)_4.5px,transparent_0)] before:bg-[length:16px_9px] after:w-[41px] mb-8">
                            <span class="text-white font-medium text-[13px]">isend.ai</span>
                        </div>
                        <div id="code-output" class="text-gray-500 text-sm font-mono">
                            <span>$ composer require isend/isend-php</span><br />
                            <span>Using version ^1.0 for isend/isend-php</span><br />
                            <span>./composer.json has been updated</span><br />
                            <span>Running composer update isend/isend-php</span><br />
                            <span>Installing dependencies (including require-dev)</span><br />
                            <span>Package operations: 1 install</span><br />
                            <span> - Installing isend/isend-php (1.0.0): Downloading...</span><br />
                            <span>Writing lock file</span><br />
                            <span>Generating autoload files</span><br /><br />
                            <span>$ php send_email.php</span><br />
                            <span>Email Sent Successfully</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Features #2 -->
    <section class="relative">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 -z-10" aria-hidden="true">
            <div
                class="w-80 h-80 rounded-full bg-linear-to-tr from-blue-500 to-gray-900 opacity-40 blur-[160px] will-change-[filter]">
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="py-12 md:py-20">

                <!-- Section header -->
                <div class="max-w-3xl mx-auto text-center pb-10">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">How It Works</h2>
                    <p class="text-lg text-gray-700">Get started in minutes. No complex setup, no email headaches. Just
                        connect, create, and send.</p>
                </div>

                <!-- Grid -->
                <div
                    class="grid lg:grid-cols-3 overflow-hidden border-y [border-image:linear-gradient(to_right,transparent,var(--color-slate-200),transparent)1] *:p-6 md:*:px-10 md:*:py-12 *:relative *:before:absolute *:before:bg-linear-to-b *:before:from-transparent *:before:via-gray-200 *:before:[block-size:100%] *:before:[inline-size:1px] *:before:[inset-inline-start:-1px] *:before:[inset-block-start:0]">

                    <!-- Step 1 -->
                    <article>
                        <h3 class="font-medium flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="m15.447 6.605-.673-.336a6.973 6.973 0 0 0-.761-1.834l.238-.715a.999.999 0 0 0-.242-1.023l-.707-.707a.995.995 0 0 0-1.023-.242l-.715.238a6.96 6.96 0 0 0-1.834-.761L9.394.552A1 1 0 0 0 8.5-.001h-1c-.379 0-.725.214-.895.553l-.336.673a6.973 6.973 0 0 0-1.834.761l-.715-.238a.997.997 0 0 0-1.023.242l-.707.707a1.001 1.001 0 0 0-.242 1.023l.238.715a6.959 6.959 0 0 0-.761 1.834l-.673.336a1 1 0 0 0-.553.895v1c0 .379.214.725.553.895l.673.336c.167.653.425 1.268.761 1.834l-.238.715a.999.999 0 0 0 .242 1.023l.707.707a.997.997 0 0 0 1.023.242l.715-.238a6.959 6.959 0 0 0 1.834.761l.336.673a1 1 0 0 0 .895.553h1c.379 0 .725-.214.895-.553l.336-.673a6.973 6.973 0 0 0 1.834-.761l.715.238a1.001 1.001 0 0 0 1.023-.242l.707-.707c.268-.268.361-.664.242-1.023l-.238-.715a6.959 6.959 0 0 0 .761-1.834l.673-.336A1 1 0 0 0 16 8.5v-1c0-.379-.214-.725-.553-.895ZM8 13a5 5 0 1 1 .001-10.001 5 5 0 0 1 0 10.001Z">
                                </path>
                            </svg>
                            <span>Connect Your Email Provider</span>
                        </h3>
                        <p class="text-[15px] text-gray-700">Link Amazon SES, SendGrid, Postmark, or any SMTP in seconds
                            — no friction, just config.</p>
                    </article>

                    <!-- Step 2 -->
                    <article>
                        <h3 class="font-medium flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="12">
                                <path
                                    d="M2 0a1 1 0 0 0 0 2h6a1 1 0 0 0 0-2H2Zm0 7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm1-3a3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H3Z">
                                </path>
                            </svg>
                            <span>Create & Manage Templates</span>
                        </h3>
                        <p class="text-[15px] text-gray-700">Build, version, and test your templates directly in the
                            dashboard. Preview changes live.</p>
                    </article>

                    <!-- Step 3 -->
                    <article>
                        <h3 class="font-medium flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="M14.75 2.5a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5Zm0 13.5a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5ZM2.5 14.75a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0ZM1.25 2.5a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5ZM4 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0Zm4-6a6 6 0 1 0 0 12A6 6 0 0 0 8 2Z">
                                </path>
                            </svg>
                            <span>Send with One Line of Code</span>
                        </h3>
                        <p class="text-[15px] text-gray-700">Trigger email sends from any backend with a single,
                            consistent API call. Done.</p>
                    </article>

                </div>


            </div>
        </div>
    </section>

    <!-- Business Categories -->
    <section>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div>

                <!-- Tabs component -->
                <div x-data="{ activeTab: 1 }">

                    <!-- Buttons -->
                    <div class="flex justify-center">
                        <div role="tablist"
                            class="relative sm:max-w-xl max-w-full inline-flex flex-wrap justify-center bg-white rounded-xl p-2 shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:rounded-[inherit] before:border before:border-transparent before:[background:linear-gradient(var(--color-gray-100),var(--color-gray-200))_border-box] before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)] before:[mask-composite:exclude_!important] before:pointer-events-none mb-8 min-[480px]:mb-12"
                            @keydown.right.prevent.stop="$focus.wrap().next()"
                            @keydown.left.prevent.stop="$focus.wrap().prev()"
                            @keydown.home.prevent.stop="$focus.first()" @keydown.end.prevent.stop="$focus.last()">
                            <!-- Button #1 -->
                            <button id="tab-1"
                                class="sm:flex-1 flex items-center gap-2 text-sm font-medium h-8 px-3 rounded-lg whitespace-nowrap focus-visible:outline-hidden focus-visible:ring-3 focus-visible:ring-blue-300 transition-colors"
                                :class="activeTab === 1 ? 'bg-gray-800 text-gray-200' : 'text-gray-700'"
                                :tabindex="activeTab === 1 ? 0 : -1" :aria-selected="activeTab === 1"
                                aria-controls="tabpanel-1" @click="activeTab = 1" @focus="activeTab = 1">
                                <svg width="20" height="20" class="fill-current"
                                    :class="activeTab === 1 ? 'text-gray-400' : 'text-gray-500'" viewBox="0 0 32 32"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <circle cx="16" cy="16" r="14" fill="#8892BF"></circle>
                                        <path
                                            d="M14.4392 10H16.1192L15.6444 12.5242H17.154C17.9819 12.5419 18.5986 12.7269 19.0045 13.0793C19.4184 13.4316 19.5402 14.1014 19.3698 15.0881L18.5541 19.4889H16.8497L17.6288 15.2863C17.7099 14.8457 17.6856 14.533 17.5558 14.348C17.426 14.163 17.146 14.0705 16.7158 14.0705L15.3644 14.0573L14.3661 19.4889H12.6861L14.4392 10Z"
                                            fill="white"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.74092 12.5243H10.0036C10.9612 12.533 11.6552 12.8327 12.0854 13.4229C12.5156 14.0132 12.6576 14.8193 12.5115 15.8414C12.4548 16.3085 12.3289 16.7665 12.1341 17.2159C11.9474 17.6652 11.6878 18.0704 11.355 18.4317C10.9491 18.8898 10.5149 19.1805 10.0523 19.304C9.58969 19.4274 9.11076 19.489 8.61575 19.489H7.15484L6.69222 22H5L6.74092 12.5243ZM7.43485 17.9956L8.16287 14.0441H8.40879C8.49815 14.0441 8.5914 14.0396 8.6888 14.0309C9.33817 14.0221 9.87774 14.0882 10.308 14.2291C10.7462 14.37 10.8923 14.9031 10.7462 15.8282C10.5678 16.9296 10.2186 17.5727 9.69926 17.7577C9.1799 17.934 8.53053 18.0176 7.75138 18.0088H7.58094C7.53224 18.0088 7.48355 18.0043 7.43485 17.9956Z"
                                            fill="white"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M24.4365 12.5243H21.1738L19.4329 22H21.1251L21.5878 19.489H23.0487C23.5437 19.489 24.0226 19.4274 24.4852 19.304C24.9479 19.1805 25.382 18.8898 25.7879 18.4317C26.1207 18.0704 26.3803 17.6652 26.567 17.2159C26.7618 16.7665 26.8877 16.3085 26.9444 15.8414C27.0905 14.8193 26.9486 14.0132 26.5183 13.4229C26.0881 12.8327 25.3942 12.533 24.4365 12.5243ZM22.5958 14.0441L21.8678 17.9956C21.9165 18.0043 21.9652 18.0088 22.0139 18.0088H22.1843C22.9635 18.0176 23.6128 17.934 24.1322 17.7577C24.6515 17.5727 25.0007 16.9296 25.1792 15.8282C25.3253 14.9031 25.1792 14.37 24.7409 14.2291C24.3107 14.0882 23.7711 14.0221 23.1217 14.0309C23.0243 14.0396 22.9311 14.0441 22.8417 14.0441H22.5958Z"
                                            fill="white"></path>
                                    </g>
                                </svg>
                                <span class="hidden sm:inline">Php</span>
                            </button>
                            <!-- Button #2 -->
                            <button id="tab-2"
                                class="sm:flex-1 flex items-center gap-2 text-sm font-medium h-8 px-3 rounded-lg whitespace-nowrap focus-visible:outline-hidden focus-visible:ring-3 focus-visible:ring-blue-300 transition-colors"
                                :class="activeTab === 2 ? 'bg-gray-800 text-gray-200' : 'text-gray-700'"
                                :tabindex="activeTab === 2 ? 0 : -1" :aria-selected="activeTab === 2"
                                aria-controls="tabpanel-2" @click="activeTab = 2" @focus="activeTab = 2">
                                <svg class="fill-current" :class="activeTab === 1 ? 'text-gray-400' : 'text-gray-500'"
                                    width="18" height="18" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.0164 2C10.8193 2 9.03825 3.72453 9.03825 5.85185V8.51852H15.9235V9.25926H5.97814C3.78107 9.25926 2 10.9838 2 13.1111L2 18.8889C2 21.0162 3.78107 22.7407 5.97814 22.7407H8.27322V19.4815C8.27322 17.3542 10.0543 15.6296 12.2514 15.6296H19.5956C21.4547 15.6296 22.9617 14.1704 22.9617 12.3704V5.85185C22.9617 3.72453 21.1807 2 18.9836 2H13.0164ZM12.0984 6.74074C12.8589 6.74074 13.4754 6.14378 13.4754 5.40741C13.4754 4.67103 12.8589 4.07407 12.0984 4.07407C11.3378 4.07407 10.7213 4.67103 10.7213 5.40741C10.7213 6.14378 11.3378 6.74074 12.0984 6.74074Z"
                                            fill="url(#paint0_linear_87_8204)"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.9834 30C21.1805 30 22.9616 28.2755 22.9616 26.1482V23.4815L16.0763 23.4815L16.0763 22.7408L26.0217 22.7408C28.2188 22.7408 29.9998 21.0162 29.9998 18.8889V13.1111C29.9998 10.9838 28.2188 9.25928 26.0217 9.25928L23.7266 9.25928V12.5185C23.7266 14.6459 21.9455 16.3704 19.7485 16.3704L12.4042 16.3704C10.5451 16.3704 9.03809 17.8296 9.03809 19.6296L9.03809 26.1482C9.03809 28.2755 10.8192 30 13.0162 30H18.9834ZM19.9015 25.2593C19.1409 25.2593 18.5244 25.8562 18.5244 26.5926C18.5244 27.329 19.1409 27.9259 19.9015 27.9259C20.662 27.9259 21.2785 27.329 21.2785 26.5926C21.2785 25.8562 20.662 25.2593 19.9015 25.2593Z"
                                            fill="url(#paint1_linear_87_8204)"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear_87_8204" x1="12.4809" y1="2" x2="12.4809"
                                                y2="22.7407" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#327EBD"></stop>
                                                <stop offset="1" stop-color="#1565A7"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_87_8204" x1="19.519" y1="9.25928"
                                                x2="19.519" y2="30" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFDA4B"></stop>
                                                <stop offset="1" stop-color="#F9C600"></stop>
                                            </linearGradient>
                                        </defs>
                                    </g>
                                </svg>
                                <span class="hidden sm:inline">Python</span>
                            </button>
                            <!-- Button #3 -->
                            <button id="tab-3"
                                class="sm:flex-1 flex items-center gap-2 text-sm font-medium h-8 px-3 rounded-lg whitespace-nowrap focus-visible:outline-hidden focus-visible:ring-3 focus-visible:ring-blue-300 transition-colors"
                                :class="activeTab === 3 ? 'bg-gray-800 text-gray-200' : 'text-gray-700'"
                                :tabindex="activeTab === 3 ? 0 : -1" :aria-selected="activeTab === 3"
                                aria-controls="tabpanel-3" @click="activeTab = 3" @focus="activeTab = 3">
                                <svg width="18" height="18" class="fill-current"
                                    :class="activeTab === 1 ? 'text-gray-400' : 'text-gray-500'" viewBox="-13 0 282 282"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin meet"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g fill="#8CC84B">
                                            <path
                                                d="M116.504 3.58c6.962-3.985 16.03-4.003 22.986 0 34.995 19.774 70.001 39.517 104.99 59.303 6.581 3.707 10.983 11.031 10.916 18.614v118.968c.049 7.897-4.788 15.396-11.731 19.019-34.88 19.665-69.742 39.354-104.616 59.019-7.106 4.063-16.356 3.75-23.24-.646-10.457-6.062-20.932-12.094-31.39-18.15-2.137-1.274-4.546-2.288-6.055-4.36 1.334-1.798 3.719-2.022 5.657-2.807 4.365-1.388 8.374-3.616 12.384-5.778 1.014-.694 2.252-.428 3.224.193 8.942 5.127 17.805 10.403 26.777 15.481 1.914 1.105 3.852-.362 5.488-1.274 34.228-19.345 68.498-38.617 102.72-57.968 1.268-.61 1.969-1.956 1.866-3.345.024-39.245.006-78.497.012-117.742.145-1.576-.767-3.025-2.192-3.67-34.759-19.575-69.5-39.18-104.253-58.76a3.621 3.621 0 0 0-4.094-.006C91.2 39.257 56.465 58.88 21.712 78.454c-1.42.646-2.373 2.071-2.204 3.653.006 39.245 0 78.497 0 117.748a3.329 3.329 0 0 0 1.89 3.303c9.274 5.259 18.56 10.481 27.84 15.722 5.228 2.814 11.647 4.486 17.407 2.33 5.083-1.823 8.646-7.01 8.549-12.407.048-39.016-.024-78.038.036-117.048-.127-1.732 1.516-3.163 3.2-3 4.456-.03 8.918-.06 13.374.012 1.86-.042 3.14 1.823 2.91 3.568-.018 39.263.048 78.527-.03 117.79.012 10.464-4.287 21.85-13.966 26.97-11.924 6.177-26.662 4.867-38.442-1.056-10.198-5.09-19.93-11.097-29.947-16.55C5.368 215.886.555 208.357.604 200.466V81.497c-.073-7.74 4.504-15.197 11.29-18.85C46.768 42.966 81.636 23.27 116.504 3.58z">
                                            </path>
                                            <path
                                                d="M146.928 85.99c15.21-.979 31.493-.58 45.18 6.913 10.597 5.742 16.472 17.793 16.659 29.566-.296 1.588-1.956 2.464-3.472 2.355-4.413-.006-8.827.06-13.24-.03-1.872.072-2.96-1.654-3.195-3.309-1.268-5.633-4.34-11.212-9.642-13.929-8.139-4.075-17.576-3.87-26.451-3.785-6.479.344-13.446.905-18.935 4.715-4.214 2.886-5.494 8.712-3.99 13.404 1.418 3.369 5.307 4.456 8.489 5.458 18.33 4.794 37.754 4.317 55.734 10.626 7.444 2.572 14.726 7.572 17.274 15.366 3.333 10.446 1.872 22.932-5.56 31.318-6.027 6.901-14.805 10.657-23.56 12.697-11.647 2.597-23.734 2.663-35.562 1.51-11.122-1.268-22.696-4.19-31.282-11.768-7.342-6.375-10.928-16.308-10.572-25.895.085-1.619 1.697-2.748 3.248-2.615 4.444-.036 8.888-.048 13.332.006 1.775-.127 3.091 1.407 3.182 3.08.82 5.367 2.837 11 7.517 14.182 9.032 5.827 20.365 5.428 30.707 5.591 8.568-.38 18.186-.495 25.178-6.158 3.689-3.23 4.782-8.634 3.785-13.283-1.08-3.925-5.186-5.754-8.712-6.95-18.095-5.724-37.736-3.647-55.656-10.12-7.275-2.571-14.31-7.432-17.105-14.906-3.9-10.578-2.113-23.662 6.098-31.765 8.006-8.06 19.563-11.164 30.551-12.275z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <span class="hidden sm:inline">Node.js</span>
                            </button>
                            <!-- Button #4 -->
                            <button id="tab-4"
                                class="sm:flex-1 flex items-center gap-2 text-sm font-medium h-8 px-3 rounded-lg whitespace-nowrap focus-visible:outline-hidden focus-visible:ring-3 focus-visible:ring-blue-300 transition-colors"
                                :class="activeTab === 4 ? 'bg-gray-800 text-gray-200' : 'text-gray-700'"
                                :tabindex="activeTab === 4 ? 0 : -1" :aria-selected="activeTab === 4"
                                aria-controls="tabpanel-4" @click="activeTab = 4" @focus="activeTab = 4">
                                <svg class="fill-current" :class="activeTab === 1 ? 'text-gray-400' : 'text-gray-500'"
                                    width="20" height="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <linearGradient id="a" x1="5.501" y1="16" x2="26.5" y2="16"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.08" stop-color="#aa2237"></stop>
                                                <stop offset="0.982" stop-color="#b4313d"></stop>
                                            </linearGradient>
                                            <linearGradient id="b" x1="10.099" y1="5.601" x2="16.169" y2="5.601"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.037" stop-color="#b83a41"></stop>
                                                <stop offset="0.896" stop-color="#bf4a50"></stop>
                                            </linearGradient>
                                            <linearGradient id="c" x1="7.851" y1="20.836" x2="7.851" y2="14.698"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.037" stop-color="#a92237"></stop>
                                                <stop offset="0.939" stop-color="#972235"></stop>
                                            </linearGradient>
                                            <linearGradient id="d" x1="13.133" y1="29.442" x2="13.133" y2="20.836"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.037" stop-color="#bc4245"></stop>
                                                <stop offset="0.939" stop-color="#a42136"></stop>
                                            </linearGradient>
                                            <linearGradient id="e" x1="19.212" y1="8.696" x2="19.212" y2="2.575"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.037" stop-color="#cc5057"></stop>
                                                <stop offset="0.896" stop-color="#b73840"></stop>
                                            </linearGradient>
                                            <linearGradient id="f" x1="21.776" y1="7.866" x2="24.376" y2="6.365"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.08" stop-color="#d4575f"></stop>
                                                <stop offset="0.945" stop-color="#b63540"></stop>
                                            </linearGradient>
                                            <linearGradient id="g" x1="22.256" y1="11.733" x2="26.484" y2="11.733"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-color="#c04b51"></stop>
                                                <stop offset="1" stop-color="#b83a41"></stop>
                                            </linearGradient>
                                            <linearGradient id="h" x1="22.239" y1="17.79" x2="26.475" y2="17.79"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-color="#ba4044"></stop>
                                                <stop offset="1" stop-color="#b4303c"></stop>
                                            </linearGradient>
                                            <linearGradient id="i" x1="21.349" y1="23.257" x2="24.603" y2="24.442"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-color="#972136"></stop>
                                                <stop offset="1" stop-color="#9f2236"></stop>
                                            </linearGradient>
                                            <linearGradient id="j" x1="18.562" y1="21.3" x2="24.103" y2="27.904"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.037" stop-color="#b22c3a"></stop>
                                                <stop offset="0.939" stop-color="#c04d53"></stop>
                                            </linearGradient>
                                            <linearGradient id="k" x1="16.199" y1="29.443" x2="16.199" y2="23.313"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.037" stop-color="#b22c3a"></stop>
                                                <stop offset="0.939" stop-color="#9b2135"></stop>
                                            </linearGradient>
                                            <linearGradient id="l" x1="22.221" y1="6.635" x2="25.29" y2="6.635"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.037" stop-color="#ffffff"></stop>
                                                <stop offset="0.742" stop-color="#f4e6d9"></stop>
                                            </linearGradient>
                                            <linearGradient id="m" x1="17.162" y1="4.552" x2="22.113" y2="7.411"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0.037" stop-color="#ffffff"></stop>
                                                <stop offset="0.896" stop-color="#f4e6d9"></stop>
                                            </linearGradient>
                                        </defs>
                                        <title>file_type_rails</title>
                                        <path
                                            d="M27.007,26.836A3.163,3.163,0,0,1,23.844,30H4.993V5.164A3.164,3.164,0,0,1,8.156,2H27.007Z"
                                            style="fill:#80152a"></path>
                                        <path
                                            d="M26.5,26.539a2.876,2.876,0,0,1-2.945,2.945H5.5V5.461A2.876,2.876,0,0,1,8.446,2.517H26.5Z"
                                            style="fill:url(#a)"></path>
                                        <polygon points="10.099 2.541 10.167 8.661 5.619 10.184 10.099 2.541"
                                            style="fill:#8a2034"></polygon>
                                        <polygon points="10.099 2.541 10.167 8.661 16.169 6.159 10.099 2.541"
                                            style="fill:url(#b)"></polygon>
                                        <polygon points="7.614 14.698 10.167 8.661 5.619 10.184 7.614 14.698"
                                            style="fill:#ae2338"></polygon>
                                        <polygon points="7.614 14.698 10.133 20.836 5.568 19.365 7.614 14.698"
                                            style="fill:url(#c)"></polygon>
                                        <polygon points="10.108 29.442 10.133 20.836 5.568 19.365 10.108 29.442"
                                            style="fill:#8a2034"></polygon>
                                        <polygon points="10.108 29.442 5.568 29.443 5.568 19.365 10.108 29.442"
                                            style="fill:#8c2033"></polygon>
                                        <polygon points="10.108 29.442 10.133 20.836 16.158 23.315 10.108 29.442"
                                            style="fill:url(#d)"></polygon>
                                        <polygon points="22.188 2.575 22.256 8.696 16.169 6.159 22.188 2.575"
                                            style="fill:url(#e)"></polygon>
                                        <polygon points="22.188 2.575 22.256 8.696 26.484 10.201 22.188 2.575"
                                            style="fill:url(#f)"></polygon>
                                        <polygon points="24.737 14.77 22.256 8.696 26.484 10.201 24.737 14.77"
                                            style="fill:url(#g)"></polygon>
                                        <polygon points="24.737 14.77 22.239 20.81 26.475 19.297 24.737 14.77"
                                            style="fill:url(#h)"></polygon>
                                        <polygon points="22.29 29.426 22.239 20.81 26.475 19.297 22.29 29.426"
                                            style="fill:url(#i)"></polygon>
                                        <polygon points="22.29 29.426 22.239 20.81 16.162 23.313 22.29 29.426"
                                            style="fill:url(#j)"></polygon>
                                        <polygon points="22.29 29.426 10.109 29.443 16.162 23.313 22.29 29.426"
                                            style="fill:url(#k)"></polygon>
                                        <path
                                            d="M16.786,16.577l1.37.628-.139-.976-1.249-.672ZM6.4,19.847l1.784.2.389-1.658-1.708-.3Zm6.345-11.48L11.575,7.5l-.812,1.1,1.281.8Zm3.576-2.9-.748-.976-1.052.621.875.952Zm3.855-.685-.241-.8-1.268-.1.368.875Zm4.287,1-1.065-.761v.494l1.027.635ZM10.065,12.868l-1.458-.634-.495,1.445,1.5.558Zm7.26-.654-.26.894.939.863.235-.831Zm5.992-4,.78.038.007-.362-.812-.165ZM20.075,5.2C16.324,5.014,9.609,8.569,8.645,22.831h9.2c-2.062-5.343-1.823-9.374-.405-12.106,2.062-3.973,5.132-4.236,8-2.561.1-.241.241-.545.241-.545A7.821,7.821,0,0,0,20.075,5.2Zm.275,2.96.342.818.634-.342-.235-.755Zm-2.08,1.858.7.958.431-.628L18.79,9.4Zm1.065,11.147L18.9,20.115l-1.592-.3.419,1.2Z"
                                            style="fill:#f7dee1"></path>
                                        <polygon points="10.969 8.329 12.069 7.869 11.575 7.503 10.969 8.329"
                                            style="fill:#fff"></polygon>
                                        <polygon points="15.392 6.059 15.684 5.87 14.654 5.256 15.392 6.059"
                                            style="fill:#fff"></polygon>
                                        <polygon
                                            points="6.862 18.089 6.449 19.649 7.427 19.964 8.18 20.05 8.569 18.392 6.862 18.089"
                                            style="fill:#d7c4c9"></polygon>
                                        <path d="M9.165,18.478Q9,19.413,8.873,20.43l1.26.406Z" style="fill:#d7c4c9">
                                        </path>
                                        <polygon points="6.449 19.649 6.397 19.847 7.427 19.964 6.449 19.649"
                                            style="fill:#c2c3c6"></polygon>
                                        <path d="M10.133,20.836l-1.26-.406c-.094.765-.171,1.564-.228,2.4h1.482Z"
                                            style="fill:#c2c3c6"></path>
                                        <polygon points="10.127 22.831 14.981 22.831 10.133 20.836 10.127 22.831"
                                            style="fill:#ddc3c8"></polygon>
                                        <path
                                            d="M23.68,5.223l-.286-.2v.494l.689.426Zm.77,1.368a7.094,7.094,0,0,0-2.229-1.069l.018,1.669a6.321,6.321,0,0,1,3.05.89ZM23.317,8.214l.78.038.007-.362-.812-.165Z"
                                            style="fill:url(#l)"></path>
                                        <path
                                            d="M22.221,5.522A9.532,9.532,0,0,0,20.075,5.2a7.357,7.357,0,0,0-3.854.985L20.04,7.773a4.373,4.373,0,0,1,2.2-.581Zm-2.05-.745-.241-.8-.087-.008-.913.543.1.237Zm.5,3.258.538.225-.119-.382Z"
                                            style="fill:url(#m)"></path>
                                        <path
                                            d="M10.218,26.044v-.678A1.081,1.081,0,0,0,9.2,24.353H7.047V28.42h1.1V27.236l.888,1.184h1.319l-1.032-1.37A1.1,1.1,0,0,0,10.218,26.044Zm-1.082.2h-1v-.82h1Zm4.269-1.911h-1a1.074,1.074,0,0,0-1.023,1.057V28.4h1.082v-.794h.972V28.4h1.1V25.384A1.1,1.1,0,0,0,13.405,24.335Zm.033,2.181h-.972v-1.09h.972ZM23.5,25.8H22.442v-.444H24.3V24.351H22.436a1.08,1.08,0,0,0-1.1,1.04v.431a1.1,1.1,0,0,0,1.091,1.065h.983v.494h-2v1.027H23.38a1.082,1.082,0,0,0,1.123-.982v-.539A1.056,1.056,0,0,0,23.5,25.8Zm-4.433-1.458h-1.09v4.071H20.7V27.324h-1.63Zm-3.36,4.071H16.8V24.344H15.709Z"
                                            style="fill:#fff"></path>
                                    </g>
                                </svg>
                                <span class="hidden sm:inline">Ruby</span>
                            </button>
                        </div>
                    </div>

                    <div class="relative flex items-center justify-center">
                        <!-- Horizontal lines -->
                        <div
                            class="absolute -z-10 inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-gray-200 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute -z-10 inset-x-0 bottom-0 h-px bg-linear-to-r from-transparent via-gray-200 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute -z-10 inset-x-[200px] top-1/2 h-px bg-linear-to-r from-transparent via-gray-200 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute -z-10 inset-x-0 top-1/2 h-px bg-linear-to-r from-transparent via-gray-200 to-transparent -translate-y-[82px] before:absolute before:inset-y-0 before:w-24 before:bg-linear-to-r before:via-blue-500 before:animate-[line_10s_ease-in-out_infinite_both] mix-blend-multiply">
                        </div>
                        <div
                            class="absolute -z-10 inset-x-0 top-1/2 h-px bg-linear-to-r from-transparent via-gray-200 to-transparent translate-y-[82px] before:absolute before:inset-y-0 before:w-24 before:bg-linear-to-r before:via-blue-500 before:animate-[line_10s_ease-in-out_infinite_5s_both] mix-blend-multiply">
                        </div>


<div id="tabpanel-1" class="w-full h-full flex items-center justify-center" role="tabpanel"
tabindex="0" aria-labelledby="tab-1" x-show="activeTab === 1">
<div class="w-full max-w-3xl px-4">
    <div
        class="relative aspect-video bg-gray-900 rounded-2xl px-6 py-4 shadow-xl
        before:absolute before:-inset-5 before:border-y
        before:[border-image:linear-gradient(to_right,transparent,rgba(203,213,225,0.8),transparent)_1]
        before:pointer-events-none
        after:absolute after:-inset-5 after:border-x
        after:[border-image:linear-gradient(to_bottom,transparent,rgba(203,213,225,0.8),transparent)_1]
        after:-z-10">
        
        <div class="relative flex items-center justify-between mb-6">
            <span class="text-white font-medium text-sm">isend.ai</span>
        </div>

        <pre class="text-xs font-mono text-gray-400 whitespace-pre-wrap break-words">
<span class="text-gray-200">&lt;?php</span>

require_once 'vendor/autoload.php';

use ISend\ISendClient;

<span class="text-gray-400">// Initialize the client</span>
$client = new ISendClient('your-api-key-here');

<span class="text-gray-400">// Prepare email data</span>
$emailData = [
'template_id' =&gt; 124,
'to' =&gt; 'hi@isend.ai',
'dataMapping' =&gt; [
    'name' =&gt; 'ISend'
]
];

<span class="text-gray-400">// Send the email</span>
$response = $client-&gt;sendEmail($emailData);
        </pre>
    </div>
</div>
</div>

<!-- Panel #2 -->
<div id="tabpanel-2" class="w-full h-full flex items-center justify-center" role="tabpanel"
    tabindex="0" aria-labelledby="tab-2" x-show="activeTab === 2">
    <div class="w-full max-w-3xl px-4">
        <div
            class="relative aspect-video bg-gray-900 rounded-2xl px-6 py-4 shadow-xl
            before:absolute before:-inset-5 before:border-y
            before:[border-image:linear-gradient(to_right,transparent,rgba(203,213,225,0.8),transparent)_1]
            before:pointer-events-none
            after:absolute after:-inset-5 after:border-x
            after:[border-image:linear-gradient(to_bottom,transparent,rgba(203,213,225,0.8),transparent)_1]
            after:-z-10">

            <div class="relative flex items-center justify-between mb-6">
                <span class="text-white font-medium text-sm">isend.ai</span>
            </div>

            <pre class="text-xs font-mono text-gray-400 whitespace-pre-wrap break-words">
<span class="text-gray-200">from</span> isend <span class="text-gray-200">import</span> ISendClient

<span class="text-gray-400"># Initialize the client</span>
client = ISendClient('your-api-key-here')

<span class="text-gray-400"># Email data</span>
email_data = {
    'template_id': 124,
    'to': 'hi@isend.ai',
    'dataMapping': {
        'name': 'ISend'
    }
}

response = client.send_email(email_data)
print(response)
            </pre>
        </div>
    </div>
</div>
<!-- Panel #3 -->
<div id="tabpanel-3" class="w-full h-full flex items-center justify-center" role="tabpanel"
    tabindex="0" aria-labelledby="tab-3" x-show="activeTab === 3">
    <div class="w-full max-w-3xl px-4">
        <div
            class="relative aspect-video bg-gray-900 rounded-2xl px-6 py-4 shadow-xl
            before:absolute before:-inset-5 before:border-y
            before:[border-image:linear-gradient(to_right,transparent,rgba(203,213,225,0.8),transparent)_1]
            before:pointer-events-none
            after:absolute after:-inset-5 after:border-x
            after:[border-image:linear-gradient(to_bottom,transparent,rgba(203,213,225,0.8),transparent)_1]
            after:-z-10">

            <div class="relative flex items-center justify-between mb-6">
                <span class="text-white font-medium text-sm">isend.ai</span>
            </div>

            <pre class="text-xs font-mono text-gray-400 whitespace-pre-wrap break-words">
<span class="text-gray-200">const</span> { ISendClient } = require('@isend-ai/nodejs-sdk');

<span class="text-gray-400">// Initialize the client</span>
<span class="text-gray-200">const</span> client = <span class="text-gray-200">new</span> ISendClient('your-api-key-here');

<span class="text-gray-400">// Send email using template</span>
<span class="text-gray-200">const</span> emailData = {
  template_id: 124,
  to: 'hi@isend.ai',
  dataMapping: {
    name: 'ISend'
  }
};

client.sendEmail(emailData)
  .then(response =&gt; {
    console.log('Email sent successfully!', response);
  })
  .catch(error =&gt; {
    console.error('Error sending email:', error.message);
  });
            </pre>
        </div>
    </div>
</div>

<!-- Panel #4 -->
<div id="tabpanel-4" class="w-full h-full flex items-center justify-center" role="tabpanel"
    tabindex="0" aria-labelledby="tab-4" x-show="activeTab === 4">
    <div class="w-full max-w-3xl px-4">
        <div
            class="relative aspect-video bg-gray-900 rounded-2xl px-6 py-4 shadow-xl
            before:absolute before:-inset-5 before:border-y
            before:[border-image:linear-gradient(to_right,transparent,rgba(203,213,225,0.8),transparent)_1]
            before:pointer-events-none
            after:absolute after:-inset-5 after:border-x
            after:[border-image:linear-gradient(to_bottom,transparent,rgba(203,213,225,0.8),transparent)_1]
            after:-z-10">

            <div class="relative flex items-center justify-between mb-6">
                <span class="text-white font-medium text-sm">isend.ai</span>
            </div>

            <pre class="text-xs font-mono text-gray-400 whitespace-pre-wrap break-words">
<span class="text-gray-200">require</span> 'isend'

<span class="text-gray-400"># Initialize the client</span>
client = ISend::Client.new('your-api-key-here')

<span class="text-gray-400"># Email data</span>
email_data = {
  template_id: 124,
  to: 'hi@isend.ai',
  dataMapping: {
    name: 'ISend'
  }
}

response = client.send_email(email_data)
puts response
            </pre>
        </div>
    </div>
</div>

                    </div>

                </div>
                <!-- End: Tabs component -->

            </div>
        </div>
    </section>

    <!-- Large testimonial -->
    <section>
        <div class="max-w-2xl mx-auto px-4 sm:px-6">
            <div class="py-12 md:py-20">
                <div class="text-center space-y-3">
                    <p class="text-2xl font-bold text-gray-900">"You should absolutely try isend.ai — it's incredibly
                        easy to manage email templates. Our customer communication headaches are gone for good."</p>
                    <div class="font-medium text-gray-500 text-sm">
                        <span class="text-gray-700">Anjali Mehra</span> <span class="text-gray-400">/</span>
                        <a class="text-blue-500" href="#0">CTO of Rising Tech Solutions</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="relative before:absolute before:inset-0 before:bg-gray-900 before:-z-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="py-12 md:py-20">

                <!-- Section header -->
                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-15">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-200">Built for Developers Who Actually Send
                        Emails</h2>
                </div>

                <!-- Grid -->
                <div
                    class="grid sm:grid-cols-2 lg:grid-cols-3 overflow-hidden *:p-6 md:*:p-10 *:relative *:before:absolute *:before:bg-gray-800 *:before:[block-size:100vh] *:before:[inline-size:1px] *:before:[inset-inline-start:-1px] *:before:[inset-block-start:0] *:after:absolute *:after:bg-gray-800 *:after:[block-size:1px] *:after:[inline-size:100vw] *:after:[inset-inline-start:0] *:after:[inset-block-start:-1px]">

                    <article>
                        <h3 class="font-medium text-gray-200 flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="M2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Zm2-4a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4Zm1 10a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H5Z">
                                </path>
                            </svg>
                            <span>Plug & Play API Integration</span>
                        </h3>
                        <p class="text-[15px] text-gray-400">Add email functionality with a single API call with zero
                            setup, zero boilerplate. Just send.</p>
                    </article>

                    <article>
                        <h3 class="font-medium text-gray-200 flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="M14.29 2.614a1 1 0 0 0-1.58-1.228L6.407 9.492l-3.199-3.2a1 1 0 1 0-1.414 1.415l4 4a1 1 0 0 0 1.496-.093l7-9ZM1 14a1 1 0 1 0 0 2h14a1 1 0 1 0 0-2H1Z" />
                            </svg>
                            <span>Works with Any Tech Stack</span>
                        </h3>
                        <p class="text-[15px] text-gray-400">One unified
                            API works across Node, Python, PHP, Go, Ruby.</p>
                    </article>

                    <article>
                        <h3 class="font-medium text-gray-200 flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="M2.248 6.285a1 1 0 0 1-1.916-.57A8.014 8.014 0 0 1 5.715.332a1 1 0 0 1 .57 1.916 6.014 6.014 0 0 0-4.037 4.037Z"
                                    opacity=".3" />
                                <path
                                    d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm1.715-6.752a1 1 0 0 1 .57-1.916 8.014 8.014 0 0 1 5.383 5.383 1 1 0 1 1-1.916.57 6.014 6.014 0 0 0-4.037-4.037Zm4.037 7.467a1 1 0 1 1 1.916.57 8.014 8.014 0 0 1-5.383 5.383 1 1 0 1 1-.57-1.916 6.014 6.014 0 0 0 4.037-4.037Zm-7.467 4.037a1 1 0 1 1-.57 1.916 8.014 8.014 0 0 1-5.383-5.383 1 1 0 1 1 1.916-.57 6.014 6.014 0 0 0 4.037 4.037Z" />
                            </svg>
                            <span>Real-Time Email Testing</span>
                        </h3>
                        <p class="text-[15px] text-gray-400">Send test emails as you code. Preview changes instantly
                            without deploying or switching tools.</p>
                    </article>

                    <article>
                        <h3 class="font-medium text-gray-200 flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="M8 0a1 1 0 0 1 1 1v14a1 1 0 1 1-2 0V1a1 1 0 0 1 1-1Zm6 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h1a1 1 0 1 1 0 2h-1a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3h1a1 1 0 1 1 0 2h-1ZM1 1a1 1 0 0 0 0 2h1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 1 0 0 2h1a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3H1Z" />
                            </svg>
                            <span>Template Management</span>
                        </h3>
                        <p class="text-[15px] text-gray-400">Manage templates in your dashboard. Versioned, testable,
                            and built for teams that move fast.</p>
                    </article>

                    <article>
                        <h3 class="font-medium text-gray-200 flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="M10.284.33a1 1 0 1 0-.574 1.917 6.049 6.049 0 0 1 2.417 1.395A1 1 0 0 0 13.5 2.188 8.034 8.034 0 0 0 10.284.33ZM6.288 2.248A1 1 0 0 0 5.718.33 8.036 8.036 0 0 0 2.5 2.187a1 1 0 0 0 1.372 1.455 6.036 6.036 0 0 1 2.415-1.395ZM1.42 5.401a1 1 0 0 1 .742 1.204 6.025 6.025 0 0 0 0 2.79 1 1 0 0 1-1.946.462 8.026 8.026 0 0 1 0-3.714A1 1 0 0 1 1.421 5.4Zm2.452 6.957A1 1 0 0 0 2.5 13.812a8.036 8.036 0 0 0 3.216 1.857 1 1 0 0 0 .574-1.916 6.044 6.044 0 0 1-2.417-1.395Zm9.668.04a1 1 0 0 1-.041 1.414 8.033 8.033 0 0 1-3.217 1.857 1 1 0 1 1-.571-1.917 6.035 6.035 0 0 0 2.415-1.395 1 1 0 0 1 1.414.042Zm2.242-6.255a1 1 0 1 0-1.946.462 6.03 6.03 0 0 1 0 2.79 1 1 0 1 0 1.946.462 8.022 8.022 0 0 0 0-3.714Z" />
                            </svg>
                            <span>Secure API Key Control</span>
                        </h3>
                        <p class="text-[15px] text-gray-400">Create, rotate, and revoke API keys with full audit trails.
                            Security built-in from day one.</p>
                    </article>

                    <article>
                        <h3 class="font-medium text-gray-200 flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="M9 1a1 1 0 1 0-2 0v6a1 1 0 0 0 2 0V1ZM4.572 3.08a1 1 0 0 0-1.144-1.64A7.987 7.987 0 0 0 0 8a8 8 0 0 0 16 0c0-2.72-1.36-5.117-3.428-6.56a1 1 0 1 0-1.144 1.64A5.987 5.987 0 0 1 14 8 6 6 0 1 1 2 8a5.987 5.987 0 0 1 2.572-4.92Z" />
                            </svg>
                            <span>Developer-Friendly Pricing</span>
                        </h3>
                        <p class="text-[15px] text-gray-400">Pay as you go. No overages. No lock-in. Start free, scale
                            when you need to.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>



    <!-- Features #2 -->
    <section class="relative">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 -z-10" aria-hidden="true">
            <div
                class="w-80 h-80 rounded-full bg-linear-to-tr from-blue-500 to-gray-900 opacity-40 blur-[160px] will-change-[filter]">
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="py-12 md:py-20">

                <!-- Section header -->
                <div class="max-w-3xl mx-auto text-center pb-10">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Why isend.ai?</h2>
                    <p class="text-lg text-gray-700">Built for developers with fast setup, full control, and no
                        unnecessary
                        complexity.</p>
                </div>

                <!-- Grid -->
                <div
                    class="grid lg:grid-cols-3 overflow-hidden border-y [border-image:linear-gradient(to_right,transparent,var(--color-slate-200),transparent)1] *:p-6 md:*:px-10 md:*:py-12 *:relative *:before:absolute *:before:bg-linear-to-b *:before:from-transparent *:before:via-gray-200 *:before:[block-size:100%] *:before:[inline-size:1px] *:before:[inset-inline-start:-1px] *:before:[inset-block-start:0]">

                    <!-- Step 1 -->
                    <article>
                        <h3 class="font-medium flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="m15.447 6.605-.673-.336a6.973 6.973 0 0 0-.761-1.834l.238-.715a.999.999 0 0 0-.242-1.023l-.707-.707a.995.995 0 0 0-1.023-.242l-.715.238a6.96 6.96 0 0 0-1.834-.761L9.394.552A1 1 0 0 0 8.5-.001h-1c-.379 0-.725.214-.895.553l-.336.673a6.973 6.973 0 0 0-1.834.761l-.715-.238a.997.997 0 0 0-1.023.242l-.707.707a1.001 1.001 0 0 0-.242 1.023l.238.715a6.959 6.959 0 0 0-.761 1.834l-.673.336a1 1 0 0 0-.553.895v1c0 .379.214.725.553.895l.673.336c.167.653.425 1.268.761 1.834l-.238.715a.999.999 0 0 0 .242 1.023l.707.707a.997.997 0 0 0 1.023.242l.715-.238a6.959 6.959 0 0 0 1.834.761l.336.673a1 1 0 0 0 .895.553h1c.379 0 .725-.214.895-.553l.336-.673a6.973 6.973 0 0 0 1.834-.761l.715.238a1.001 1.001 0 0 0 1.023-.242l.707-.707c.268-.268.361-.664.242-1.023l-.238-.715a6.959 6.959 0 0 0 .761-1.834l.673-.336A1 1 0 0 0 16 8.5v-1c0-.379-.214-.725-.553-.895ZM8 13a5 5 0 1 1 .001-10.001 5 5 0 0 1 0 10.001Z">
                                </path>
                            </svg>
                            <span>Developer First</span>
                        </h3>
                        <p class="text-[15px] text-gray-700">Built for speed and clarity. Every feature exists to get
                            you from idea to send faster with full control.</p>
                    </article>

                    <!-- Step 2 -->
                    <article>
                        <h3 class="font-medium flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="12">
                                <path
                                    d="M2 0a1 1 0 0 0 0 2h6a1 1 0 0 0 0-2H2Zm0 7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm1-3a3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H3Z">
                                </path>
                            </svg>
                            <span>No Lock-In</span>
                        </h3>
                        <p class="text-[15px] text-gray-700">Use your own provider like SES, SendGrid, Mailgun, SMTP. We
                            don't trap you.</p>

                    </article>

                    <!-- Step 3 -->
                    <article>
                        <h3 class="font-medium flex items-center space-x-2 mb-2">
                            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path
                                    d="M14.75 2.5a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5Zm0 13.5a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5ZM2.5 14.75a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0ZM1.25 2.5a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5ZM4 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0Zm4-6a6 6 0 1 0 0 12A6 6 0 0 0 8 2Z">
                                </path>
                            </svg>
                            <span>Minimal Setup</span>
                        </h3>
                        <p class="text-[15px] text-gray-700">No bloated onboarding. Install the package, drop in your
                            key, and start sending. That's it.</p>

                    </article>

                </div>


            </div>
        </div>
    </section>
    <!-- Testimonials -->
    <section
        class="relative before:absolute before:inset-0 before:h-[120%] before:pointer-events-none before:bg-linear-to-b before:from-gray-100 before:-z-10">
        <div class="pt-12 md:pt-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold">Top startups love iSend</h2>
                </div>
            </div>
            <div class="relative flex justify-center max-w-[94rem] mx-auto">
                <div class="absolute bottom-20 -translate-x-36 -z-10" aria-hidden="true">
                    <div
                        class="w-80 h-80 rounded-full bg-linear-to-tr from-blue-500 to-gray-900 opacity-30 blur-[160px] will-change-[filter]">
                    </div>
                </div>
                <div class="absolute -bottom-10 -z-10" aria-hidden="true">
                    <div class="w-80 h-80 rounded-full bg-blue-500 opacity-40 blur-[160px] will-change-[filter]"></div>
                </div>
                <div class="absolute bottom-0 -z-10" aria-hidden="true">
                    <div class="w-56 h-56 rounded-full border-[20px] border-white blur-[20px] will-change-[filter]">
                    </div>
                </div>
                <!-- Row -->
                <div x-data="{}" x-init="$nextTick(() => {
                        let ul = $refs.testimonials;
                        ul.insertAdjacentHTML('afterend', ul.outerHTML);
                        ul.nextSibling.setAttribute('aria-hidden', 'true');
                    })"
                    class="w-full inline-flex flex-nowrap [mask-image:_linear-gradient(to_right,transparent_0,_black_10%,_black_90%,transparent_100%)] py-12 md:py-20 group">
                    <div x-ref="testimonials"
                        class="flex items-start justify-center md:justify-start *:mx-3 animate-[infinite-scroll_60s_linear_infinite] group-hover:[animation-play-state:paused]">
                        <?php
$testimonials = [
    [
        'name' => 'Ananya Sharma',
        'handle' => '@ananya_s',
        'image' => '/public/img/site/testimonials/uif2.jpg',
        'text' => "iSend.ai helped our startup automate all customer onboarding emails flawlessly. The delivery rate improved by 40% and setup was done in under 30 minutes!",
        'date' => 'July 10, 2025',
    ],
    [
        'name' => 'Ravi Iyer',
        'handle' => '@ravi.codes',
        'image' => '/public/img/site/testimonials/uif1.jpg',
        'text' => "The analytics dashboard is gold. We're now tracking open rates and clicks on all campaigns in real-time. iSend.ai is a must-have for product teams.",
        'date' => 'June 28, 2025',
    ],
    [
        'name' => 'Pooja Deshpande',
        'handle' => '@pooja_writes',
        'image' => '/public/img/site/testimonials/uif3.jpg',
        'text' => "Writing and scheduling transactional emails used to be a mess. With iSend.ai, we've built beautiful templates and connected directly to our backend.",
        'date' => 'May 17, 2025',
    ],
    [
        'name' => 'Amit Malhotra',
        'handle' => '@amitgrowth',
        'image' => '/public/img/site/testimonials/uif4.jpg',
        'text' => "We moved from SendGrid to iSend.ai because of its API simplicity and support. It's lightning fast and integrates well with our Laravel backend.",
        'date' => 'April 22, 2025',
    ],
];
?>


                        <?php foreach ($testimonials as $testimonial): ?>
                        <article
                            class="relative flex flex-col rounded-2xl h-full w-[22rem] p-5 shadow-lg odd:rotate-1 even:-rotate-1 group-hover:rotate-0 transition-transform duration-300 bg-white/70 shadow-black/[0.03] before:absolute before:inset-0 before:rounded-[inherit] before:border before:border-transparent before:[background:linear-gradient(var(--color-gray-100),var(--color-gray-200))_border-box] before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)] before:[mask-composite:exclude_!important] before:pointer-events-none">
                            <header class="flex items-center gap-3 mb-4">
                                <img class="shrink-0 rounded-full" src="<?= $testimonial['image'] ?>" width="44"
                                    height="44" alt="Testimonial Image" />
                                <div>
                                    <div class="font-bold">
                                        <?= htmlspecialchars($testimonial['name']) ?>
                                    </div>
                                    <div>
                                        <a class="text-sm font-medium text-gray-500/80 hover:text-gray-500 transition"
                                            href="#0">
                                            <?= htmlspecialchars($testimonial['handle']) ?>
                                        </a>
                                    </div>
                                </div>
                            </header>
                            <div class="grow text-sm text-gray-700">
                                <?= htmlspecialchars($testimonial['text']) ?>
                            </div>
                            {{-- <footer class="mt-4 text-gray-700 flex items-center gap-2.5">
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="17" height="15"
                                    fill="none">
                                    <path fill-rule="evenodd"
                                        d="M16.928 14.054H11.99L8.125 9.162l-4.427 4.892H1.243L6.98 7.712.928.054H5.99L9.487 4.53 13.53.054h2.454l-5.358 5.932 6.303 8.068Zm-4.26-1.421h1.36L5.251 1.4H3.793l8.875 11.232Z" />
                                </svg>
                                <div class="text-xs">
                                    <?= htmlspecialchars($testimonial['date']) ?>
                                </div>
                            </footer> --}}
                        </article>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="rounded-2xl text-center relative overflow-hidden shadow-xl before:absolute before:inset-0 before:rounded-2xl before:bg-gray-900 before:pointer-events-none before:-z-10"
                data-aos="zoom-y-out">
                <!-- Glow -->
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 -z-10" aria-hidden="true">
                    <div
                        class="w-[480px] h-56 rounded-full border-[20px] border-blue-500 blur-3xl will-change-[filter]">
                    </div>
                </div>
                <!-- Stripes illustration -->
                <div class="absolute left-1/2 transform -translate-x-1/2 top-0 pointer-events-none -z-10"
                    aria-hidden="true">
                    <img class="max-w-none" src="/simple-html/images/stripes-dark.svg" width="768" height="432"
                        alt="Stripes" />
                </div>
                <div class="py-12 md:py-20 px-4 md:px-12">
                    <h2
                        class="text-3xl md:text-4xl text-gray-200 font-bold mb-6 md:mb-12 border-y [border-image:linear-gradient(to_right,transparent,--theme(--color-slate-700/.7),transparent)1]">
                        Send Emails. Skip the Boilerplate.</h2>
                    <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center">
                        <a class="btn text-white bg-linear-to-t from-blue-600 to-blue-500 bg-[length:100%_100%] hover:bg-[length:100%_150%] bg-[bottom] shadow-sm w-full mb-4 sm:w-auto sm:mb-0 group"
                            href="<?= $userData ? '/a/' . $userData->aCode . '/dashboard' : '/login' ?>">
                            <span class="relative inline-flex items-center">
                                <?= $userData ? 'Dashboard' : 'Join Now' ?> <span
                                    class="tracking-normal text-blue-300 group-hover:translate-x-0.5 transition-transform ml-1">-&gt;</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $(document).ready(function() {
        playTerminalAnimation("code-output");
    });
</script>
@endsection