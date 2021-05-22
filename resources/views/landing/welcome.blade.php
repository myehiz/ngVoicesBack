<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>NG Voices</title>
    <meta data-n-head="ssr" charset="utf-8" />
    <meta data-n-head="ssr" name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="keywords"
        content="ngVoices, Patrotic Citizen of Nigeria, Voters Education, Legislator Profiles, Civic Education, Latest News about Legislators, PVC Registration Units." />
    <meta name="description"
        content="Get latest information about - the electoral process, your legislators in your native language." />
    <meta name="author" content="ngvoices.com" />
    <meta name="ngVoices" content="blog" />
    <meta data-n-head="ssr" property="og:type" content="website" />
    <meta data-n-head="ssr" property="og:url" content="https://ngvoices.ng" />
    <meta data-n-head="ssr" property="og:title" content="NG Voices" />
    <meta data-n-head="ssr" property="og:image" content="https://ngvoices.ng/twitter.png" />
    <meta data-n-head="ssr" property="og:description"
        content="Get latest information about - the electoral process, your legislators in your native language." />
    <meta data-n-head="ssr" property="twitter:card" content="summary_large_image" />
    <meta data-n-head="ssr" property="twitter:url" content="https://ngvoices.ng" />
    <meta data-n-head="ssr" property="twitter:title" content="NG Voices" />
    <meta data-n-head="ssr" property="twitter:description"
        content="Get latest information about - the electoral process, your legislators in your native language." />
    <meta data-n-head="ssr" property="twitter:image" content="https://ngvoices.ng/twitter.png" />
    <link data-n-head="ssr" rel="icon" type="image/x-icon" href="https://ngvoices.ng/favicon.ico" />
    <link data-n-head="ssr" rel="stylesheet" href="{{ asset('welcome/css/copiedCss2.css') }}" />
    <link data-n-head="ssr" rel="stylesheet" href="{{ asset('welcome/css/video-js.css') }}" />
    <link rel="preload" href="{{ asset('welcome/js/3ff8a33.js') }}" as="script" />
    <link rel="preload" href="{{ asset('welcome/js/529a810.js') }}" as="script" />
    <link rel="preload" href="{{ asset('welcome/js/d150e00.js') }}" as="script" />
    <link rel="preload" href="{{ asset('welcome/js/ea7a3fa.js') }}" as="script" />
    <link rel="preload" href="{{ asset('welcome/js/c5e85b3.js') }}" as="script" />
    <link rel="preload" href="{{ asset('welcome/js/payload.js') }}" as="script" />
    <script charset="utf-8" src="{{ asset('welcome/js/payload.js') }}"></script>
</head>


<body>
    <div id=" __nuxt">
        <!---->
        <div id="__layout">
            <div class="c-app">
                <nav class="c-nav">
                    <div class="container">
                        <div class="c-nav__inner">
                            <a href="{{ route('index') }}" aria-current="page"
                                class="c-nav__logo nuxt-link-exact-active nuxt-link-active"><img
                                    src="{{ asset('welcome/images/flag.svg') }}" alt="logo" />
                                <span>NG Voices</span></a>
                            <!---->
                        </div>
                    </div>
                </nav>
                <div class="container" data-v-6e4534d0="">
                    <div class="c-home" data-v-6e4534d0="">
                        <h1 class="c-home__title" data-v-6e4534d0="">
                            <div class="c-home__title-line" data-v-6e4534d0="">
                                <span data-v-6e4534d0="">Get latest information about</span>
                                <line data-v-6e4534d0=""></line>
                            </div>
                            <div class="c-home__title-line" data-v-6e4534d0="">
                                <span data-v-6e4534d0="">Nigeria's electoral process, PVC Registration Units, your
                                    Legislators ... in </span>
                                <line data-v-6e4534d0=""></line>
                            </div>
                            <div class="c-home__title-line" data-v-6e4534d0="">
                                <span data-v-6e4534d0="">your native languages.</span>
                                <line data-v-6e4534d0=""></line>
                            </div>
                        </h1>
                        <div>
                            <form id="selectLangForm" action="{{ route('homeForm') }}" method="GET"
                                class="c-dropdown c-dropdown" data-v-95742a9c="" data-v-6e4534d0="">
                                @method('GET')
                                @csrf
                                <select id="selectLanguage" name="selectLanguage" style="
                                        background-color: black;
                                        color: white;
                                        font-size: 1.8rem;
                                        padding: 15px;
                                    " data-v-95742a9c="">
                                    <option value="" disabled="disabled" selected="selected" data-v-95742a9c="">
                                        Select a language to start
                                    </option>

                                    @livewire('language')
                                </select></form>
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="c-dropdown__icon" data-v-95742a9c="">
                                <path
                                    d="M2 2C3.36846 3.94705 5.13246 5.69884 6.44444 7.65887C7.18643 8.76735 8.93806 6.86489 9.47475 6.33847C10.1826 5.64418 12 3.54808 12 2.75452"
                                    stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                    data-v-95742a9c=""></path>
                            </svg>
                        </div>
                        <p class="c-home__subtext" data-v-6e4534d0="">
                            Select a language and get articles, voice notes, broadcast
                            messages and posters in that language. Languages
                            are updated regularly, so please come back later
                            if you can't find yours now.
                        </p>
                        <div class="c-emojis" data-v-6e4534d0="">
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 34%;
                                        background: rgba(134, 52, 187, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">✊🏾</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 44%;
                                        background: rgba(6, 252, 98, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">✊🏾</span>
                            <span>✊🏾</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 73%;
                                        background: rgba(170, 129, 165, 0.5)
                                            none repeat scroll 0% 0%;
                                    ">✊🏾</span>
                            <span>✊🏾</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 21%;
                                        background: rgba(191, 191, 52, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">✊🏾</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 49%;
                                        background: rgba(115, 194, 99, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">✊🏾</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 39%;
                                        background: rgba(223, 179, 9, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">✊🏾</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 95%;
                                        background: rgba(62, 249, 79, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">✊🏾</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 27%;
                                        background: rgba(209, 18, 120, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">✊🏾</span>
                            <span> 📣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 90%;
                                        background: rgba(172, 239, 136, 0.5)
                                            none repeat scroll 0% 0%;
                                    ">
                                📣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 17%;
                                        background: rgba(159, 228, 90, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">
                                📣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 91%;
                                        background: rgba(108, 93, 200, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">
                                📣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 67%;
                                        background: rgba(7, 232, 217, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">
                                📣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 89%;
                                        background: rgba(32, 127, 16, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">
                                📣</span>
                            <span> 📣</span> <span> 📣</span>
                            <span> 📣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 75%;
                                        background: rgba(228, 122, 77, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">
                                📣</span>
                            <span>🗣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 83%;
                                        background: rgba(122, 5, 150, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🗣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 41%;
                                        background: rgba(129, 12, 117, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🗣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 30%;
                                        background: rgba(253, 68, 209, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🗣</span>
                            <span>🗣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 41%;
                                        background: rgba(59, 206, 109, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🗣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 49%;
                                        background: rgba(188, 144, 14, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🗣</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 58%;
                                        background: rgba(74, 157, 60, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🗣</span>
                            <span>🗣</span> <span>🗣</span> <span>🚫</span>
                            <span>🚫</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 49%;
                                        background: rgba(94, 140, 243, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🚫</span>
                            <span>🚫</span> <span>🚫</span> <span>🚫</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 14%;
                                        background: rgba(170, 37, 217, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🚫</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 80%;
                                        background: rgba(134, 15, 132, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🚫</span>
                            <span>🚫</span> <span>🚫</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 17%;
                                        background: rgba(123, 30, 3, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🇳🇬</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 49%;
                                        background: rgba(112, 23, 137, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🇳🇬</span>
                            <span>🇳🇬</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 57%;
                                        background: rgba(27, 75, 234, 0.5) none
                                            repeat scroll 0% 0%;
                                    ">🇳🇬</span>
                            <span>🇳🇬</span> <span>🇳🇬</span> <span>🇳🇬</span>
                            <span>🇳🇬</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 65%;
                                        background: rgba(182, 171, 245, 0.5)
                                            none repeat scroll 0% 0%;
                                    ">🇳🇬</span>
                            <span style="
                                        --trans-duration: 4s;
                                        --opacity: 0;
                                        --trans-value: -600%;
                                        left: 6%;
                                        background: rgba(111, 233, 120, 0.5)
                                            none repeat scroll 0% 0%;
                                    ">🇳🇬</span>
                        </div>
                    </div>
                    <a href="mailto:ngvoices1960@gmail.com" class="c-home__footer" data-v-6e4534d0="">
                        👉🏾&nbsp; ngvoices1960@gmail.com &nbsp;👈🏾
                    </a>
                </div>
            </div>
        </div>
    </div>
    <@livewireScripts />
    <script>
        var languageForm = document.getElementById('selectLangForm');
        

    </script>
    <script src="{{ asset('welcome/js/3ff8a33.js') }}" defer></script>
    <script src=" {{ asset('welcome/js/c5e85b3.js') }}" defer></script>
    <script src="{{ asset('welcome/js/529a810.js') }}" defer></script>
    <script src=" {{ asset('welcome/js/d150e00.js') }}" defer></script>
    <script src="{{ asset('welcome/js/ea7a3fa.js') }}" defer></script>
</body>

</html>